<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     * Creates A Table: posts
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // Creates an ID field
            $table-> string('title', 50);   // Added by me
            $table->mediumText('body'); // Added by me, mediumText: longer than string
            $table->timestamps();       // Creates 2 timestamp columns: created_at & updated at: will be auto-filled
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // For when rolling back the migration
    {
        Schema::dropIfExists('posts'); // will just drop the table
    }
}
