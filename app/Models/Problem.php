<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

	protected $fillable = ['ticket_number', 'ip_address', 'description', 'image_path', 'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function progress()
	{
		return $this->hasMany(Progress::class);
	}

	public function onProgress()
	{
		return $this->hasMany(Progress::class)->where('process', 'on progress');
	}
}
