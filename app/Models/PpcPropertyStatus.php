<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 04:02:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcPropertyStatus
 * 
 * @property int $id
 * @property string $status
 * @property string $status_en
 *
 * @package App\Models
 */
class PpcPropertyStatus extends Eloquent
{
	protected $table = 'ppc_property_status';
	public $timestamps = false;

	protected $fillable = [
		'status',
		'status_en'
	];
}
