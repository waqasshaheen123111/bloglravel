<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('yt_iframe');
            $table->text('meta_description');
            $table->text('meta_title');
            $table->text('meta_keyword');
            $table->tinyInteger('status')->default('0');
            $table->integer('created_by');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
