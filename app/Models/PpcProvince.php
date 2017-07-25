<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jul 2017 03:25:08 +0000.
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
