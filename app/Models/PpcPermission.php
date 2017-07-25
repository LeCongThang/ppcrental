<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jul 2017 03:25:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcPermission
 * 
 * @property int $id
 * @property string $name
 * @property string $link
 *
 * @package App\Models
 */
class PpcPermission extends Eloquent
{
	protected $table = 'ppc_permission';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'link'
	];
}
