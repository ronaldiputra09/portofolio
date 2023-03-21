<?php

namespace App\Http\Livewire\Admin\Sosial;

use App\Models\Sosial;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $link, $icon, $editId;

    public $rules = [
        'name' => 'required',
        'link' => 'required|url',
        'icon' => 'required|url',
    ];

    public $messages = [
        'name.required' => 'Nama sosial media tidak boleh kosong',
        'link.required' => 'Link sosial media tidak boleh kosong',
        'link.url' => 'Link sosial media harus berupa url',
        'icon.required' => 'Icon sosial media tidak boleh kosong',
        'icon.url' => 'Icon sosial media harus berupa url',
    ];

    public function render()
    {
        $sosials = Sosial::latest()->paginate(10);
        return view('livewire.admin.sosial.index', [
            'sosials' => $sosials
        ]);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->link = null;
        $this->icon = null;
    }

    public function addSosial()
    {
        $this->validate();

        $sosial = Sosial::where('name', $this->name)->first();

        if ($sosial) {
            return session()->flash('error', 'Sosial media sudah ada');
        }

        Sosial::create([
            'name' => $this->name,
            'link' => $this->link,
            'icon' => $this->icon,
        ]);
        $this->resetInput();
        session()->flash('success', 'Sosial media berhasil ditambahkan');
    }

    public function editSosial($id)
    {
        $sosial = Sosial::find($id);
        $this->name = $sosial->name;
        $this->link = $sosial->link;
        $this->icon = $sosial->icon;
        $this->editId = $sosial->id;
    }

    public function updateSosial()
    {
        $this->validate();

        $sosial = Sosial::find($this->editId);
        if (!$sosial) {
            return session()->flash('error', 'Sosial media tidak ditemukan');
        }
        $sosial->update([
            'name' => $this->name,
            'link' => $this->link,
            'icon' => $this->icon,
        ]);
        $this->resetInput();
        session()->flash('success', 'Sosial media berhasil diupdate');
    }

    public function deleteSosial($id)
    {
        $sosial = Sosial::find($id);
        if (!$sosial) {
            return session()->flash('error', 'Sosial media tidak ditemukan');
        }
        $sosial->delete();
        session()->flash('success', 'Sosial media berhasil dihapus');
    }

    public function changeStatus($id)
    {
        $sosial = Sosial::find($id);
        if (!$sosial) {
            return session()->flash('error', 'Sosial media tidak ditemukan');
        }
        $sosial->status = $sosial->status == 'active' ? 'non-active' : 'active';
        $sosial->save();
        session()->flash('success', 'Status sosial media berhasil diupdate');
    }
}
