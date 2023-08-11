<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        
        return view('perfil.index');
    }

    public function store(Request $request){

        //modifica el request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3', 'max:20'],
            'email' => 'email|required|unique:users,email,'.auth()->user()->id
        ]);

        $usuario = User::find(auth()->user()->id);

        if($request->password || $request->oldPassword){
            $this->validate($request, [
                'oldPassword' => 'required',
                'password' => 'min:6|required'
            ]);

            if(Hash::check($request->oldPassword,auth()->user()->password)){
                $usuario->password = $request->password;
            }else{
                return back()->with('mensaje', 'Contraseña actual incorrecta');
            }

        }

        if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
    
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
    
            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        $usuario->username = $request->username;
        $usuario->email = $request->email ?? auth()->user()->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';

        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);

    }
}
