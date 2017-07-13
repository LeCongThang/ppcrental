<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbLabelInSite
 * 
 * @property int $label_key
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $update_at
 *
 * @package App\Models
 */
class HbbLabelInSite extends Eloquent
{
	protected $table = 'hbb_label_in_site';
	protected $primaryKey = 'label_key';
	public $timestamps = false;

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'update_at'
	];
}
