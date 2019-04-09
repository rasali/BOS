<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteRasulBosContacts extends Migration
{
    public function up()
    {
        Schema::dropIfExists('rasul_bos_contacts');
    }
    
    public function down()
    {
        Schema::create('rasul_bos_contacts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('location', 191)->nullable();
            $table->string('number', 191)->nullable();
            $table->string('fax', 191)->nullable();
            $table->string('mail', 191);
            $table->boolean('is_active')->nullable()->default(1);
            $table->integer('sort_order')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
