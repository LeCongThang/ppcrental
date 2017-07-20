<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 19 Jul 2017 07:11:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcWard
 * 
 * @property int $id
 * @property string $name
 * @property int $huyen_id
 *
 * @package App\Models
 */
class PpcWard extends Eloquent
{
	protected $table = 'ppc_ward';
	public $timestamps = false;

	protected $casts = [
		'huyen_id' => 'int'
	];

	protected $fillable = [
		'name',
		'huyen_id'
	];
}
