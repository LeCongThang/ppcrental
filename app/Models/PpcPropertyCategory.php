<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 08:50:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcPropertyCategory
 * 
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property string $slug
 * @property string $slug_en
 * @property bool $status
 * @property int $sort_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $parent_id
 *
 * @package App\Models
 */
class PpcPropertyCategory extends Eloquent
{
	protected $table = 'ppc_property_category';

	protected $casts = [
		'status' => 'bool',
		'sort_order' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'name_en',
		'slug',
		'slug_en',
		'status',
		'sort_order',
		'parent_id'
	];
}
