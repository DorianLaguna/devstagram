<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use Livewire\Component;

class ComentariosPost extends Component
{

    public $post;
    public $user;
    public $comentario;

    public function agregaComentario(){
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario
        ]);

        $this->comentario = '';

        $this->post->load('comentarios');
    }

    public function render()
    {
        return view('livewire.comentarios-post');
    }
}
