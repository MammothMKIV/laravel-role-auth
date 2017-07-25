<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
	protected $table = 'visits';

	protected $fillable = [
		'path', 'user_id', 'ip',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
