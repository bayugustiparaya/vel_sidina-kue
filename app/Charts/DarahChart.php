<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DarahChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $darah  = $this->makeData(Penduduk::class, 'darah');
        return $this->chart->donutChart()
            ->setTitle('Berdasarkan Golongan Darah.')
            ->setSubtitle('Total penduduk = ' . $darah['total_penduduk'])
            ->addData(array_column($darah['data'], 'darah_count'))
            ->setLabels(array_column($darah['data'], 'darah'));
    }
}
