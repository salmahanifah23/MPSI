<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\rancangan;
use App\model\konsentrasi;
use App\model\dosen;
use App\model\detail_dosbing;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('mahasiswa.mahasiswa');
    }

    public function list()
    {
        $user_id = auth()->user()->id; 
        $status = config('status.status');
        $rancangan = rancangan::where('id_mahasiswa',$user_id)->get();
        $detail_dosbing = detail_dosbing::all();
        $dosen = dosen::all();
        return view('mahasiswa.list', compact('rancangan','detail_dosbing','dosen','status'));
    }

    public function tambahide()
    {
        $bidang= konsentrasi::all();

        // Load index view
        return view('mahasiswa.tambahide', compact("bidang"));
        
    }

    public function pilihdosbing($id)
    {

        $dosen = dosen::where('id_kons',$id)->get();
         return view('mahasiswa.dosbing', compact("dosen"));

    }
    
    public function storeide(Request $request)
    {
        $user_id = auth()->user()->id;
        $id_counter = rancangan::count();
        $id_rancangan = $id_counter++;
        $rancangan = rancangan::insertGetId([
            'id' => $id_rancangan,
            'id_mahasiswa'=> $user_id,
            'deskripsi' => $request->deskripsi,
            'status' => 0
        ]);
        $detail_dosbing = detail_dosbing::insertGetId([
            'id_rancangan' => $id_rancangan,
            'id_dosen' => $request->dosen
        ]);

        return redirect()->route('list')->with('pesan','Berhasil Ajukan Ide');
    }
}