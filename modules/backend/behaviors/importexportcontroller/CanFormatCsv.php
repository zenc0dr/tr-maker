<?php namespace Backend\Behaviors\ImportExportController;

use Lang;
use League\Csv\Statement as CsvStatement;
use League\Csv\Writer as CsvWriter;
use ApplicationException;
use SplTempFileObject;

/**
 * CanFormatCsv contains logic for CSV files
 */
trait CanFormatCsv
{
    /**
     * getImportFileColumnsFromCsv path
     */
    protected function getImportFileColumnsFromCsv($path)
    {
        $reader = $this->createCsvReader($path);
        $firstRow = $reader->fetchOne(0);

        if (!post('first_row_titles')) {
            array_walk($firstRow, function (&$value, $key) {
                $value = 'Column #'.($key + 1);
            });
        }

        // Prevents unfriendly error to be thrown due to bad encoding at response time.
        if (json_encode($firstRow) === false) {
            throw new ApplicationException(Lang::get('backend::lang.import_export.encoding_not_supported_error'));
        }

        return $firstRow;
    }

    /**
     * getImportSampleColumnsFromCsv
     */
    protected function getImportSampleColumnsFromCsv($path, $columnIndex)
    {
        $reader = $this->createCsvReader($path);

        if (post('first_row_titles')) {
            $reader->setHeaderOffset(0);
        }

        $result = (new CsvStatement)
            ->limit(50)
            ->process($reader)
            ->fetchColumnByOffset((int) $columnIndex)
        ;

        $data = iterator_to_array($result, false);

        return $data;
    }

    /**
     * exportFromListAsCsv
     */
    protected function exportFromListAsCsv($widget, $options): string
    {
        // Parse options
        $defaultOptions = [
            'firstRowTitles' => true,
            'useOutput' => false,
            'fileName' => 'export.csv',
            'delimiter' => null,
            'enclosure' => null,
            'escape' => null
        ];

        $options = array_merge($defaultOptions, $options);

        // Prepare CSV
        $csv = CsvWriter::createFromFileObject(new SplTempFileObject);
        $csv->setOutputBOM(CsvWriter::BOM_UTF8);

        if ($options['delimiter'] !== null) {
            $csv->setDelimiter($options['delimiter']);
        }

        if ($options['enclosure'] !== null) {
            $csv->setEnclosure($options['enclosure']);
        }

        if ($options['escape'] !== null) {
            $csv->setEscape($options['escape']);
        }

        // Locate columns from widget
        $columns = $widget->getVisibleColumns();

        // Add headers
        if ($options['firstRowTitles']) {
            $headers = [];
            foreach ($columns as $column) {
                $headers[] = $widget->getHeaderValue($column);
            }
            $csv->insertOne($headers);
        }

        // Add records
        $getter = $this->getConfig('export[useList][raw]', false)
            ? 'getColumnValueRaw'
            : 'getColumnValue';

        $query = $widget->prepareQuery();
        $results = $query->get();

        if ($event = $widget->fireSystemEvent('backend.list.extendRecords', [&$results])) {
            $results = $event;
        }

        foreach ($results as $result) {
            $record = [];
            foreach ($columns as $column) {
                $value = $widget->$getter($result, $column);
                if (is_array($value)) {
                    $value = implode('|', $value);
                }
                $record[] = $value;
            }
            $csv->insertOne($record);
        }

        // Output
        if ($options['useOutput']) {
            $csv->output($options['fileName']);
        }

        return $csv->toString();
    }
}
