<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZenTrmakerProjectsBlocksPivot extends Migration
{
    public function up()
    {
        Schema::create('zen_trmaker_projects_blocks_pivot', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('project_id')->unsigned();
            $table->integer('block_id')->unsigned();
            $table->integer('sort_order')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zen_trmaker_projects_blocks_pivot');
    }
}
