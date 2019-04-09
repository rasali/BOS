<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosNews2 extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_news', function($table)
        {
            $table->boolean('is_home')->nullable()->default(1);
            $table->string('slug')->change();
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_news', function($table)
        {
            $table->dropColumn('is_home');
            $table->string('slug', 191)->change();
        });
    }
}
