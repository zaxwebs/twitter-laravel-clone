<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    use HasFactory;

	public function tweet() {
		return $this->belongsTo(Tweet::class);
	}

	/**
     * Get the parent mentionnable model.
     */
	public function mentionnable()
    {
        return $this->morphTo();
    }

}
