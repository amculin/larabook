<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'nik',
        'full_name',
        'birth_date',
        'address',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the borrowed books.
     */
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }
}
