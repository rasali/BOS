<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRasulBosPartners extends Migration
{
    public function up()
    {
        Schema::create('rasul_bos_partners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rasul_bos_partners');
    }
}
