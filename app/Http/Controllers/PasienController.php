<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kelurahan;
use App\Helpers\Generate;
use Faker\Extension\Helper;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get post
        $pasiens = Pasien::latest()->paginate(5);

        //view
        return view('pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahans = Kelurahan::all();
        return view('pasien.create', compact('kelurahans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required|min:3',
            'tanggal_lahir' => 'required|min:4',

            'no_telepon' => 'required|min:5',
            'alamat' => 'required|min:5'


        ]);

        //create post

        $id = IdGenerator::generate(['table' => 'pasiens', 'length' => 10, 'prefix' => date('ym')]);
        $pasien = new Pasien();
        $pasien->pasien_id = $id;
        $pasien->nama = $request->get('nama');
        $pasien->tanggal_lahir = $request->get('tanggal_lahir');
        $pasien->jenis_kelamin = $request->get('jenis_kelamin');
        $pasien->no_telepon = $request->get('no_telepon');
        $pasien->alamat = $request->get('alamat');
        $pasien->rt = $request->get('rt');
        $pasien->rw = $request->get('rw');
        $pasien->kelurahan = $request->get('kelurahan');

        $pasien->save();
        // 'nama' => $request->nama,
        // 'tanggal_lahir' => $request->tanggal_lahir,
        // 'jenis_kelamin' => $request->jenis_kelamin,
        // 'no_telepon' => $request->no_telepon,
        // 'alamat' => $request->alamat,





        //redirect to index
        return redirect()->route('pasiens.index')->with(['succes' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
