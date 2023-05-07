<?php

namespace App\Http\Livewire\CrudModal;

use App\Models\Artikel as ModelsArtikel;
use Livewire\Component;

class Artikel extends Component
{
    public $artikel, $title, $desc;

    public function render()
    {
        $this->artikel = ModelsArtikel::latest()->get();
        return view('livewire.crud-modal.artikel')
            ->layout('layouts.app', [
                'title' => 'Crud Modal'
            ]);
    }

    public function resetInput()
    {
        $this->title = null;
        $this->desc = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|min:5|unique:artikels',
            'desc' => 'required'
        ]);

        ModelsArtikel::create([
            'title' => $this->title,
            'desc' => $this->desc,
        ]);

        session()->flash('message', 'Create artikel has been successfully.');

        $this->resetInput();

        $this->dispatchBrowserEvent('artikelStore');
    }
}
