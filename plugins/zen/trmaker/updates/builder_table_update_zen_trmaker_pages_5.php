<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerPages5 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->renameColumn('project_id', 'layout_id');
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->renameColumn('layout_id', 'project_id');
        });
    }
}
