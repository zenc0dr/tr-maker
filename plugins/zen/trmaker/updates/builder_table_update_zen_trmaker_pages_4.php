<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerPages4 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->dropColumn('blocks');
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->text('blocks')->nullable();
        });
    }
}
