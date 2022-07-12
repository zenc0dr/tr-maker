<?php namespace Zen\TrMaker\Models;

use Model;


/**
 * Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'zen_trmaker_projects';
    public $rules = [];
    private array $blocks_repeater = [];


    public $timestamps = true;

    public function getCountPage() {
        $layouts = Layout::where([['active',1],['project_id', $this->id]])->lists('id');
        return Page::where('active',1)->whereIn('layout_id', $layouts)->get()->count();
    }



}
