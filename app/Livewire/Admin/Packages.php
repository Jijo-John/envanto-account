<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Packages extends Component
{
    use WithPagination;
    public $search, $limit = 10, $edit_id, $delete_id;
    public $name, $price, $per_day_download, $package_items = [];
    public $model = 'App\Models\Package';

    protected $listeners = [
        'remove',
    ];

    public function render()
    {
        $datas = $this->model::latest()->when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate($this->limit);
        return view('livewire.admin.packages', compact('datas'));
    }

    public function resetForm()
    {
        $this->reset();
        $this->dispatchBrowserEvent('pondReset');
        $this->emit('openModal');
    }

    public function edit($id)
    {
        $this->resetForm();
        $this->edit_id = $id;
        $data = $this->model::find($id);
        $this->name = $data->name;
        $this->price = $data->price;
        $this->per_day_download = $data->per_day_download;
        $this->package_items = $data->items->toArray();
        $this->dispatchBrowserEvent('pondReset');
        $this->emit('openModal');
    }

    public function delete($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('modal:confirm', [
            'title' => 'Are you sure?',
            'message' => 'You are about to delete this item. This action cannot be undone. Do you want to proceed?',
        ]);
    }

    public function remove()
    {
        $data = $this->model::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success Message',
            'message' => 'Data Deleted Successfully. '
        ]);
    }

    public function changeStatus($id, $column)
    {
        $this->model::find($id)->update([
            $column => !$this->model::find($id)->$column
        ]);
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success Message',
            'message' => 'Updated Successfully. '
        ]);
    }
    
    public function removeItem($key)
    {
        unset($this->package_items[$key]);
    }
    
    public function addItem()
    {
        $this->package_items[] = [
            'name' => '',
            'is_active' => 1,
        ];
    }

    public function updateOrCreate()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'per_day_download' => 'required',
            'package_items.*' => 'required',
            'package_items.*.name' => 'required',
            'package_items.*.is_active' => 'required',
        ]);

        if ($this->edit_id) {
            $data = $this->model::find($this->edit_id);
            $data->update([
                'name' => $this->name,
                'price' => $this->price,
                'per_day_download' => $this->per_day_download,
            ]);
            
            $data->items()->delete();
            
            foreach ($this->package_items as $item) {
                $data->items()->create($item);
            }
            
            $this->dispatchBrowserEvent('notify:modal', [
                'title' => 'Success Message',
                'message' => 'Data Update/Create Successfully. '
            ]);
            return;
        }

        $create = $this->model::create([
            'name' => $this->name,
            'price' => $this->price,
            'per_day_download' => $this->per_day_download,
        ]);
        
        foreach ($this->package_items as $item) {
            $create->items()->create($item);
        }
        
        $this->resetForm();
        $this->emit('closeModal');
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success Message',
            'message' => 'Data Update/Create Successfully. '
        ]);
    }
}
