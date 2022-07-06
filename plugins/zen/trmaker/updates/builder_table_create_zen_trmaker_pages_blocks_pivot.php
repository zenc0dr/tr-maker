<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZenTrmakerPagesBlocksPivot extends Migration
{
    public function up()
    {
        Schema::create('zen_trmaker_pages_blocks_pivot', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('page_id')->unsigned();
            $table->integer('block_id')->unsigned();
            $table->integer('sort_order')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zen_trmaker_pages_blocks_pivot');
    }
}