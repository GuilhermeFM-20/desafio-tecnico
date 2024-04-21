<?php

namespace App\Http\Controllers;

use App\Services\CitiesByStateService;
use Illuminate\Http\JsonResponse;

class CitiesByStateController extends Controller
{
    
    public function __invoke(string $uf): JsonResponse
    {
        $cities = app(CitiesByStateService::class)
                ->setState($uf)
                ->getCitiesByState();

        return response()->json(['cities'=>$cities],200);
    }

}
