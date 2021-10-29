<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('product_pack_id');
            $table->unsignedBigInteger('product_status_id');
            $table->unsignedInteger('cost');
            $table->unsignedInteger('new_cost')->nullable();
            $table->smallInteger('group');
            $table->tinyInteger('fat');
            $table->smallInteger('weight');
            $table->tinyInteger('temperature');
            $table->tinyInteger('life_time');
            $table->unsignedSmallInteger('limit');
            $table->timestamps();

            $table->foreign('partner_id')
                ->references('id')->on('partners')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_type_id')
                ->references('id')->on('product_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_pack_id')
                ->references('id')->on('product_packs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_status_id')
                ->references('id')->on('product_statuses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
