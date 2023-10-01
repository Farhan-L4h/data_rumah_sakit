<?php

namespace App\Http\Controllers;

use App\Models\dokter;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DokterController extends Controller
{
   /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $dokters = dokter::latest()->paginate(5);

        //render view with posts
        return view('dokter.index', compact('dokters'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('dokter.create');
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
        $image->storeAs('public/dokter', $image->hashName());

        //create post
        dokter::create([
            'image'     => $image->hashName(),
            'nama_dokter'     => $request->nama,
            'bidang'   => $request->bidang,
            'alamat' => $request->alamat,
            'umur'   => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_tlpn' => $request->no_tlpn,

        ]);

        //redirect to index
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $dokters = dokter::findOrFail($id);

        //render view with post
        return view('dokter.edit', compact('dokters'));
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
        $dokters = dokter::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/dokter', $image->hashName());

            //delete old image
            Storage::delete('public/dokter/'.$dokters->image);

            //update post with new image
            $dokters->update([
                'image'     => $image->hashName(),
                'nama_dokter'     => $request->nama,
                'bidang'   => $request->bidang,
                'alamat' => $request->alamat,
                'umur'   => $request->umur,
                'jenis_kelamin' => $request->jenis_kelamin,
    
            ]);

        } else {

            //update post without image
            $dokters->update([
                'nama_dokter'     => $request->nama,
                'bidang'   => $request->bidang,
                'alamat' => $request->alamat,
                'umur'   => $request->umur,
                'jenis_kelamin' => $request->jenis_kelamin,
                
            ]);
        }

        //redirect to index
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $dokter = dokter::findOrFail($id);

        //delete image
        Storage::delete('public/dokter/'. $dokter->image);

        //delete post
        $dokter->delete();

        //redirect to index
        return redirect()->route('dokter.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


