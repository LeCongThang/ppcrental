<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jul 2017 06:01:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcSearch
 * 
 * @property int $id
 * @property int $number
 * @property bool $type
 *
 * @package App\Models
 */
class PpcSearch extends Eloquent
{
	protected $table = 'ppc_search';
	public $timestamps = false;

	protected $casts = [
		'number' => 'int',
		'type' => 'bool'
	];

	protected $fillable = [
		'number',
		'type'
	];
}
