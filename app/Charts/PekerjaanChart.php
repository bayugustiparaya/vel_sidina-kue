<?php

namespace App\Charts;

use App\Models\Penduduk\Penduduk;
use App\Traits\HasStatistik;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PekerjaanChart
{
    use HasStatistik;
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $pekerjaan  = $this->makeData(Penduduk::class, 'pekerjaan');
        return $this->chart->barChart()
            ->setTitle('Berdasarkan Jenis Pekerjaan.')
            ->setSubtitle('Total penduduk = ' . $pekerjaan['total_penduduk'])
            ->addData('Jumlah', array_column($pekerjaan['data'], 'pekerjaan_count'))
            ->setXAxis(array_column($pekerjaan['data'], 'pekerjaan'))
            ->setSparkline();
    }
}
