<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class CrudIndex extends Component
{
    use WithPagination;

    public $statusContact = false;
    public $paginate = 5;
    public $search;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'contactUpdate' => 'handleUpdated'
    ];

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        return view('livewire.crud-index', [
            // 'contact' => Contact::latest()->paginate($this->paginate)
            'contact' => $this->search === null ?
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->paginate($this->paginate)
        ])->layout('layouts.app', ['title' => 'Crud Livewire']);
    }

    public function getContact($id)
    {
        $this->statusContact = true;
        $contact = Contact::find($id);
        $this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Contact::find($id);
            $data->delete();
            session()->flash('message', 'Contact was deleted!');
        }
    }

    public function handleStored($contact)
    {
        // dd($contact);
        session()->flash('message', 'Contact ' .  $contact['name'] . ' was stored!');
    }

    public function handleUpdated($contact)
    {
        // dd($contact);
        session()->flash('message', 'Contact ' .  $contact['name'] . ' was updated!');
        $this->emit('create');
    }

    public function create()
    {
        return view('livewire.crud-create');
    }
}
