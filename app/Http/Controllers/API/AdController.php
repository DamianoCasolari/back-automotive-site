<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {

        $ads = Ad::with('brandRelation')->orderByDesc('id')->get();

        if ($ads) {
            return response()->json([
                'success' => true,
                'ads' => $ads,
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    public function show($slug)
    {
        $ad = Ad::with('brandRelation')->where('slug', $slug)->first();

        if ($ad) {

            return response()->json([
                'success' => true,
                'result' => $ad
            ]);
        } else {

            return response()->json([
                'success' => false,
                'result' => 'Ad not found 404'
            ]);
        }
    }
}
