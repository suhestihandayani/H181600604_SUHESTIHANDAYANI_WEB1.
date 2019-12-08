<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriBerita;

class KategoriBeritaController extends Controller
{
     public function index(){
     //eloquent => ORM (Object Relational Mapping)
     $listKategoriBerita=KategoriBerita::all();
        
     //blade
     return view('kategori_berita.index', compact ('listKategoriBerita'));
     }

      public function show ($id){
          //$kategoriBerita=KategoriBerita::where('id,$id')->first();
           $kategoriBerita=KategoriBerita::find($id);

           if (empty($kategoriBerita)){
            return redirect(route('kategori_berita.index'));
           }

   
           return view('kategori_berita.show', compact ('kategoriBerita'));
   
           }

        public function create(){
            return view('kategori_berita.create');
        }

        public function store(Request $request){
            $input=$request->all();

            KategoriBerita::create($input);

            return redirect(route('kategori_berita.index'));
        }   

        public function edit($id){
            $kategoriBerita=KategoriBerita::find($id);
   
   
            if (empty($kategoriBerita)){
                return redirect(route('kategori_berita.index'));
            }
            return view ('kategori_berita.edit', compact('kategoriBerita'));
   
           }
   
           public function update($id, Request $request){
               $kategoriBerita=KategoriBerita::find($id);
               $input=$request->all();
   
   
               if (empty($kategoriBerita)){
                   return redirect(route('kategori_berita.index'));
               }
   
               $kategoriBerita->update($input);
   
               return redirect(route('kategori_berita.index'));
   
           }

           public function destroy($id){
            $kategoriBerita=KategoriBerita::find($id);
    
             if (empty($kategoriBerita)){
                 return redirect(route('kategori_berita.index'));
             } 
    
             $kategoriBerita->delete();
             return redirect(route('kategori_berita.index'));
            }

            public function trash(){
                $listKategoriBerita=KategoriBerita::onlyTrashed();
        
                 
                
                 return view('kategori_berita.index', compact ('listKategoriBerita'));
                }
}
