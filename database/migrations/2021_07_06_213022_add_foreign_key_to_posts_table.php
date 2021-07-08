<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")
                ->references("id")
                ->on("users");

            //uguale a questo sotto
            /*
            $table->foreignId("user_id") //chiave user_id, quindi cerchera' nella table "users" il id
                ->constrained(); 
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign("posts_user_id_foreign");// the relation has to be dropped too
            $table->dropColumn("user_id");
        });
    }
}
