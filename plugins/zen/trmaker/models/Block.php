<?php namespace Zen\TrMaker\Models;

use Model;

/**
 * Model
 */
class Block extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;
    public $table = 'zen_trmaker_blocks';
    public $rules = [];

    public function getTimeOptions()
    {
        return [
            30 => '30 минут',
            60 => '1 час',
            90 => '1 час 30 минут',
            120 => '2 часа',
            150 => '2 часа 30 минут',
            180 => '3 часа',
            240 => '4 часа',
            300 => '5 часов',
            360 => '6 часов',
            0 => 'Больше 6 часов',
        ];
    }

    public function stringTime()
    {
        $times = $this->getTimeOptions();
        return $times[$this->time];
    }
}
