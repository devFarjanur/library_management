<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BorrowApproval extends Model
{
    use HasFactory;

    protected $fillable = ['borrow_request_id', 'admin_id', 'user_id', 'book_id', 'status', 'return_due_date', 'returned_at', 'fine'];

    protected $dates = ['return_due_date', 'returned_at'];

    protected static function booted()
    {
        static::creating(function ($borrowApproval) {
            if (is_null($borrowApproval->return_due_date)) {
                $borrowApproval->return_due_date = Carbon::now()->addMinute();
            }
        });
    }

    public function isLate()
    {
        return Carbon::now()->greaterThan($this->return_due_date);
    }

    public function calculateFine()
    {
        if ($this->isLate()) {
            $secondsLate = Carbon::now()->diffInSeconds($this->return_due_date);
            return $secondsLate * 100; // Fine amount per second
        }
        return 0;
    }

    public function borrowRequest()
    {
        return $this->belongsTo(BorrowRequest::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
