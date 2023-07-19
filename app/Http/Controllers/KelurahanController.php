<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Kelurahan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KelurahanController extends Controller
{
    public function index(): View
    {
        //get post
        $kelurahans = Kelurahan::latest()->paginate(5);

        //view
        return view('kelurahan.index', compact('kelurahans'));
    }

    //create
    public function create(): View
    {
        return view('kelurahan.create');
    }

    //create post
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'kelurahan' => 'required|min:5',
            'kecamatan' => 'required|min:5',
            'kota' => 'required|min:5'

        ]);

        //create post
        Kelurahan::create([
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota

        ]);

        //redirect to index
        return redirect()->route('kelurahans.index')->with(['succes' => 'Data Berhasil Ditambah']);
    }

    //edit
    public function edit(string $id): View
    {
        //get by ID
        $kelurahan = Kelurahan::findOrFail($id);

        //render view edit
        return view('kelurahan.edit', compact('kelurahan'));
    }

    //update data edited
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate(
            $request,
            [
                'kelurahan' => 'required|min:5',
                'kecamatan' => 'required|min:5',
                'kota' => 'required|min:5'
            ]
        );

        //get by ID
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update([
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota
        ]);

        //redirect ti index
        return redirect()->route('kelurahans.index')->with(['succes' => 'Data Berhasil di Update']);
    }

    //Delete
    // get by ID
    public function destroy($id): RedirectResponse
    {
        $kelurahan = Kelurahan::findOrFail($id);

        //Delete Post
        $kelurahan->delete();

        //retuen to index
        return redirect()->route('kelurahans.index')->with(['succes' => 'Data Berhasil Dihapus']);
    }
}
