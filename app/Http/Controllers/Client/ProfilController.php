<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Penduduk\Penduduk;
use App\Models\Penduduk\PendudukAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        // dd(\Route::currentRouteName());
        $title = 'Profile';
        $backRoute = route('home');
        return view('client.pages.profile', compact('title', 'backRoute'));
    }

    public function nikSync(Request $request)
    {
        $cek = $request->validate([
            'niksync' => 'required|numeric|exists:App\Models\Penduduk\Penduduk,nik',
            'nomorhp' => 'required|numeric',
        ], [
            'niksync.required' => 'Nik Harus Diisi',
            'niksync.numeric' => 'Harus Berupa angka',
            'niksync.exists' => 'Maaf nik tidak ditemukan',
            'nomorhp.required' => 'Nomor Hp Harus Diisi',
        ]);

        if ($cek) {
            $found = Penduduk::where('nik', $request->niksync)->first();
            $akun = PendudukAkun::find(auth()->user()->id);
            $akun->penduduk_id = $found->id;
            $akun->name = $found->name;
            $akun->nomor_hp = $request->nomorhp;
            $akun->is_active = true;
            $akun->save();
            return Redirect::back()->with('sinkron-sukses', $akun->name);
        } else {
            return Redirect::back()->withErrors($request)->withInput();
        };
    }

    public function dataDiri()
    {
        $user = Penduduk::find(auth()->user()->penduduk_id);
        return view('client.pages.data_diri', compact('user'));
    }
}
