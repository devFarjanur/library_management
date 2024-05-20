<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('borrow_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrow_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->enum('status', ['approved', 'rejected', 'returned'])->default('approved');
            $table->timestamp('return_due_date')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->integer('fine')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrow_approvals');
    }
}
