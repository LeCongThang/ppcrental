<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 04:02:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcUserPermission
 * 
 * @property int $id
 * @property int $user_id
 * @property int $permission_id
 *
 * @package App\Models
 */
class PpcUserPermission extends Eloquent
{
	protected $table = 'ppc_user_permission';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'permission_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'permission_id'
	];
}
