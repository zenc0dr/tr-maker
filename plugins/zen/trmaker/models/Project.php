<?php namespace Zen\TrMaker\Models;

use Model;
use DB;

/**
 * Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;
    public $timestamps = false;
    public $table = 'zen_trmaker_projects';
    public $rules = [];
    private array $blocks_repeater = [];

    private function pivot()
    {
        return DB::table('zen_trmaker_projects_blocks_pivot');
    }

    public function getBlockIdOptions()
    {
        return Block::lists('name', 'id');
    }

    public function getBlocksRepeaterAttribute()
    {
        return $this->pivot()
            ->where('project_id', $this->id)
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
        $ids = $this->pivot()->where('project_id', $this->id)->pluck('block_id')->toArray();
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
                'project_id' => $this->id,
                'sort_order' => $i
            ];
        }

        $this->pivot()->where('project_id', $this->id)->delete();
        $this->pivot()->insert($insert);
    }

    public function afterSave()
    {
        $this->saveBlocks();
    }
}
