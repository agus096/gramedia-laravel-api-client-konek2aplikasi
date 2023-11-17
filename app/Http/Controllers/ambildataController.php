<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ambildataController extends Controller
{
    public function ambildata() {
        //inisialisasi url api tujuan
        $apiUrl = "http://127.0.0.1:8001/api/distribusi-list/";

        //untuk menggunkan Http:get install httpguzzel
        $response = Http::get($apiUrl);

        //inisialisasi kembali hasil json ke $data
        $data = $response->json();

        //kembali ke index.blade dengan membawa data
        return view('index' , compact('data'));
    }

    public function update(Request $request, $id) {

        //pada bagian update ini data hanya di inisialisasi dan menetapkan value baru .
        //proses simpan dan perubahan di tangani oleh contoller dari api terkait

        // Ambil data yang dikirimkan dari formulir
        $status = $request->input('status');

        // Kirim data ke API untuk update
        $response = Http::put("http://127.0.0.1:8001/api/distribusi-list/{$id}", [
            'status' => $status,
        ]);
        return redirect('/')->with('success', 'Data berhasil diupdate');
    }

}
