<?php

namespace App\Http\Controllers;

//import Model "kategori
use App\Models\pasien;

use App\Models\dokter;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PasienController extends Controller
{
     /**
     * index    
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $pasiens = pasien::with('dokter')->paginate(5);



        //render view with posts    
        return view('pasien.index', compact('pasiens'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $pasiens = dokter::latest()->get();
        


        return view('pasien.create',compact('pasiens'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',

        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/pasien', $image->hashName());

        //create post
        pasien::create([
            'image'     => $image->hashName(),
            'nama_pasien'     => $request->nama,
            'umur'   => $request->umur,
            'dokter' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_tlpn' => $request->no_tlpn,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_dokter'     => $request->id_dokter,

        ]);

        //redirect to index
        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $pasiens = pasien::findOrFail($id);

        //render view with post
        return view('pasien.show', compact('pasiens'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $pasiens = pasien::findOrFail($id);

        //render view with post
        return view('pasien.edit', compact('pasiens'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        

        //get post by ID
        $pasiens = pasien::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/pasien', $image->hashName());

            //delete old image
            Storage::delete('public/pasien/'.$kategoris->image);

            //update post with new image
            $pasiens->update([
                'image'     => $image->hashName(),
                'nama_pasien'     => $request->nama,
                'umur'   => $request->umur,
                'dokter' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_tlpn' => $request->no_tlpn,
                'tanggal_lahir' => $request->tanggal_lahir
            ]);

        } else {

            //update post without image
            $pasiens->update([
                'nama_pasien'     => $request->nama,
                'umur'   => $request->umur,
                'dokter' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_tlpn' => $request->no_tlpn,
                'tanggal_lahir' => $request->tanggal_lahir
            ]);
        }

        //redirect to index
        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $pasien = pasien::findOrFail($id);

        //delete image
        Storage::delete('public/pasien/'. $pasien->image);

        //delete post
        $pasien->delete();

        //redirect to index
        return redirect()->route('pasien.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
