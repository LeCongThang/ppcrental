<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 08:50:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcAgent
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property bool $status
 *
 * @package App\Models
 */
class PpcAgent extends Eloquent
{
	protected $table = 'ppc_agent';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
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
		'address',
		'status'
	];
}
