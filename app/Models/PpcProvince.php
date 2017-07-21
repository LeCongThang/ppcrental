<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 08:50:48 +0000.
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
