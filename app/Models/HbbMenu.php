<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbMenu
 * 
 * @property int $id
 * @property int $parrent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $update_at
 * @property int $status
 * @property int $sort_order
 *
 * @package App\Models
 */
class HbbMenu extends Eloquent
{
	protected $table = 'hbb_menu';
	public $timestamps = false;

	protected $casts = [
		'parrent_id' => 'int',
		'status' => 'int',
		'sort_order' => 'int'
	];

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'parrent_id',
		'update_at',
		'status',
		'sort_order'
	];
}
