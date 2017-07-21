<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 08:50:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcProperty
 * 
 * @property int $id
 * @property bool $status
 * @property string $name
 * @property string $name_en
 * @property string $price
 * @property string $description
 * @property string $description_en
 * @property string $slug
 * @property string $slug_en
 * @property string $image_overall
 * @property int $property_status
 * @property int $property_type
 * @property string $location
 * @property int $bedroom
 * @property int $bathroom
 * @property string $area
 * @property int $parkingplace
 * @property string $feature
 * @property string $map
 * @property string $location_en
 * @property string $seotag
 * @property int $saler_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $district
 *
 * @package App\Models
 */
class PpcProperty extends Eloquent
{
	protected $table = 'ppc_property';

	protected $casts = [
		'status' => 'bool',
		'property_status' => 'int',
		'property_type' => 'int',
		'bedroom' => 'int',
		'bathroom' => 'int',
		'parkingplace' => 'int',
		'saler_id' => 'int',
		'district' => 'int'
	];

	protected $fillable = [
		'status',
		'name',
		'name_en',
		'price',
		'description',
		'description_en',
		'slug',
		'slug_en',
		'image_overall',
		'property_status',
		'property_type',
		'location',
		'bedroom',
		'bathroom',
		'area',
		'parkingplace',
		'feature',
		'map',
		'location_en',
		'seotag',
		'saler_id',
		'district'
	];
}
