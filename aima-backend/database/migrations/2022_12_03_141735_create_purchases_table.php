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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->integer('qty');
            $table->decimal('purchase_amount', 8, 2)->nullable();
            $table->decimal('selling_amount', 8, 2)->nullable();
            $table->decimal('total_selling', 8, 2)->nullable();
            $table->decimal('total_purchase', 8, 2)->nullable();
            $table->text('description')->nullable();

            $table->foreignId('client_id')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};
