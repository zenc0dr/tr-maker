<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerPages extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->string('url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->dropColumn('url');
        });
    }
}
