<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'publisher_id',
        'dimension',
        'stock',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the publisher that publish the book.
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
