<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;
    public $search, $limit = 10, $edit_id, $delete_id;
    
    public $title, $content, $status = 1, $show_in_footer = 1;
    
    public $model_ = 'App\Models\Page';
    
    protected $listeners = [
        'remove',
    ];
    
    public function render()
    {
        $datas = $this->model_::latest()->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })->paginate($this->limit);
        return view('livewire.admin.pages', compact('datas'));
    }
    
    public function resetForm()
    {
        $this->reset(['title', 'content', 'status', 'show_in_footer', 'edit_id']);
        $this->emit('contentData', '');     
        $this->emit('openModal');       
    }
    
    public function updateOrCreate()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $this->model_::updateOrCreate(['title' => $this->title], [
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'show_in_footer' => $this->show_in_footer,
        ]);
        
        $this->emit('closeModal');
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
        $data = $this->model_::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success!',
            'message' => 'Item deleted successfully.',
        ]);
    }
    
    public function changeStatus($id, $column)
    {
        $this->model_::find($id)->update([
            $column => !$this->model_::find($id)->$column
        ]);
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success!',
            'message' => 'Status changed successfully.',
        ]);
    }
    
    public function edit($id)
    {
        $this->resetForm();
        $this->edit_id = $id;
        $data = $this->model_::find($id);
        $this->title = $data->title;
        $this->content = $data->content;
        $this->status = $data->status;
        $this->show_in_footer = $data->show_in_footer;
        $this->emit('contentData', $data->content);      
        $this->emit('openModal');   
    }
}
