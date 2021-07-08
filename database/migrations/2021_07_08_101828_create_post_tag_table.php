<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('post_tag', function (Blueprint $table) {
            //$table->id();
            /*
            da togliere perche' ci serve questo che ci fa da id
            $table->primary(["post_id", "tag_id"]);
            */
            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")
                ->references("id")
                ->on("posts");

            $table->unsignedBigInteger("tag_id");
            $table->foreign("tag_id")
                ->references("id")
                ->on("tags");

            /* 
            $table->foreignId("post_id")->constrained();
            $table->foreignId("tag_id")->constrained(); 
            */

            $table->primary(["post_id", "tag_id"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('post_tag');
    }
}
