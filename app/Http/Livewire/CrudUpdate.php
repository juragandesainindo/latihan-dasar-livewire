<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class CrudUpdate extends Component
{
    public $name;
    public $phone;
    public $contactId;

    public $listeners = [
        'getContact' => 'showContact'
    ];

    public function showContact($contact)
    {
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->contactId = $contact['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|max:15'
        ]);

        if ($this->contactId) {
            $contact = Contact::find($this->contactId);
            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);
        }

        $this->resetInput();
        $this->emit('contactUpdate', $contact);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }

    public function render()
    {
        return view('livewire.crud-update');
    }
}
