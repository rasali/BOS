<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosEvents extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_events', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('title')->change();
            $table->string('description')->change();
            $table->string('time')->change();
            $table->string('location')->change();
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_events', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('title', 191)->change();
            $table->string('description', 191)->change();
            $table->string('time', 191)->change();
            $table->string('location', 191)->change();
        });
    }
}
