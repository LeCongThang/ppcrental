<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbUser
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $avatar
 * @property bool $status
 * @property \Carbon\Carbon $create_at
 * @property \Carbon\Carbon $update_at
 * @property string $remember_token
 *
 * @package App\Models
 */
class HbbUser extends Eloquent
{
	protected $table = 'hbb_user';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $dates = [
		'create_at',
		'update_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'fullname',
		'avatar',
		'status',
		'create_at',
		'update_at',
		'remember_token'
	];
}
