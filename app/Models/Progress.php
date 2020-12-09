<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

	protected $fillable = ['problem_id', 'staff_id', 'process', 'description'];

	public function problem()
	{
		return $this->belongsTo(Problem::class);
	}

	public function proceed_by()
	{
		return $this->belongsTo(User::class, 'staff_id');
	}

	public static function grouped()
	{
		return Progress::with('proceed_by')
			->with('problem')
			->get()
			->groupBy('problem_id');
	}
}
