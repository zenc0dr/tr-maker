<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZenTrmakerBlocks extends Migration
{
    public function up()
    {
        Schema::create('zen_trmaker_blocks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->text('desc_short')->nullable();
            $table->text('desc_full')->nullable();
            $table->integer('time')->nullable();
            $table->integer('price')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zen_trmaker_blocks');
    }
}
