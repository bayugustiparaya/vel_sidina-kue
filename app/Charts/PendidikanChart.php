<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendidikanChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $pendidikan  = $this->makeData(Penduduk::class, 'pendidikan');
        return $this->chart->donutChart()
            ->setTitle('Berdasarkan Pendidikan Terakhir.')
            ->setSubtitle('Total penduduk = ' . $pendidikan['total_penduduk'])
            ->addData(array_column($pendidikan['data'], 'pendidikan_count'))
            ->setLabels(array_column($pendidikan['data'], 'pendidikan'));
    }
}
