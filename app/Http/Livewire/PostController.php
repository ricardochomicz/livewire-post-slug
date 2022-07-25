<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Cviebrock\EloquentSluggable\Services\SlugService;


class PostController extends Component
{

    public $title, $slug;

    protected $rules = [
        'title' => 'required|max:100',
        'slug' => 'required|max:100'
    ];

    protected $messages = [
        'title.required' => 'Informe o título do Post',
        'title.max' => '100 caracteres máximo',
        'slug.required' => 'Informe o título do Post para gerar o slug',
        'slug.max' => '100 caracteres máximo',
    ];

    public function render()
    {
        $posts = Post::latest('id')->take(5)->get();
        return view('livewire.post-controller', compact('posts'));
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }

    public function store()
    {
        $this->validate();

        try {
            Post::create([
                'title' => $this->title,
                'slug' => $this->slug
            ]);
            $this->reset();
            toastr()->success('Post cadastrado com sucesso!');
        } catch (\Throwable $th) {
            toastr()->error("Erro ao cadastrar");
        }
    }
}
