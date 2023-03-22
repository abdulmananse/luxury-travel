<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('municipal_fee', 20)->after('currency')->nullable();
            $table->string('occupancy_fee', 20)->after('currency')->nullable();
            $table->string('gratuity_fee', 20)->after('currency')->nullable();
            $table->string('security_deposit', 20)->after('currency')->nullable();
            $table->string('vat_rate', 20)->after('commission')->nullable();
        });
        Schema::table('duplicate_properties', function (Blueprint $table) {
            $table->string('municipal_fee', 20)->after('currency')->nullable();
            $table->string('occupancy_fee', 20)->after('currency')->nullable();
            $table->string('gratuity_fee', 20)->after('currency')->nullable();
            $table->string('security_deposit', 20)->after('currency')->nullable();
            $table->string('vat_rate', 20)->after('commission')->nullable();
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
            $table->dropColumn('municipal_fee');
            $table->dropColumn('occupancy_fee');
            $table->dropColumn('gratuity_fee');
            $table->dropColumn('security_deposit');
            $table->dropColumn('vat_rate');
        });
        Schema::table('duplicate_properties', function (Blueprint $table) {
            $table->dropColumn('municipal_fee');
            $table->dropColumn('occupancy_fee');
            $table->dropColumn('gratuity_fee');
            $table->dropColumn('security_deposit');
            $table->dropColumn('vat_rate');
        });
    }
}
