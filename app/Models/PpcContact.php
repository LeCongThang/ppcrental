<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jul 2017 06:01:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcContact
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property bool $status
 * @property string $client_ip
 * @property \Carbon\Carbon $created_at
 *
 * @package App\Models
 */
class PpcContact extends Eloquent
{
	protected $table = 'ppc_contact';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'message',
		'status',
		'client_ip'
	];
}
