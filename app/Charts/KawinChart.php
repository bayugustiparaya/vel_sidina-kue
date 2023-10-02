<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KawinChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $kawin  = $this->makeData(Penduduk::class, 'kawin');
        return $this->chart->donutChart()
            ->setTitle('Berdasarkan Status Perkawinan.')
            ->setSubtitle('Total penduduk = ' . $kawin['total_penduduk'])
            ->addData(array_column($kawin['data'], 'kawin_count'))
            ->setLabels(array_column($kawin['data'], 'kawin'));
    }
}
