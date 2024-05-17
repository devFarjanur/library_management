<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnBooksTable extends Migration
{
    public function up()
    {
        Schema::create('return_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrow_approval_id')->constrained('borrow_approvals')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->timestamp('returned_at')->useCurrent();
            $table->integer('fine')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('return_books');
    }
}
