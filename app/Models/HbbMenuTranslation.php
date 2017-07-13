<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbMenuTranslation
 * 
 * @property int $id
 * @property int $language_id
 * @property int $menu_id
 * @property string $menu_name
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $update_at
 *
 * @package App\Models
 */
class HbbMenuTranslation extends Eloquent
{
	protected $table = 'hbb_menu_translation';
	public $timestamps = false;

	protected $casts = [
		'language_id' => 'int',
		'menu_id' => 'int'
	];

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'language_id',
		'menu_id',
		'menu_name',
		'slug',
		'update_at'
	];
}
