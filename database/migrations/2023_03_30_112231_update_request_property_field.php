<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRequestPropertyField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('property_requests', function (Blueprint $table) {
            $table->dropColumn('property_id');
        });

        Schema::table('property_requests', function (Blueprint $table) {
            $table->string('property_id', 255)->after('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_requests', function (Blueprint $table) {
            $table->dropColumn('property_id');
        });

        Schema::table('property_requests', function (Blueprint $table) {
            $table->bigInteger('property_id')->after('user_id');
        });
    }
}
