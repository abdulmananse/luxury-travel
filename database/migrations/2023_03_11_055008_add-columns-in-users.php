<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 30)->after('email')->nullable();
            $table->string('company_name', 50)->after('phone')->nullable();
            $table->string('company_phone', 30)->after('company_name')->nullable();
            $table->string('company_email', 100)->after('company_phone')->nullable();
            $table->string('company_website', 100)->after('company_email')->nullable();
            $table->string('comission', 10)->after('company_website')->nullable();
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
            $table->dropColumn('phone');
            $table->dropColumn('company_name');
            $table->dropColumn('company_phone');
            $table->dropColumn('company_email');
            $table->dropColumn('company_website');
            $table->dropColumn('comission');
        });
    }
}
