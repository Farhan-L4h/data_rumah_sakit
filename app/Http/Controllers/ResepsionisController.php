<?php

namespace App\Http\Controllers;

use App\Models\resepsionis;

use App\Models\dokter;

use App\Models\pasien;

use App\Models\pemeriksaan;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;


class ResepsionisController extends Controller
{
     /**
     * index    
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $reseps = resepsionis::with('pasien')->paginate(5);
        $resepsis = resepsionis::with('dokter')->paginate(5);
        $resepsionis = resepsionis::with('periksa')->paginate(5);
        


        //render view with posts
        return view('resep.index', compact('reseps','resepsis','resepsionis'));
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
        $reseps = dokter::latest()->get();
        $resepsis = pasien::latest()->get();
        $resepsionis = pemeriksaan::latest()->get();
        


        return view('resep.create',compact('reseps','resepsis','resepsionis'));
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
        resepsionis::create([

            'tanggal'   => $request->tanggal,
            'id_pasien' => $request->id_pasien,
            'id_periksa'     => $request->id_periksa,
            'id_dokter' => $request->id_dokter,
        ]);

        //redirect to index
        return redirect()->route('resep.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
         $reseps = resepsionis::findOrFail($id);
 
         //render view with post
         return view('resep.show', compact('reseps'));
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
         $reseps = resepsionis::findOrFail($id);
 
         //render view with post
         return view('resep.edit', compact('reseps'));
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
         $reseps = resepsionis::findOrFail($id);
 
         //check if image is uploaded
         if ($request->hasFile('image')) {
 
             //upload new image
             $image = $request->file('image');
             $image->storeAs('public/resep', $image->hashName());
 
             //delete old image
             Storage::delete('public/resep/'.$kategoris->image);
 
             //update post with new image
             $reseps->update([
                
                 'id_pasien'     => $request->id_pasien,
                 'id_dokter'   => $request->id_pasien,
                 'id_keluhan' => $request->keluhan,
                 'tanggal' => $request->tanggal,
                
             ]);
         }
 
         //redirect to index
         return redirect()->route('resep.index')->with(['success' => 'Data Berhasil Diubah!']);
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
         $resep = resepsionis::findOrFail($id);
 
         //delete post
         $resep->delete();
 
         //redirect to index
         return redirect()->route('resep.index')->with(['success' => 'Data Berhasil Dihapus!']);
     }
}
