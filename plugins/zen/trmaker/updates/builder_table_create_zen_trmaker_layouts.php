<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZenTrmakerLayouts extends Migration
{
    public function up()
    {
        Schema::create('zen_trmaker_layouts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('active')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zen_trmaker_layouts');
    }
}
