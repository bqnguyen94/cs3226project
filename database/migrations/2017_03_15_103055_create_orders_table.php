<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->float('final_price', 5, 2)->unsigned()->nullable();
            $table->integer('buyer_id')->unsigned();
            $table->string('deliver_location');
            $table->integer('deliverer_id')->unsigned()->nullable();
            $table->boolean('is_delivered')->default(false);
            $table->boolean('is_received')->default(false);
            $table->longText('buyer_feedback')->nullable();
            $table->longText('deliverer_feedback')->nullable();
            $table->tinyInteger('buyer_rating')->nullable();
            $table->tinyInteger('deliverer_rating')->nullable();
            $table->tinyInteger('buyer_rates')->nullable();
            $table->tinyInteger('deliverer_rates')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('deliverer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE orders ADD CONSTRAINT chk_user_ids CHECK (buyer_id != deliverer_id);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
