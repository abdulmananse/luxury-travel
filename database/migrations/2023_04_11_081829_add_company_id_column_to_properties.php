<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdColumnToProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->bigInteger('company_id')->after('sheet_id')->nullable();
        });
        Schema::table('duplicate_properties', function (Blueprint $table) {
            $table->bigInteger('company_id')->after('sheet_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('duplicate_properties', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
    }
}
