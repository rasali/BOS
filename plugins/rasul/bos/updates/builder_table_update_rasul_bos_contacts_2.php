<?php namespace Rasul\Bos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRasulBosContacts2 extends Migration
{
    public function up()
    {
        Schema::table('rasul_bos_contacts', function($table)
        {
            $table->text('content')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('rasul_bos_contacts', function($table)
        {
            $table->smallInteger('content')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
