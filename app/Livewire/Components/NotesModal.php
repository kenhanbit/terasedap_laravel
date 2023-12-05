<?php

namespace App\Livewire\Components;

use App\Models\CartItem;
use Livewire\Component;

class NotesModal extends Component
{
    public $itemId;

    public $notes;

    public function mount()
    {
        $detail = CartItem::find($this->itemId);
        $this->notes = $detail->notes;
    }

    public function render()
    {
        return view('livewire.components.notes-modal', ['itemId' => $this->itemId]);
    }

    public function addNotes(CartItem $item)
    {
        $item->update(['notes' => $this->notes]);
        $this->dispatch('close-notes');

        return redirect()->route('cart.view');
    }
}
