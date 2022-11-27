<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

	/**
     * Get the parent likeable model (user or post).
     */
    public function likeable()
    {
        return $this->morphTo();
    }

	public function user() {
		return $this->belongsTo(User::class);
	}
}
