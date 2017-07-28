<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jul 2017 06:01:33 +0000.
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
