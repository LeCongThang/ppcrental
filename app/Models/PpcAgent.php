<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 17 Jul 2017 06:08:37 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcAgent
 * 
 * @property int $id
 * @property string $username
 * @property int $password
 * @property int $fullname
 * @property string $email
 * @property string $phone
 * @property string $address
 *
 * @package App\Models
 */
class PpcAgent extends Eloquent
{
	protected $table = 'ppc_agent';
	public $timestamps = false;

	protected $casts = [
		'password' => 'int',
		'fullname' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'fullname',
		'email',
		'phone',
		'address'
	];
}