<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name;
    public $editId;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    protected $messages = [
        'name.required' => 'Nama kategori wajib diisi',
        'name.min' => 'Nama kategori minimal 3 karakter',
    ];


    public function render()
    {
        $categories = Category::latest()->paginate(5);
        return view('livewire.admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function clearData()
    {
        $this->name = '';
        $this->editId = '';
    }

    public function changeStatus($id)
    {
        $category = Category::find($id);
        if ($category->status == 'active') {
            $category->update([
                'status' => 'non-active',
            ]);
        } else {
            $category->update([
                'status' => 'active',
            ]);
        }
    }

    public function addCategory()
    {
        $this->validate();

        $kategori = Category::where('name', $this->name)->first();

        if ($kategori) {
            $this->addError('name', 'Kategori sudah ada');
            return;
        }

        Category::create([
            'name' => Str::title($this->name),
            'slug' => Str::slug($this->name),
            'status' => 'non-active',
        ]);

        $this->clearData();
        session()->flash('success', 'Kategori berhasil ditambahkan');
    }

    public function editCategory($id)
    {
        $this->editId = $id;
        $category = Category::find($this->editId);
        if (!$category) {
            session()->flash('error', 'Kategori tidak ditemukan');
            return;
        }
        $this->name = $category->name;
    }

    public function updateCategory()
    {
        $this->validate();

        $category = Category::find($this->editId);
        if (!$category) {
            session()->flash('error', 'Kategori tidak ditemukan');
            return;
        }

        $category->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        $this->clearData();
        session()->flash('success', 'Kategori berhasil diupdate');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if (!$category) {
            session()->flash('error', 'Kategori tidak ditemukan');
            return;
        }
        $category->delete();
        session()->flash('success', 'Kategori berhasil dihapus');
    }
}
