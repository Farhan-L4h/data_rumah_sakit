<?php

namespace App\Http\Controllers;

//import Model "kategori
use App\Models\pemeriksaan;

use App\Models\pasien;

use App\Models\dokter;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class periksaController extends Controller
{
     /**
     * index    
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $periksas = pemeriksaan::with('dokter')->paginate(5);
        $pemeriksas = pemeriksaan::with('pasien')->paginate(5);



        //render view with posts    
        return view('periksa.index', compact('periksas'));
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
        $periksas = dokter::latest()->get();
        $pemeriksas = pasien::latest()->get();
        


        return view('periksa.create',compact('periksas','pemeriksas'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    
    public function store(Request $request): RedirectResponse
    {
        

        //create post
        pemeriksaan::create([
            'keluhan'     => $request->keluhan,
            'tanggal'   => $request->tanggal,
            'id_dokter' => $request->id_dokter,
            'id_pasien' => $request->id_pasien,
        ]);

        //redirect to index
        return redirect()->route('periksa.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $periksas = periksa::findOrFail($id);

        //render view with post
        return view('periksa.show', compact('periksas','pemeriksas'));
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
        $periksas = pemeriksaan::findOrFail($id);

        //render view with post
        return view('periksa.edit', compact('periksas'));
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
        $periksas = pemeriksaan::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/periksa', $image->hashName());

            //delete old image
            Storage::delete('public/periksa/'.$kategoris->image);

            //update post with new image
            $periksas->update([
                'keluhan'     => $request->keluhan,
                'tanggal'   => $request->tanggal,
                'id_dokter' => $request->id_dokter,
                'id_pasien' => $request->id_pasien,
            ]);
        }

        //redirect to index
        return redirect()->route('periksa.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $periksa = pemeriksaan::findOrFail($id);

        //delete post
        $periksa->delete();

        //redirect to index
        return redirect()->route('periksa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
