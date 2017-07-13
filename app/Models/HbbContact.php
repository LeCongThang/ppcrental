<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbContact
 * 
 * @property int $id
 * @property string $from_email
 * @property string $phone_number
 * @property string $title
 * @property string $message
 * @property \Carbon\Carbon $send_at
 * @property int $status
 * @property string $from_id_address
 * @property int $current_language
 *
 * @package App\Models
 */
class HbbContact extends Eloquent
{
	protected $table = 'hbb_contact';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'current_language' => 'int'
	];

	protected $dates = [
		'send_at'
	];

	protected $fillable = [
		'from_email',
		'phone_number',
		'title',
		'message',
		'send_at',
		'status',
		'from_id_address',
		'current_language'
	];
}
