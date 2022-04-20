<?php

use App\Models\Carrier;
use App\Models\Quote;
use App\Models\Tariff;
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
        Schema::create('quote_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quote::class)->constrained();
            $table->foreignIdFor(Carrier::class)->constrained();
            $table->foreignIdFor(Tariff::class)->constrained();
            $table->bigInteger('quote_detail_id');
            $table->unsignedBigInteger('quote_number');
            $table->decimal('base_charge', 18);
            $table->decimal('net_charge', 18);
            $table->string('transit_time',5);
            $table->string('origin_phone');
            $table->string('dest_phone');
            $table->string('message', 200)->nullable(true)->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_details');
    }
};
