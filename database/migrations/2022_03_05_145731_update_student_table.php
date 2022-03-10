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
    //     DB::table('users')
    // ->updateOrInsert(
    //     ['email' => 'john@example.com', 'name' => 'John'],
    //     ['votes' => '2']
    // );
    //$deleted = DB::table('users')->delete();
        Schema::table('students', function($table) {
            $table->string('lytis');
            $table->rename('vardas', 'vardas(pakeistas)');
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
        //
    }
};
