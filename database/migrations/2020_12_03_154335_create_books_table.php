<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('language_id');
            $table->bigInteger('category_id');
            $table->string('name',255);
            $table->string('slug',255);
            $table->string('name_sindhi',255);
            $table->string('isbn_number',255)->nullable();
            $table->string('author',255)->nullable();
            $table->string('author_sindhi',255);
            $table->string('translator',255)->nullable();
            $table->string('publisher',255);
            $table->text('short_description')->nullable();
            $table->text('short_description_sindhi')->nullable();
            $table->string('year',10);
            $table->string('book_attachment',255);
            $table->text('book_attachment_url',255);
            $table->string('book_thumbnail',255);
            $table->text('book_thumbnail_url',255);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
        $table->dropSoftDeletes();
    }
}
