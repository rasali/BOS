<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosPartners extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_partners', function($table)
        {
            $table->integer('sort_order')->unsigned();
            $table->boolean('is_active')->nullable()->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_partners', function($table)
        {
            $table->dropColumn('sort_order');
            $table->dropColumn('is_active');
        });
    }
}
