<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

	protected $fillable = ['problem_id', 'proceed_by', 'process', 'description'];

	public function problem()
	{
		return $this->belongsTo(Problem::class);
	}
	
	public function staff()
	{
		return $this->belongsTo(User::class, 'proceed_by');
	}
}
