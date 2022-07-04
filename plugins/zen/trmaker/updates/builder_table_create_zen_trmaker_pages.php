<?php namespace Zen\TrMaker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZenTrmakerPages extends Migration
{
    public function up()
    {
        Schema::create('zen_trmaker_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->boolean('active');
            $table->text('blocks')->nullable();
            $table->string('slug');
            $table->integer('parent_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zen_trmaker_pages');
    }
}
