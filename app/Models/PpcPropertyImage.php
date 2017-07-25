<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jul 2017 03:25:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcPropertyImage
 * 
 * @property int $id
 * @property int $property_id
 * @property int $image
 *
 * @package App\Models
 */
class PpcPropertyImage extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'property_id' => 'int',
		'image' => 'int'
	];

	protected $fillable = [
		'property_id',
		'image'
	];
}
