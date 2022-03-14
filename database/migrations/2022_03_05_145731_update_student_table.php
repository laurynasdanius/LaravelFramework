<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function($table)  {
            $table->string('titulas');
            $table->renameColumn('vardas', 'vardas_pakeistas');
            $table->dropColumn('pavarde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function($table)  {
            $table->dropColumn('titulas');
            $table->renameColumn('vardas_pakeistas','vardas');
            $table->dropColumn('vardas');
            $table->string('pavarde');
        });  
    }
};
