<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 08:50:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcDistrict
 * 
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property int $tinh_id
 * @property string $description
 * @property string $description_en
 * @property int $sort_order
 * @property bool $status
 * @property string $image
 *
 * @package App\Models
 */
class PpcDistrict extends Eloquent
{
	protected $table = 'ppc_district';
	public $timestamps = false;

	protected $casts = [
		'tinh_id' => 'int',
		'sort_order' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'name_en',
		'tinh_id',
		'description',
		'description_en',
		'sort_order',
		'status',
		'image'
	];
}
