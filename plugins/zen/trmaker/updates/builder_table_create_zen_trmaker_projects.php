<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZenTrmakerProjects extends Migration
{
    public function up()
    {
        Schema::create('zen_trmaker_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->text('desc');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zen_trmaker_projects');
    }
}
