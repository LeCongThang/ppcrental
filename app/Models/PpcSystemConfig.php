<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Jul 2017 03:25:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcSystemConfig
 * 
 * @property int $id
 * @property string $logo
 * @property string $sologan
 * @property string $sologan_en
 * @property string $vietnam_address
 * @property string $vietnam_address_en
 * @property string $facebook
 * @property string $youtube
 * @property string $linked
 * @property string $mail
 * @property string $hotline
 * @property string $usa_address
 * @property string $usa_address_en
 * @property string $title
 * @property string $description
 * @property string $seokeyword
 * @property string $author
 * @property string $google_analytic
 * @property string $email_marketing
 *
 * @package App\Models
 */
class PpcSystemConfig extends Eloquent
{
	protected $table = 'ppc_system_config';
	public $timestamps = false;

	protected $fillable = [
		'logo',
		'sologan',
		'sologan_en',
		'vietnam_address',
		'vietnam_address_en',
		'facebook',
		'youtube',
		'linked',
		'mail',
		'hotline',
		'usa_address',
		'usa_address_en',
		'title',
		'description',
		'seokeyword',
		'author',
		'google_analytic',
		'email_marketing'
	];
}
