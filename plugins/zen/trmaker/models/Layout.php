<?php namespace Zen\TrMaker\Models;

use Model;

/**
 * Model
 */
class Layout extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'zen_trmaker_layouts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'project' => [Project::class],
    ];

    public function getProjectIdOptions()
    {
        if (Project::count()) {
            return [0 => 'Нет'] + Project::lists('name', 'id', '- ');
        }
        return [0 => 'Нет'];
    }
}
