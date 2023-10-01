<?php

namespace App\Http\Controllers;

use App\Models\ruangan;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $ruangans = ruangan::latest()->paginate(5);

        //render view with posts
        return view('ruangan.index', compact('ruangans'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('ruangan.create');
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
        $image->storeAs('public/ruangan', $image->hashName());

        //create post
        ruangan::create([
                'image'     => $image->hashName(),
                'nama_ruangan'     => $request->nama,
                'jenis_ruangan'   => $request->jenis,
                'kapasitas' => $request->kapasitas,

        ]);

        //redirect to index
        return redirect()->route('ruangan.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $ruangans = ruangan::findOrFail($id);

        //render view with post
        return view('ruangan.show', compact('ruangans'));
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
        $ruangans = ruangan::findOrFail($id);

        //render view with post
        return view('ruangan.edit', compact('ruangans'));
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
        $ruangans = ruangan::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/ruangan', $image->hashName());

            //delete old image
            Storage::delete('public/ruangan/'.$ruangans->image);

            //update post with new image
            $ruangans->update([
                'image'     => $image->hashName(),
                'nama_ruangan'     => $request->nama,
                'jenis_ruangan'   => $request->jenis,
                'kapasitas' => $request->kapasitas,
            ]);

        } else {

            //update post without image
            $ruangans->update([
                'nama_ruangan'     => $request->nama,
                'jenis_ruangan'   => $request->jenis,
                'kapasitas' => $request->kapasitas,
            ]);
        }

        //redirect to index
        return redirect()->route('ruangan.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $ruangan = ruangan::findOrFail($id);

        //delete image
        Storage::delete('public/ruangan/'. $ruangan->image);

        //delete post
        $ruangan->delete();

        //redirect to index
        return redirect()->route('ruangan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
