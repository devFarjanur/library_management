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
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['approved', 'rejected'])->default('approved');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('borrow_approvals');
    }
}