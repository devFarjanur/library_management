<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowApproval extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrow_request_id',
        'admin_id',
        'status',
    ];

    public function borrowRequest()
    {
        return $this->belongsTo(BorrowRequest::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}