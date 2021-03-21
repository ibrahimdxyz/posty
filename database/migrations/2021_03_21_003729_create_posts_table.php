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
            $table->id(); // creates an auto incrementing id (obviously)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // 'cascsde' deletes all posts if user is deleted
            $table->text('body');
            $table->timestamps(); // creates created_at and updated_at timestamp columns
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
