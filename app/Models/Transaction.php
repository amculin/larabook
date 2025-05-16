<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    const IS_BORROWED = 1;
    const IS_RETURNED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'book_id',
        'member_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Scope a query to only include borrowed books.
     */
    public function scopeBorrowed(Builder $query): void
    {
        $query->where('is_borrowed', self::IS_BORROWED);
    }

    /**
     * Scope a query to only include returned books.
     */
    public function scopeReturned(Builder $query): void
    {
        $query->where('is_borrowed', self::IS_RETURNED);
    }

    /**
     * Get the member that borrow the book.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Get the book that borrowed by the member.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
