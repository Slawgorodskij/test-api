<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SalonServices;
use Illuminate\Http\Response;

class SalonController extends Controller
{
    public function citySalonName()
    {
        $queryResult = app(SalonServices::class)
            ->RequestProcessingCitySalonName();

        if ($queryResult) {
            return response($queryResult, Response::HTTP_OK);
        }

        return response('Запрос не отработан', Response::HTTP_NOT_FOUND);
    }

    public function stockStats()
    {
        $queryResult = app(SalonServices::class)
            ->RequestProcessingStockStats();

        if ($queryResult) {
            return response($queryResult, Response::HTTP_OK);
        }

        return response('Запрос не отработан', Response::HTTP_NOT_FOUND);
    }

    public function stockPrice()
    {
        $queryResult = app(SalonServices::class)
            ->RequestProcessingStockPrice();

        if ($queryResult) {
            return response($queryResult, Response::HTTP_OK);
        }

        return response('Запрос не отработан', Response::HTTP_NOT_FOUND);
    }

    public function colorStats()
    {
        $queryResult = app(SalonServices::class)
            ->RequestProcessingColorStats();

        if ($queryResult) {
            return response($queryResult, Response::HTTP_OK);
        }

        return response('Запрос не отработан', Response::HTTP_NOT_FOUND);
    }

    public function stockStatsOrder()
    {
        $queryResult = app(SalonServices::class)
            ->RequestProcessingStockStatsOrder();

        if ($queryResult) {
            return response($queryResult, Response::HTTP_OK);
        }

        return response('Запрос не отработан', Response::HTTP_NOT_FOUND);
    }
}
