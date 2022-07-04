<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerLayouts3 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_layouts', function($table)
        {
            $table->integer('header_id')->nullable();
            $table->integer('footer_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_layouts', function($table)
        {
            $table->dropColumn('header_id');
            $table->dropColumn('footer_id');
        });
    }
}
