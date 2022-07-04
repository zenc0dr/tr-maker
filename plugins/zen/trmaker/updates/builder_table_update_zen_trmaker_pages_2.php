<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateZenTrmakerPages2 extends Migration
{
    public function up()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->integer('nest_left')->nullable()->unsigned();
            $table->integer('nest_right')->nullable()->unsigned();
            $table->integer('nest_depth')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('zen_trmaker_pages', function($table)
        {
            $table->dropColumn('nest_left');
            $table->dropColumn('nest_right');
            $table->dropColumn('nest_depth');
        });
    }
}
