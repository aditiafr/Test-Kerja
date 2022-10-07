<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Siswa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjam = DB::table('tbl_pinjam')
            ->join('tbl_siswa', 'tbl_siswa.nis', '=', 'tbl_pinjam.nis')
            ->join('tbl_buku', 'tbl_buku.id_buku', '=', 'tbl_pinjam.id_buku')
            ->get();
        $data = [
            'pinjam' => $pinjam
        ];
        return view('/pinjam/index', $data);
    }

    public function tersedia()
    {
        $pinjam = Pinjam::join('tbl_buku', 'tbl_buku.id_buku', '=', 'tbl_pinjam.id_buku')
            ->where('status', '1')
            ->groupBy('isbn')
            ->get();
        $data = [
            'pinjam' => $pinjam
        ];
        return view('/pinjam/tersedia', $data);
    }

    public function kembali()
    {
        $pinjam = DB::table('tbl_pinjam')
            ->join('tbl_siswa', 'tbl_siswa.nis', '=', 'tbl_pinjam.nis')
            ->join('tbl_buku', 'tbl_buku.id_buku', '=', 'tbl_pinjam.id_buku')
            ->where('status', '0')
            ->get();

        $data = [
            'pinjam' => $pinjam
        ];

        return view('/pinjam/kembali', $data);
    }

    public function jumlah()
    {
        $pinjam = Pinjam::select(Pinjam::raw('nama , count(nama) as jumlah'))
            ->join('tbl_siswa', 'tbl_siswa.nis', '=', 'tbl_pinjam.nis')
            ->join('tbl_buku', 'tbl_buku.id_buku', '=', 'tbl_pinjam.id_buku')
            ->groupBy('nama')
            ->get();

        // dd($pinjam);

        $data = [
            'pinjam' => $pinjam
        ];

        return view('/pinjam/jumlah', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last = Pinjam::max('id_pinjam', 'desc');
        $urutan = (int) substr($last, 3, 3);
        $urutan++;
        $huruf = 'P';
        $id_pinjam = $huruf . sprintf("%03s", $urutan);

        $siswa = Siswa::all();
        $buku = Buku::all();
        // $buku = Buku::join('tbl_pinjam', 'tbl_buku.id_buku', '=', 'tbl_pinjam.id_buku')->where('status' , '1')->get();

        $data = [
            'siswa' => $siswa,
            'buku' => $buku,
            'id_pinjam' => $id_pinjam
        ];
        return view('/pinjam/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'id_pinjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_batas' => 'required',
            'nis' => 'required',
            'id_buku' => 'required',
        ]);

        $pinjam = new Pinjam;

        $pinjam->id_pinjam = $request->id_pinjam;
        $pinjam->tgl_pinjam = $request->tgl_pinjam;
        $pinjam->tgl_batas = $request->tgl_batas;
        $pinjam->tgl_kembali = 0;
        $pinjam->status = $request->status;
        $pinjam->nis = $request->nis;
        $pinjam->id_buku = $request->id_buku;

        // $DataPinjam = Pinjam::where('id', $request->id)->first();
        // if ($DataPinjam) :
        //     return redirect('/pinjam/create')->with('error', 'Data ID Pinjam Sudah Ada!');
        // else :
        // endif;

        try {
            $pinjam->save();
            return redirect('/pinjam')->with('success', 'Data Pinjam Berhasi di Simpan');
        } catch (Exception $e) {
            return redirect('/pinjam/create')->with('error', 'Data ID Pinjam Sudah Ada!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjam = Pinjam::join('tbl_siswa', 'tbl_siswa.nis', '=', 'tbl_pinjam.nis')
            ->join('tbl_buku', 'tbl_buku.id_buku', '=', 'tbl_pinjam.id_buku')
            ->where('id_pinjam', $id)->first();
        $siswa = Siswa::all();
        $buku = Buku::all();
        $data = [
            'pinjam' => $pinjam,
            'siswa' => $siswa,
            'buku' => $buku
        ];
        return view('/pinjam/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::table('bahanbaku')->where('id', $request->id)->update([
        //     'id_bb' => $request->id_bb,
        //     'nama_bb' => $request->nama_bb,
        //     'stok' => $request->stok
        // ]);
        if ($request->tgl_kembali == '0000-00-00') :
            Pinjam::where('id_pinjam', $request->id_pinjam)->update([
                'id_pinjam' => $request->id_pinjam,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_batas' => $request->tgl_batas,
                // 'tgl_kembali' => $request->tgl_kembali,
                'status' => $request->status,
                'nis' => $request->nis,
                'id_buku' => $request->id_buku
            ]);
        else :
            Pinjam::where('id_pinjam', $request->id_pinjam)->update([
                'id_pinjam' => $request->id_pinjam,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_batas' => $request->tgl_batas,
                'tgl_kembali' => $request->tgl_kembali,
                'status' => $request->status,
                'nis' => $request->nis,
                'id_buku' => $request->id_buku
            ]);
        endif;

        return redirect('/pinjam')->with('update', 'Data Pinjam Behasil di Update!');
    }

    // public function kembali(Request $request, $id)
    // {
    //     $pinjam = Pinjam::where('id_pinjam', $request->id_pinjam)->update([
    //         // 'id_pinjam' => $id,
    //         'tgl_kembali' => date('Y-m-d')
    //     ]);

    //     if ($pinjam) :
    //         return redirect('/pinjam')->with('update', 'Buku Sudah di Kembalikan');
    //     else :
    //         return redirect('/pinjam')->with('error', 'Gagal!');
    //     endif;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pinjam::where('id_pinjam', $id)->delete();
        return redirect('/pinjam')->with('delete', 'Data Pinjam Behasil di Hapus!');
    }
}
