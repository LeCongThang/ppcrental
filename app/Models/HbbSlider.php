<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbSlider
 * 
 * @property int $id
 * @property string $link
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $update_at
 *
 * @package App\Models
 */
class HbbSlider extends Eloquent
{
	protected $table = 'hbb_slider';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'link',
		'status',
		'update_at'
	];
}
