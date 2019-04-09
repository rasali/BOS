<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRasulBosEvents extends Migration
{
    public function up()
    {
        Schema::create('rasul_bos_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->date('event_date')->nullable();
            $table->string('time')->nullable();
            $table->string('location')->nullable();
            $table->integer('sort_order')->unsigned();
            $table->boolean('is_active')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rasul_bos_events');
    }
}
