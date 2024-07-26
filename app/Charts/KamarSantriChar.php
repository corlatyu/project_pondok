<?php

namespace App\Charts;

use App\Models\Santri;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KamarSantriChar
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $santris = Santri::select('kamar', Santri::raw('count(*) as total_kamar'))
                         ->groupBy('kamar')
                         ->get();

        $labels = $santris->pluck('kamar');
        $data = $santris->pluck('total_kamar');

        return $this->chart->barChart()
            ->setTitle('Jumlah Santri berdasarkan Kamar')
            ->addData('Jumlah Santri', $data->toArray())
            ->setXAxis($labels->toArray());
    }
}
