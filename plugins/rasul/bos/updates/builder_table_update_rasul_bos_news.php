<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosNews extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_news', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_news', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
