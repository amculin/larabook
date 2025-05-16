<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * Scope a query to only include borrowed books.
     */
    public function scopeBorrowed(Builder $query): void
    {
        $query->where('is_borrowed', 1);
    }

    /**
     * Get the member that borrow the book.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
