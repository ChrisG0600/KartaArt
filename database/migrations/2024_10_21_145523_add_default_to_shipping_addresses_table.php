<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultToShippingAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->boolean('is_default')->default(false); // Add new column
        });
    }

    public function down()
    {
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->dropColumn('is_default'); // Drop column if rolled back
        });
    }
}

