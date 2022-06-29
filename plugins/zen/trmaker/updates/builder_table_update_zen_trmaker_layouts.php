<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerLayouts extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_layouts', function($table)
        {
            $table->integer('project_id');
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_layouts', function($table)
        {
            $table->dropColumn('project_id');
        });
    }
}
