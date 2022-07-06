<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerProjects2 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_projects', function($table)
        {
            $table->boolean('active')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_projects', function($table)
        {
            $table->dropColumn('active');
        });
    }
}
