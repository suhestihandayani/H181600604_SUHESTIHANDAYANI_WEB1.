<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\KategoriArtikel;


class ArtikelController extends Controller
{
    public function index(){
        
        $listArtikel=Artikel::all(); 
    
        
        return view('artikel.index', compact('listArtikel'));
    }
     public function show($id){
        $artikel=Artikel::find($id);
        return view('artikel.show', compact('artikel'));
    }

    public function create(){
       
        $kategoriArtikel=KategoriArtikel::pluck('nama','id');
        
        return view('artikel.create', compact('kategoriArtikel'));

    }

    public function store(Request $request){
        $input=$request->all();

        Artikel::create($input);

        return redirect(route('artikel.index'));
    }  
    
    public function edit($id){
        $artikel=Artikel::find($id);
        $kategoriArtikel=KategoriArtikel::pluck('nama', 'id');


        if (empty($artikel)){
            return redirect(route('artikel.index'));
        }
        return view ('artikel.edit', compact('artikel', 'kategoriArtikel'));

       }

       public function update($id, Request $request){
           $artikel=Artikel::find($id);
           $input=$request->all();


           if (empty($artikel)){
               return redirect(route('artikel.index'));
           }

           $artikel->update($input);

           return redirect(route('artikel.index'));

       }

       public function destroy($id){
        $artikel=Artikel::find($id);

         if (empty($artikel)){
             return redirect(route('artikel.index'));
         } 

         $artikel->delete();
         return redirect(route('artikel.index'));
        }

}
