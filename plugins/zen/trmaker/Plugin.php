<?php namespace Zen\TrMaker;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
	public function registerComponents()
    {
        return [
            'Zen\TrMaker\Components\DocProject' => 'DocProject',
            'Zen\TrMaker\Components\DocPage' => 'DocPage'
        ];
    }

    public function registerSettings()
    {
    }
}
