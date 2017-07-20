<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 19 Jul 2017 07:11:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcProvince
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class PpcProvince extends Eloquent
{
	protected $table = 'ppc_province';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
