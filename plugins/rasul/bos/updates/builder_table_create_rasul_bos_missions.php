<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRasulBosMissions extends Migration
{
    public function up()
    {
        Schema::create('rasul_bos_missions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('name')->nullable();
            $table->string('text')->nullable();
            $table->integer('sort_order')->unsigned();
            $table->boolean('is_active')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rasul_bos_missions');
    }
}
