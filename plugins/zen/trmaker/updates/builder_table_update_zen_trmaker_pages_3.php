<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerPages3 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->integer('project_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->dropColumn('project_id');
        });
    }
}
