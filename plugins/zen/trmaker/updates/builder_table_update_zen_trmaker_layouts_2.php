<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerLayouts2 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_layouts', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_layouts', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
