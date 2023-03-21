<?php

namespace App\Http\Livewire\Admin\Tool;

use App\Models\Tool;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $icon, $editId;

    protected $rules = [
        'name' => 'required',
        'icon' => 'required',
    ];
    protected $messages = [
        'name.required' => 'Nama wajib diisi',
        'icon.required' => 'Icon wajib diisi',
    ];

    public function render()
    {
        $tools = Tool::latest()->paginate(5);
        return view('livewire.admin.tool.index', [
            'tools' => $tools,
        ]);
    }

    public function resetInput()
    {
        $this->name = '';
        $this->icon = '';
        $this->editId = '';
    }

    public function changeStatus($id)
    {
        $tool = Tool::find($id);
        $tool->status = $tool->status == 'active' ? 'non-active' : 'active';
        $tool->save();
        return session()->flash('success', 'Status tool berhasil diubah');
    }

    public function addTool()
    {
        $this->validate();

        $tool = Tool::where('name', $this->name)->first();

        if ($tool) {
            return $this->addError('name', 'Nama tool sudah ada');
        }

        Tool::create([
            'name' => Str::title($this->name),
            'slug' => Str::slug($this->name),
            'icon' => $this->icon,
            'status' => 'non-active'
        ]);

        $this->resetInput();
        return session()->flash('success', 'Tool berhasil ditambahkan');
    }

    public function editTool($id)
    {
        $tool = Tool::find($id);
        $this->editId = $tool->id;
        $this->name = $tool->name;
        $this->icon = $tool->icon;
    }

    public function updateTool()
    {
        $this->validate();

        $tool = Tool::find($this->editId);
        if (!$tool) {
            return $this->addError('name', 'Tool tidak ditemukan');
        }
        $tool->name = $this->name;
        $tool->slug = Str::slug($this->name);
        $tool->icon = $this->icon;
        $tool->save();

        $this->resetInput();
        return session()->flash('success', 'Tool berhasil diubah');
    }

    public function deleteTool($id)
    {
        $tool = Tool::find($id);
        if (!$tool) {
            return $this->addError('name', 'Tool tidak ditemukan');
        }
        $tool->delete();
        return session()->flash('success', 'Tool berhasil dihapus');
    }
}
