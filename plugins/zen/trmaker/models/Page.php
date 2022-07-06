<?php namespace Zen\TrMaker\Models;

use Model;
use DB;
use October\Rain\Database\Traits\NestedTree;
/**
 * Model
 */
class Page extends Model
{
    use NestedTree;
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'zen_trmaker_pages';
    private array $blocks_repeater = [];

    public $rules = [
    ];

    public function getParentIdOptions() {
        if (Page::count()) {
            return [0 => 'Нет'] + Page::lists('name', 'id', '- ');
        }
        return [0 => 'Нет'];
    }

    public $belongsTo = [
        'parent' => [Page::class],
        'project' => [Project::class]
    ];

    public function getProjectIdOptions()
    {
        if (Project::count()) {
            return [0 => 'Нет'] + Project::lists('name', 'id', '- ');
        }
        return [0 => 'Нет'];
    }


    public function beforeSave() {
        $url = ($this->slug != '/') ? '/'.$this->slug : $this->slug;
        if ($this->parent_id) {
            $url = $this->parent->slug.$this->slug;
        }

        $this->url = $url;
    }

    private function pivot()
    {
        return DB::table('zen_trmaker_pages_blocks_pivot');
    }

    public function getBlockIdOptions()
    {
        return Block::lists('name', 'id');
    }

    public function getBlocksRepeaterAttribute()
    {
        return $this->pivot()
            ->where('page_id', $this->id)
            ->orderBy('sort_order')
            ->get()
            ->map(function ($record) {
                return [
                    'block_id' => $record->block_id
                ];
            })->toArray();
    }

    public function getBlocksAttribute()
    {
        $ids = $this->pivot()->where('page_id', $this->id)->pluck('block_id')->toArray();
        $blocks_models =  Block::whereIn('id', $ids)->get();

        $output = [];
        foreach ($ids as $id) {
            foreach ($blocks_models as $blocks_model) {
                if ($blocks_model->id === $id) {
                    $output[] = $blocks_model;
                }
            }
        }
        return $output;
    }

    public function setBlocksRepeaterAttribute($blocks_repeater)
    {
        $this->blocks_repeater = $blocks_repeater ?? [];
    }

    public function saveBlocks()
    {
        if (!$this->blocks_repeater) {
            return;
        }

        $insert = [];

        for ($i = 0; $i < count($this->blocks_repeater); $i++) {
            $insert[] = [
                'block_id' => $this->blocks_repeater[$i]['block_id'],
                'page_id' => $this->id,
                'sort_order' => $i
            ];
        }

        $this->pivot()->where('page_id', $this->id)->delete();
        $this->pivot()->insert($insert);
    }

    public function afterSave()
    {
        $this->saveBlocks();
    }
}
