<?php

namespace App\Http\Controllers;

use App\Charts\DarahChart;
use App\Charts\HubunganChart;
use App\Charts\JekelChart;
use App\Charts\KawinChart;
use App\Charts\PekerjaanChart;
use App\Charts\PendidikanChart;
use App\Charts\UsiaChart;
use App\Models\Berita\Berita;
use App\Models\Kenagarian\Nagari;
use App\Models\Penduduk\Penduduk;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Elibyy\TCPDF\Facades\TCPDF;

class HomeController extends Controller
{
    public function index()
    {
        $news = Berita::latest()->limit(5)->get();
        return view('client.pages.home', compact('news'));
    }

    public function berita()
    {
        $berita = Berita::latest()->get();
        $title = 'Berita';

        return view('client.pages.berita.list', compact('berita', 'title'));
    }

    public function detailBerita(string $id)
    {
        $detail = Berita::find($id);
        $title = 'Detail Berita';

        return view('client.pages.berita.detail', compact('detail', 'title'));
    }

    // use HasStatistik;
    public function hoho()
    {

        // dd(auth('admin')->user());
        // $result = $this->makeData(Penduduk::class, 'jekel');
        // return view('pdf-bak');

        $name = 'John Doe';
        $data['record'] = \App\Models\Keuangan\Spp::query('SELECT * from spp join bidang on spp.bidang_id = bidang.id join sub_bidang on spp.sub_bidang_id = sub_bidang.id where spp.id = 2')->get();
        // dd($data);
            $pdf = Pdf::loadView('pdf-bak',$data);
        // $pdf->set_option("isPhpEnabled", true);
        // $pdf->setPaper('A4', 'landscape');//
        $pdf->render();
      // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
        // Render the Blade view and capture the HTML content
        // $htmlContent = View::make('pdf-bak', compact('name'))->render();
        // TCPDF::SetTitle("List of users");
        // TCPDF::AddPage();
        // TCPDF::writeHTML($htmlContent, true, false, true, false, '');
        // TCPDF::Output(public_path('userlist2.pdf'),'F');    
        // return response()->download(public_path("userlist2.pdf"));
        // // Save the HTML content to an HTML file
        // file_put_contents(public_path('output.html'), $htmlContent);
        // return Pdf::loadHtml(file_get_contents(public_path('output.html')))->download('mydownload.pdf');
        // return 'HTML file exported successfully!';
        // array_map(fn ($data) => $data['age'], $result['data']);
        // return response($result)
        //     ->header('Content-Type', 'application/json');
        // json_encode($result);
        // dd($result);
    }

    public function profilenagari()
    {
        $nagari = Nagari::all();
        $title = 'Nagari';

        return view('client.pages.fitur_profil_nagari', compact('nagari', 'title'));
    }

    public function statistik()
    {
        $lachart = new LarapexChart();
        $chart_jekel = (new JekelChart($lachart))->build();
        $chart_pekerjaan = (new PekerjaanChart($lachart))->build();
        $chart_pendidikan = (new PendidikanChart($lachart))->build();
        $chart_usia = (new UsiaChart($lachart))->build();
        $chart_darah = (new DarahChart($lachart))->build();
        $chart_hubungan = (new HubunganChart($lachart))->build();
        $chart_kawin = (new KawinChart($lachart))->build();
        return view(
            'client.pages.statistik',
            compact(
                'lachart',
                'chart_jekel',
                'chart_pekerjaan',
                'chart_pendidikan',
                'chart_usia',
                'chart_darah',
                'chart_hubungan',
                'chart_kawin',
            )
        );
    }

    public function perangkat()
    {
        return view('client.pages.perangkat_nagari');
    }

    public function bantuan()
    {
        return view('client.pages.fitur_bantuan');
    }
}
