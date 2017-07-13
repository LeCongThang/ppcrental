<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/7/2017
 * Time: 10:31 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HbbSystemConfig;
use DB;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{

    public function __construct()
    {
        if (Session::get('username') == null || Session::get('user_id') == null) {

            return redirect('/admin/log-in');
        }

    }

}