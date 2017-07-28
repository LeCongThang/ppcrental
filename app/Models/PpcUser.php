<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jul 2017 06:01:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcUser
 * 
 * @property int $id
 * @property string $email
 * @property string $fullname
 * @property string $password
 * @property string $username
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $avatar
 * @property bool $status
 * @property string $remember_token
 * @property string $phone
 * @property string $office_phone
 * @property string $address
 * @property string $address_en
 * @property bool $user_type
 *
 * @package App\Models
 */
class PpcUser extends Eloquent
{
	protected $casts = [
		'status' => 'bool',
		'user_type' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'email',
		'fullname',
		'password',
		'username',
		'avatar',
		'status',
		'remember_token',
		'phone',
		'office_phone',
		'address',
		'address_en',
		'user_type'
	];
}
