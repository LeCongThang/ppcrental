<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 09 Jul 2017 11:35:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HbbLanguage
 * 
 * @property int $id
 * @property string $language
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class HbbLanguage extends Eloquent
{
	protected $table = 'hbb_language';

	protected $fillable = [
		'language'
	];
}
