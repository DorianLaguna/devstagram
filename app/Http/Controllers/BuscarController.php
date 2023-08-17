<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(){

        return view('buscar.conocer', [
            'users' => User::select(['id','name','username','imagen'])->paginate(20)
        ]);
    }
}
