<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = ['followerId','followeeId','approved'];

    public function scopeApproved($query)
    {
        $query->where('approved', true);
    }
    public function scopePending($query)
    {
        $query->where('approved', false);
    }
}
