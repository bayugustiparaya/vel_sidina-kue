<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait HasStatistik
{
    /**
     * Membuat data array untuk statistik.
     * @return array
     * @param string $model contoh Penduduk::class
     * @param string $relation nama relasi yang sudah dibuat di model, khusus golongan usia atau umur gunakan age
     */
    public function makeData(String $model, String $relation): array
    {
        $result = array();
        $data = array();
        $emt_count = 0;
        $emt_title = "Belum terisi";
        $modelDatas = null;

        if ($relation == 'age') {
            $balita = 0;
            $anak = 0;
            $remaja = 0;
            $dewasa = 0;
            $lansia = 0;
            $modelDatas = $model::select('id', 'tgl_lahir')
                ->get()
                ->toArray();
            foreach ($modelDatas as $value) {
                if (is_null($value[$relation]) || $value[$relation] == 'null') {
                    $emt_count++;
                } else if ($value['age'] >= 46) {
                    $lansia++;
                } else if ($value['age'] >= 26) {
                    $dewasa++;
                } else if ($value['age'] >= 12) {
                    $remaja++;
                } else if ($value['age'] >= 6) {
                    $anak++;
                } else {
                    $balita++;
                }
            }
            $data = [
                [
                    $relation . '_id' => 1,
                    $relation => 'Balita',
                    $relation . '_count' => $balita,
                ],
                [
                    $relation . '_id' => 2,
                    $relation => 'Anak-anak',
                    $relation . '_count' => $anak,
                ],
                [
                    $relation . '_id' => 3,
                    $relation => 'Remaja',
                    $relation . '_count' => $remaja,
                ],
                [
                    $relation . '_id' => 4,
                    $relation => 'Dewasa',
                    $relation . '_count' => $dewasa,
                ],
                [
                    $relation . '_id' => 5,
                    $relation => 'Lansia',
                    $relation . '_count' => $lansia,
                ],
            ];
        } else {
            $modelDatas = $model::with($relation)
                ->select(DB::raw('count(*) as ' . $relation . '_count, ' . $relation . '_id'))
                ->groupBy($relation . '_id')
                ->get()
                ->toArray();
            foreach ($modelDatas as $value) {
                if (is_null($value[$relation]) || $value[$relation] == 'null') {
                    $emt_count += $value[$relation . '_count'];
                } else {
                    $temp = [
                        $relation . '_id' => $value[$relation . '_id'],
                        $relation => $value[$relation]['name'],
                        $relation . '_count' => $value[$relation . '_count'],
                    ];
                    array_push($data, $temp);
                }
            }
        }
        if ($emt_count != 0) {
            $data_kosong = [
                $relation . '_id' => 0,
                $relation => $emt_title,
                $relation . '_count' => $emt_count,
            ];
            array_push($data, $data_kosong);
        }
        $result = [
            'total_penduduk' => array_sum(array_column($data, $relation . '_count')),
            'data' => $data
        ];

        return $result;
    }
}
