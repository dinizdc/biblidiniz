<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FotoController extends Controller
{
    //
    public function upload(){
        return view('upload');
    }
    public function save(Request $request){
        if($request->has('imagem_src')){
            $image = $request->file('imagem_src');
            $reImage = time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imagens/fotos');
            $image->move($dest,$reImage);
            // Salvando a imagem 
            $foto = new Foto();
            $foto->alt=$request->texto_alt;
            $foto->src=$reImage;
            $foto->save();
            return  redirect('upload')->with('success','Arquivo salvo com sucesso!');

        }else{
            return  redirect('upload')->with('msg','É preciso escolher um arquivo!');
            // echo 'nada de arquivo';
        }
    }
}
