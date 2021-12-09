<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            /**  $table->foreignId('article_id')->constrained();*/

            $table->id();
            /** $table->foreignId('author_id')->constrained(); */
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            /**
             
            $table->img('image');
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
