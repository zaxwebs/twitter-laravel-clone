<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function hashtags() {
		return $this->morphedByMany(Hashtag::class, 'mentionnable', 'mentions');
	}

	public function ats() {
		return $this->morphedByMany(User::class, 'mentionnable', 'mentions');
	}

	public function tweets()
    {
        return $this->morphedByMany(Tweet::class, 'mentionnable', 'mentions');
    }

	// TODO: Verify this relation
	public function retweets()
    {
        return $this->morphMany(Mention::class, 'mentionnable');
    }

	public function likes() {
		return $this->morphMany(Like::class, 'likeable');
	}
}
