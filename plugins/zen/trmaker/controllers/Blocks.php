<?php namespace Zen\TrMaker\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Blocks extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'tr-maker.main' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Zen.TrMaker', 'main', 'blocks');
    }
}
