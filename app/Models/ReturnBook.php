<?php

// ReturnBook.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    protected $fillable = ['borrow_approval_id', 'user_id', 'book_id', 'fine'];

    public function borrowApproval()
    {
        return $this->belongsTo(BorrowApproval::class);
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

