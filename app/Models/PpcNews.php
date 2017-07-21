<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 21 Jul 2017 04:02:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PpcNews
 * 
 * @property int $id
 * @property string $title
 * @property string $title_en
 * @property string $content
 * @property string $content_en
 * @property string $slug
 * @property string $slug_en
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $image
 * @property int $author_id
 * @property string $seotag
 *
 * @package App\Models
 */
class PpcNews extends Eloquent
{
	protected $casts = [
		'status' => 'bool',
		'author_id' => 'int'
	];

	protected $fillable = [
		'title',
		'title_en',
		'content',
		'content_en',
		'slug',
		'slug_en',
		'status',
		'image',
		'author_id',
		'seotag'
	];
}
