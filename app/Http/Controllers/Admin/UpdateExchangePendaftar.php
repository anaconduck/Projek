<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExchangeMataKuliah;
use App\Models\ExchangePendaftar;
use App\Models\ExchangeTujuan;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateExchangePendaftar extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'SE Pendaftar',
                'link' => url('/admin/se/pendaftar')
            ]
            ];
    }

    public function index(ExchangePendaftar $pendaftar){
        if(!$pendaftar) abort(404);

        array_push($this->nav, [
            'title' => $pendaftar->id,
            'link' => url('/admin/se/pendaftar/'.$pendaftar->id)
        ]);

        $pendaftar->id_exchange_mata_kuliah = json_decode($pendaftar->id_exchange_mata_kuliah);
        $pendaftar->file = json_decode($pendaftar->file, true);
        $mahasiswa = User::where('identity', $pendaftar->identity)
            ->first();

        $tujuan = ExchangeTujuan::find($pendaftar->id_exchange_tujuan);
        $mk = ExchangeMataKuliah::whereIn('id', $pendaftar->id_exchange_mata_kuliah)->get();
        $dokumentasi = [];
        $size = sizeof($pendaftar->file) - sizeof(config('app.dokumentasi'));
        for($i = 0; $i<$size; $i++){
            array_push($dokumentasi, $pendaftar->file['_'.$i]);
        }
        return view('admin.update-exchange-pendaftar',[
            'title' => 'Update Exchange Pendaftar',
            'nav' => $this->nav,
            'pendaftar' => $pendaftar,
            'mhs' => $mahasiswa,
            'tujuan' => $tujuan,
            'mk' => $mk,
            'dokumentasi' => $dokumentasi
        ]);
    }
    public function update(Request $request, ExchangePendaftar $pendaftar){
        if(!$pendaftar) abort(404);

        $request->validate([
            'status_kelulusan' => 'required|min:0|max:1',
            'status_pendaftaran' =>'required|min:0|max:1',
        ]);

        $data = $request->only(['status_kelulusan', 'status_pendaftaran', 'catatan']);
        if($request->get('submit') == 'update'){
            $pendaftar->status_kelulusan = $data['status_kelulusan'];
            $pendaftar->status_pendaftaran = $data['status_pendaftaran'];
            $pendaftar->catatan = $data['catatan'];
            if($pendaftar->save())
                return redirect(url('/admin/se/pendaftar'));
        }else if($request->get('submit') == 'delete'){
            $pendaftar->delete();
            redirect(url('/admin/se/pendaftar'));
        }
        abort(500);
    }
}
