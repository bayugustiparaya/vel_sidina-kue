<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UsiaChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $age  = $this->makeData(Penduduk::class, 'age');
        return $this->chart->donutChart()
            ->setTitle('Berdasarkan Golongan Usia.')
            ->setSubtitle('Total penduduk = ' . $age['total_penduduk'])
            ->addData(array_column($age['data'], 'age_count'))
            ->setLabels(array_column($age['data'], 'age'));
    }
}
