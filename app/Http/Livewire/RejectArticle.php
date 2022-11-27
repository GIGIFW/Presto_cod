<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RejectArticle extends Component
{
    public $article;

    //funzione per rifiutare l'articolo
    public function rejectArticle(){
        $this->article->is_accepted = false;
        $this->article->save();

        session()->flash('reject', 'Hai rifiutato l\'articolo');
    }

    public function render()
    {
        return view('livewire.reject-article');
    }
}