<?php

namespace App\Livewire\Components;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryList extends Component
{
    public $editCategoryId;
    public $editCategoryName;
    public $updatedCategoryId;

    public function edit($categoryId)
    {
        $this->editCategoryId = $categoryId;
        $this->editCategoryName = Category::find($categoryId)->name;
        $this->dispatch('edit-category');
    }

    public function delete(Category $delete)
    {
        if (!isset($delete->items)) {
            $delete->delete();
            return redirect()->route('admin.category')->with('success', 'Kategori berhasil dihapus.');
        } else {
            $message = 'Tidak dapat menghapus kategori karena masih ada item makanan terkait. Silakan hapus item makanan terkait terlebih dahulu.';
            return redirect()->route('admin.category')->with('error', 'Tidak dapat menghapus kategori yang memiliki item makanan terkait.');
        }
        $delete->delete();
    }

    public function cancelEdit()
    {
        $this->reset();
    }

    public function update()
    {
        Category::find($this->editCategoryId)->update([
            'name' => $this->editCategoryName
        ]);

        $this->reset();
    }

    #[On('edit-category')]
    public function render()
    {
        $categories = Category::all();
        return view('livewire.components.category-list', ['categories' => $categories]);
    }
}
