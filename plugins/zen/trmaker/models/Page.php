<?php namespace Zen\TrMaker\Models;

use Model;
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
    ];

    public function beforeSave() {
        $url = ($this->slug != '/') ? '/'.$this->slug : $this->slug;
        if ($this->parent_id) {
            $url = $this->parent->slug.$this->slug;
        }

        $this->url = $url;
    }
}
