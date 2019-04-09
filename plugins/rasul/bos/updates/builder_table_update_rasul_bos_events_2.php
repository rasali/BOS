<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosEvents2 extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_events', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_events', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
