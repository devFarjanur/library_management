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
        // Cast return_due_date to Carbon instance if it's a string
        $returnDueDate = $this->return_due_date instanceof Carbon ? $this->return_due_date : new Carbon($this->return_due_date);

        // Debugging: Log the return_due_date and current time
        \Log::info('Return Due Date: ' . $returnDueDate->toDateTimeString());
        \Log::info('Current Time: ' . Carbon::now()->toDateTimeString());

        // Check if the current time is greater than the return due date
        return Carbon::now()->greaterThan($returnDueDate);
    }

    public function calculateFine()
    {
        if ($this->isLate()) {
            // Cast return_due_date to Carbon instance if it's a string
            $returnDueDate = $this->return_due_date instanceof Carbon ? $this->return_due_date : new Carbon($this->return_due_date);

            // Calculate seconds late
            $secondsLate = Carbon::now()->diffInSeconds($returnDueDate);

            // Debugging: Log the seconds late and fine
            \Log::info('Seconds Late: ' . $secondsLate);
            \Log::info('Fine: ' . $secondsLate * 100);

            return $secondsLate * 100; // Fine amount per second, e.g., 100 units per second
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
