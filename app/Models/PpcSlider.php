<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 04:02:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcSlider
 * 
 * @property int $id
 * @property string $slider
 * @property bool $status
 * @property int $sort_order
 *
 * @package App\Models
 */
class PpcSlider extends Eloquent
{
	protected $table = 'ppc_slider';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'slider',
		'status',
		'sort_order'
	];
}
