<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Component
{
    use WithPagination;
    public $search, $search_admin,$limit = 10, $view_user = false, $create_new_admin = false;
    public $name, $phone, $email, $country, $password, $user_id, $delete_id, $create_new_subscription = false, $package_id, $subscription_start, $subscription_end;
    public $start_date, $end_date, $filter_by_status, $show_filter_modal = false;
    public function render()
    {
        $users = User::latest()
        ->when($this->search, function($query){
            $query->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orWhere('phone', 'like', '%'.$this->search.'%');
        });
        
        if($this->start_date){
            $users = $users->whereHas('purchases', function($query){
                $query->where('subscription_start', '>=', $this->start_date);
            });
        }
        
        if($this->end_date){
            $users = $users->whereHas('purchases', function($query){
                $query->where('subscription_end', '<=', $this->end_date);
            });
        }
        
        if($this->filter_by_status){
            $users = $users->whereHas('purchases', function($query){
                $query->whereDate('subscription_end', $this->filter_by_status == 'active' ? '>=' : '<', date('Y-m-d'));
            });
        }
        
        
        
        
        $total_users = $users->count();
        $active_purchases = \App\Models\Purchase::whereDate('subscription_end', '>=', date('Y-m-d'))->count();
        $expired_purchases = \App\Models\Purchase::whereDate('subscription_end', '<', date('Y-m-d'))->count();
        $total_downloads = \App\Models\Download::count();
        $users = $users->whereNot('type', 'admin')->paginate($this->limit);
        $admins = User::where('type', 'admin')
        ->when($this->search_admin, function($query){
            $query->where('name', 'like', '%'.$this->search_admin.'%')
            ->orWhere('email', 'like', '%'.$this->search_admin.'%')
            ->orWhere('phone', 'like', '%'.$this->search_admin.'%');
        })
        ->whereNot('id', auth()?->id())
        ->paginate($this->limit);
        $packages = \App\Models\Package::get();
        return view('livewire.admin.dashboard', compact('users', 'total_users', 'active_purchases', 'expired_purchases', 'total_downloads', 'admins', 'packages'));
    }
    
    
    public function viewUser($id)
    {
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->country = $user->country;
        $this->view_user = true;
    }
    
    public function userSubscriprion($id)
    {
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->package_id = $user->purchases->first()?->package_id;
        $this->subscription_start = $user->purchases->first()?->subscription_start ?? date('Y-m-d');
        $this->subscription_end = $user->purchases->first()?->subscription_end;
        $this->create_new_subscription = true;
    }
    
    public function saveSubscription()
    {
        $this->validate([
            'package_id' => 'required',
            'subscription_start' => 'required',
            'subscription_end' => 'required',
        ]);
        
        $user = User::find($this->user_id);
        $user->purchases()->updateOrCreate(
            [
                'user_id' => $this->user_id,
            ],
            [
            'subscription_start' => $this->subscription_start,
            'subscription_end' => $this->subscription_end,
            'package_id' => $this->package_id,
            'payment_id' => 'manual',
            'payment_status' => 'success',
            'status' => 'active',
        ]);
        
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success',
            'message' => 'Subscription updated successfully',
        ]);
        
        $this->reset();
    }
    
    public function saveUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required_if:create_new_admin,true',
        ]);
        
        if($this->view_user){
            $this->updateUser();
        }else{
            $this->createUser();
        }
    
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success',
            'message' => 'User updated successfully',
        ]);
        
        $this->reset();
    }
    
    public function createUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'type' => $this->create_new_admin ? 'admin' : 'user',
        ]);
    }
    
    public function updateUser()
    {
       
        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
        
        if($this->password){
            $user->update([
                'password' => Hash::make($this->password),
            ]);
        }
        
    }
    
    public function resetForm()
    {
        $this->reset();
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
        $data = User::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('notify:modal', [
            'title' => 'Success Message',
            'message' => 'Data Deleted Successfully. '
        ]);
    }
}
