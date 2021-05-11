<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Cadastro;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageController extends Controller
{
    public function __construct()
    {
        
    }

    public function store(Request $request){
       
        if ($request->hasFile('image')) {

            if ($request->id){
                $cadastro = Cadastro::find($request->id);
                $foto = $cadastro->profile_pic;
                Storage::delete('public/img/normal'.$foto);
                Storage::delete('public/img/thumbnail'.'_small_'.$foto);
            }

            $filenamewithextension = $request->image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $filenamestostore = $filename . '_' . time() . '.' . $extension;
            $smallthumbnail = '_small_' . $filename . '_' . time() . '.' . $extension;

            $request->image->storeAs('public/img/normal/', $filenamestostore);
            $request->image->storeAs('public/img/thumbnail/', $smallthumbnail);
            $smallthumbnailpath = public_path('storage/img/thumbnail/' . $smallthumbnail);

            $this->createThumbnail($smallthumbnailpath, 150, 93);

            return response()->json(array('nomeArquivo' => $filenamestostore));

        } else {

            return response()->json(array('nomeArquivo' => 'arquivo não recebido'));
        }
    }

    public function creatThumbnail($path, $width, $height){

        $img = Image::make($path)->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);

    }

    public function getImages($imagem){

        return Image::make(file_get_contents('file://'.storage_path('/app/public/img/normal/'.$imagem)))->response();

    }

    public function getThumbnail($imagem){
        return Image::make(file_get_contents('file://'.storage_path('/app/public/img/thumbnail/'.'_small_'.$imagem)))->response();
    }

    public function excluir(Request $request){

    }
}
