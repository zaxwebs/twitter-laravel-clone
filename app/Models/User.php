<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function tweets()
	{
		return $this->hasMany(Tweet::class)->orderBy('created_at', 'desc');
	}

	public function following()
	{
		return $this->belongsToMany(User::class, 'follows', 'user_id', 'followed_user_id');
	}

	public function followers()
	{
		return $this->belongsToMany(User::class, 'follows', 'followed_user_id', 'user_id');
	}

	public function isFollowing(User $user)
	{
		return !!$this->following()->where('followed_user_id', $user->id)->count();
	}

	public function isFollowedBy(User $user)
	{
		return !!$this->followers()->where('user_id', $user->id)->count();
	}

	public function mentions()
	{
		return $this->morphMany(Mention::class, 'mentionnable');
	}

	public function ats()
	{
		return $this->mentions()->with('tweet');
	}
}