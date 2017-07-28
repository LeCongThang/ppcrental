<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jul 2017 06:01:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcAbout
 * 
 * @property int $id
 * @property string $intro
 * @property string $about
 * @property string $ourteam
 * @property string $ceo
 * @property string $ceo_en
 * @property string $about_en
 * @property string $ourteam_en
 * @property string $intro_en
 * @property string $image
 *
 * @package App\Models
 */
class PpcAbout extends Eloquent
{
	protected $table = 'ppc_about';
	public $timestamps = false;

	protected $fillable = [
		'intro',
		'about',
		'ourteam',
		'ceo',
		'ceo_en',
		'about_en',
		'ourteam_en',
		'intro_en',
		'image'
	];
}
