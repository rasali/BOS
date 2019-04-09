<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosMissions extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_missions', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_missions', function($table)
        {
            $table->string('title', 191)->nullable();
            $table->string('description', 191)->nullable();
        });
    }
}
