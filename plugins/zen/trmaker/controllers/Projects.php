<?php namespace Zen\TrMaker\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Zen\TrMaker\Models\Project;
use View;

class Projects extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zen.TrMaker', 'main', 'projects');
    }

    public function tr($project_id) {
        $project = Project::find($project_id);
        if (!$project) {
            return;
        }

        return View::make('zen.trmaker::tr', ['project' => $project]);
    }
}
