<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class MapController extends Controller
{
  public function getMap()
  {
    $province = Province::all();
    dd($province);
  }

  public function getProvince()
  {
    $province = Province::all();
    return response()->json($province);
  }
  public function getDistrict()
  {
  }
  public function getWard()
  {
  }

  public function postProvince(Request $request)
  {
    // $district = Province::with('districts')->where('id', $request->get('province_id'))->get();
    $district = District::where('province_id', $request->province_id)->get();
    // $district = Province::with('districts')->where('id', $request->province_id)->get();
    return response()->json($district);
  }
  public function postDistrict(Request $request)
  {
    $ward = Ward::where('district_id', $request->district_id)->get();
    return response()->json($ward);
  }
}