<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('comission');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('commission', 10)->after('company_website')->nullable();
            $table->string('company_logo', 10)->after('commission')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('comission', 10)->after('company_website')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('commission');
            $table->dropColumn('company_logo');
        });
    }
}
