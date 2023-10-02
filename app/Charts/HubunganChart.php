<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class HubunganChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $hubungan  = $this->makeData(Penduduk::class, 'hubungan');
        return $this->chart->donutChart()
            ->setTitle('Hubungan Di Keluarga.')
            ->setSubtitle('Total penduduk = ' . $hubungan['total_penduduk'])
            ->addData(array_column($hubungan['data'], 'hubungan_count'))
            ->setLabels(array_column($hubungan['data'], 'hubungan'));
    }
}
