<?php

namespace App\Http\Controllers;

//import Model "antrian
use App\Models\antrian;

use App\Models\pasien;

use App\Models\dokter;

use App\Models\resepsionis;



use App\Models\pemeriksaan;

use App\Models\ruangan;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class dataAntrianController extends Controller
{
      /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get antrian
        
        $antrians = antrian::with('pasien')->paginate(5);
        $antrians2 = antrian::with('dokter')->paginate(5);
        $antrians3 = antrian::with('periksa')->paginate(5);
        $antrians4 = antrian::with('resep')->paginate(5);
        $antrians5 = antrian::with('ruangan')->paginate(5);


        //render view with antrian
        return view('antrian.index', compact('antrians','antrians2','antrians3','antrians4','antrians5'));
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
        $antrians = pasien::latest()->get();
        $antrians2 = dokter::latest()->get();
        $antrians3 = pemeriksaan::latest()->get();
        $antrians4 = resepsionis::latest()->get();
        $antrians5 = ruangan::latest()->get();
        


        return view('antrian.create',compact('antrians','antrians2','antrians3','antrians4','antrians5'));
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
        antrian::create([
            'tanggal'   => $request->tanggal,
            'id_pasien' => $request->id_pasien,
            'id_periksa' => $request->id_periksa,
            'id_dokter' => $request->id_dokter,
            'id_ruangan' => $request->id_ruangan,
            'id_resep' => $request->id_resep,

            
        ]);

        //redirect to index
        return redirect()->route('antrian.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
         $antrians = antrian::findOrFail($id);
 
         //render view with post
         return view('antrian.show', compact('antrians'));
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
         $antrians = antrian::findOrFail($id);
 
         //render view with post
         return view('antrian.edit', compact('antrians'));
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
         $antrians = antrian::findOrFail($id);
 
         //check if image is uploaded
         if ($request->hasFile('image')) {
 
             //upload new image
             $image = $request->file('image');
             $image->storeAs('public/antrian', $image->hashName());
 
             //delete old image
             Storage::delete('public/antrian/'.$kategoris->image);
 
             //update post with new image
             $antrians->update([
                 'image'     => $image->hashName(),
                 'nama_antrian'     => $request->nama,
                 'umur'   => $request->umur,
                 'dokter' => $request->nama,
                 'jenis_kelamin' => $request->jenis_kelamin,
                 'alamat' => $request->alamat,
                 'no_tlpn' => $request->no_tlpn,
                 'tanggal_lahir' => $request->tanggal_lahir
             ]);
 
         } else {
 
             //update post without image
             $antrians->update([
                 'nama_antrian'     => $request->nama,
                 'umur'   => $request->umur,
                 'dokter' => $request->nama,
                 'jenis_kelamin' => $request->jenis_kelamin,
                 'alamat' => $request->alamat,
                 'no_tlpn' => $request->no_tlpn,
                 'tanggal_lahir' => $request->tanggal_lahir
             ]);
         }
 
         //redirect to index
         return redirect()->route('antrian.index')->with(['success' => 'Data Berhasil Diubah!']);
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
         $antrian = antrian::findOrFail($id);
 
         //delete post
         $antrian->delete();
 
         //redirect to index
         return redirect()->route('antrian.index')->with(['success' => 'Data Berhasil Dihapus!']);
     }
}
