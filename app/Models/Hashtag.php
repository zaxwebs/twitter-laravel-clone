<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hashtag extends Model
{
    use HasFactory;

	public function mentions()
    {
        return $this->morphMany(Mention::class, 'mentionnable');
    }

	public function tweets() {
		return $this->mentions()->with('tweet');
	}

	/*
	* Gets the trending hashtags. Have to figure out if this is the right place for this function.
	*/
	public static function trending($since = null) {

	$since = $since ?: Carbon::yesterday();

	$ids = Mention::selectRaw('mentionnable_id, count(mentionnable_id) as frequency')
		->groupBy('mentionnable_id')
		->where('mentionnable_type', 'App\Models\Hashtag')
		->whereDate('created_at', '>', $since)
		->orderBy('frequency', 'desc')
		->get()->pluck('mentionnable_id')->toArray();
	
	// Return an empty collection if no mentions exist in DB.
	if(!$ids) {
		return collect();
	}

	$imploded_ids = implode(',', $ids);
	$hashtags = Hashtag::whereIn('id', $ids)->orderByRaw(\DB::raw("FIELD(id, $imploded_ids)"))->get();

	return $hashtags;
	}
}
