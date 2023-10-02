<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JekelChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $jekel  = $this->makeData(Penduduk::class, 'jekel');
        return $this->chart->donutChart()
            ->setTitle('Berdasarkan Jenis Kelamin.')
            ->setSubtitle('Total penduduk = ' . $jekel['total_penduduk'])
            ->addData(array_column($jekel['data'], 'jekel_count'))
            ->setLabels(array_column($jekel['data'], 'jekel'));
    }
}
