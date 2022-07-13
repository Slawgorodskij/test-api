<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SalonServices
{
    public function RequestProcessingCitySalonName()
    {
        return DB::table('cities')
            ->join('salons', 'salons.city_id', '=', 'cities.id')
            ->where('cities.status', '=', '1')
            ->where('salons.status', '=', '1')
            ->select(DB::raw('concat(cities.name, " " , salons.name) as city_salon_name'))
            ->get();
    }

    public function RequestProcessingStockStats()
    {
        return DB::table('salons')
            ->select(DB::raw('salons.name, count(stock.model_id) as count_auto'))
            ->join('stock', 'stock.salon_id', '=', 'salons.id')
            ->where('salons.status', '=', '1')
            ->groupBy('salons.name')
            ->orderBy('salons.name', 'ASC')
            ->get();
    }

    public function RequestProcessingStockPrice()
    {
        return DB::table('salons')
            ->select(DB::raw('salons.id, salons.name, max(stock.price) as cost_most_expensive_car'))
            ->join('stock', 'stock.salon_id', '=', 'salons.id')
            ->where('salons.status', '=', '1')
            ->groupBy('salons.id')
            ->get();
    }

    public function RequestProcessingColorStats()
    {
        return DB::table('stock')
            ->select(DB::raw('models.name as name_auto, colors.name as name_color_auto, count(stock.color_id) as count_auto'))
            ->join('models', 'stock.model_id', '=', 'models.id')
            ->join('colors', 'stock.color_id', '=', 'colors.id')
            ->groupBy('stock.color_id', 'stock.model_id')
            ->having('count_auto', '>', '10')
            ->get();
    }

    public function RequestProcessingStockStatsOrder()
    {
        return DB::table('salons')
            ->select(DB::raw('salons.name, count(stock.model_id) as count_auto'))
            ->leftJoin('stock', 'stock.salon_id', '=', 'salons.id')
            ->groupBy('salons.name')
            ->orderByRaw('count(stock.model_id)=0 ASC,salons.name ASC')
            ->get();
    }
}
