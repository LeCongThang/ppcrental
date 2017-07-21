<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 04:02:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcPropertyFeature
 * 
 * @property int $id
 * @property string $feature
 * @property string $feature_en
 * @property bool $status
 *
 * @package App\Models
 */
class PpcPropertyFeature extends Eloquent
{
	protected $table = 'ppc_property_feature';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'feature',
		'feature_en',
		'status'
	];
}
