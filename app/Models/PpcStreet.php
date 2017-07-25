<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jul 2017 03:25:08 +0000.
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
