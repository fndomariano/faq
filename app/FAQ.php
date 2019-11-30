<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
	protected $table    = 'faq';
	protected $guarded  = ['id', 'created_at', 'update_at'];
	protected $fillable = [
		'reference', 
		'useful', 
		'useless', 
		'question', 
		'answer', 
		'created_by'
	];	

	public function vote($vote)
	{		
		if ($vote == 'yes') {
			$this->useful++;
		}

		if ($vote == 'no') {
			$this->useless++;
		}		
		
		return $this;
	}
}
