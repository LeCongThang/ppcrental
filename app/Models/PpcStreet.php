<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 08:50:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcStreet
 * 
 * @property int $ID
 * @property string $name
 * @property int $huyen_id
 *
 * @package App\Models
 */
class PpcStreet extends Eloquent
{
	protected $table = 'ppc_street';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'huyen_id' => 'int'
	];

	protected $fillable = [
		'name',
		'huyen_id'
	];
}
