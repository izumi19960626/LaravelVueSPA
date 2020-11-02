<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;

class InformationController extends Controller
{
    public function index(){
      $infomations = Information::orderby('id','desc')->get();

      return $infomations;
    }
}
