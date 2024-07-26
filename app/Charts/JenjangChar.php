<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Santri;

class JenjangChar
{
    protected $chart1;

    public function __construct(LarapexChart $chart1)
    {
        $this->chart1 = $chart1;
    }

// Di dalam build() method JenjangChar
public function build(): \ArielMejiaDev\LarapexCharts\PieChart
{
    $jenjangCounts = Santri::select('jenjang', Santri::raw('count(*) as total'))
                         ->groupBy('jenjang')
                         ->get();

    $labels = $jenjangCounts->pluck('jenjang')->toArray();
    $data = $jenjangCounts->pluck('total')->toArray();

    return $this->chart1->pieChart()
        ->setTitle('Jumlah Santri per Jenjang')
        ->addData($data)
        ->setLabels($labels);
}
}