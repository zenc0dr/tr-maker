<?php namespace October\Rain\Assetic\Asset;

use October\Rain\Assetic\Filter\FilterInterface;
use October\Rain\Assetic\Util\VarUtils;
use InvalidArgumentException;

/**
 * FileAsset represents an asset loaded from a file.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
class FileAsset extends BaseAsset
{
    /**
     * @var string source path
     */
    protected $source;

    /**
     * __construc.
     *
     * @param string $source     An absolute path
     * @param array  $filters    An array of filters
     * @param string $sourceRoot The source asset root directory
     * @param string $sourcePath The source asset path
     * @param array  $vars
     *
     * @throws InvalidArgumentException If the supplied root doesn't match the source when guessing the path
     */
    public function __construct($source, $filters = array(), $sourceRoot = null, $sourcePath = null, array $vars = array())
    {
        if (null === $sourceRoot) {
            $sourceRoot = dirname($source);
            if (null === $sourcePath) {
                $sourcePath = basename($source);
            }
        }
        elseif (null === $sourcePath) {
            if (0 !== strpos($source, $sourceRoot)) {
                throw new InvalidArgumentException(sprintf('The source "%s" is not in the root directory "%s"', $source, $sourceRoot));
            }

            $sourcePath = substr($source, strlen($sourceRoot) + 1);
        }

        $this->source = $source;

        parent::__construct($filters, $sourceRoot, $sourcePath, $vars);
    }

    /**
     * load
     */
    public function load(FilterInterface $additionalFilter = null)
    {
        $source = VarUtils::resolve($this->source, $this->getVars(), $this->getValues());

        if (!is_file($source)) {
            throw new \RuntimeException(sprintf('The source file "%s" does not exist.', $source));
        }

        $this->doLoad(file_get_contents($source), $additionalFilter);
    }

    /**
     * getLastModified
     */
    public function getLastModified()
    {
        $source = VarUtils::resolve($this->source, $this->getVars(), $this->getValues());

        if (!is_file($source)) {
            throw new \RuntimeException(sprintf('The source file "%s" does not exist.', $source));
        }

        return filemtime($source);
    }
}
