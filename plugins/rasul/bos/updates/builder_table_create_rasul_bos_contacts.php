<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRasulBosContacts extends Migration
{
    public function up()
    {
        Schema::create('rasul_bos_contacts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('location')->nullable();
            $table->string('number')->nullable();
            $table->string('fax')->nullable();
            $table->string('mail');
            $table->boolean('is_active')->nullable()->default(1);
            $table->integer('sort_order')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rasul_bos_contacts');
    }
}
