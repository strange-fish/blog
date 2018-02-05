<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static function success($data = [], $msg = ''): Response {
      return response([
        'status' => 1,
        'data' => $data,
        'msg' => $msg,
      ], 200);
    }
    protected static function fail($msg = '', $data = []): Response {
      return response([
        'status' => 0,
        'data' => $data,
        'msg' => $msg,
      ], 404);
    }
}
