<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jul 2017 06:01:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcAgentProperty
 * 
 * @property int $id
 * @property string $title
 * @property string $title_en
 *
 * @package App\Models
 */
class PpcAgentProperty extends Eloquent
{
	protected $table = 'ppc_agent_property';
	public $timestamps = false;

	protected $fillable = [
		'title',
		'title_en'
	];
}
