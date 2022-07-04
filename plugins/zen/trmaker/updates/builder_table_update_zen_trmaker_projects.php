<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerProjects extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_projects', function($table)
        {
            $table->integer('layout_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_projects', function($table)
        {
            $table->dropColumn('layout_id');
        });
    }
}