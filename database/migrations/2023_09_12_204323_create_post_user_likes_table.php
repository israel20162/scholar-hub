<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserLikesTable extends Migration
{
    public function up()
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('forum_post_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['forum_post_id', 'user_id']);

            $table->foreign('forum_post_id')->references('id')->on('forum_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_user_likes');
    }
}
