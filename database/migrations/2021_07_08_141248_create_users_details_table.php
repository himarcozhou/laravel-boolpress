<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDetailsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();

            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("province")->nullable();
            $table->integer("zip")->nullable();
            $table->date("birthDate")->nullable();
            $table->date("birthCountry")->nullable();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")
                ->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_details');
    }
}
