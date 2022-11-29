<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ArticlesCreateForm extends Component
{
    use WithFileUploads;

    public $article, $title, $price, $description, $location, $category, $cover, $temporary_images, $images = [];

    protected $rules = [
        'title' => 'required',
        'price' => 'required',
        'description' => 'required|min:10',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        'location' => 'required',
        'category' => 'required',

    ];
    protected $message = [
        '*.required' => 'Il campo è obbligatorio',
        'description.min' => 'Il minimo è di 10 caratteri',
        'images.max' => 'Il file deve essere di massimo 1MB',
        'temporary_images.max' => 'Il file deve essere di massimo 1MB',
        
    ];
    


    public function updatedTemporaryImages()
    {
        if($this->validate(['temporary_images.*' => 'image|max:1024',])){
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();

         $article = Category::find($this->category)->articles()->create($this->validate());
         //salvataggio delle immagini
         if(count($this->images)){
             foreach($this->images as $image){
                 //$article->images()->create(['path' => $image->store('images', 'public')]);
                 $newFileName = "articles/{$this->article->id}";
                 $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                 dispatch(new ResizeImage($newImage->path, 400,300));
             }

             File::deleteDirectory(storage_path('/app/livewire-tmp'));
         }

         $article->user()->associate(Auth::user());
         $article->save();

        //resettare i campi dopo l'inserimento
        $this->dispatchBrowserEvent('articleCreated');
        $this->reset();

        //messaggio di avvenuto inserimento
        session()->flash('articleCreated', 'Complimenti, hai creato la tua inserzione.');

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.articles-create-form', compact('categories'));
    }
}
