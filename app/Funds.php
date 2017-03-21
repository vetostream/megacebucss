<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funds extends Model
{
		/**
	 * The table associated with the model.
	 *
	 * @var string
	 */

	protected $table = 'funds';

	/**
	 * The attributes that are mass assignable
	 *
	 * @var array
	 */

	protected $fillable = ['funder_id', 'research_id', 'amount_given'];
}
