<div>


    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-4 lg:gap-6 mt-4 mb-4">
        <div class="card flex-row justify-between p-4">
            <div>
                <p class="text-xs+ uppercase">Total Users</p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $total_users }}
                    </p>
                    {{--  <p class="text-xs text-success">+21%</p>  --}}
                </div>
            </div>
            <div class="mask is-squircle flex size-10 items-center justify-center bg-warning/10">
                <i class="fa-solid fa-user text-xl text-warning"></i>
            </div>
            <div class="absolute bottom-0 right-0 overflow-hidden rounded-lg">
                <i class="fa-solid fa-user translate-x-1/4 translate-y-1/4 text-5xl opacity-15"></i>
            </div>
        </div>
        <div class="card flex-row justify-between p-4">
            <div>
                <p class="text-xs+ uppercase">Active Subscriptions</p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $active_purchases }}
                    </p>
                    {{--  <p class="text-xs text-success">+4%</p>  --}}
                </div>
            </div>
            <div class="mask is-squircle flex size-10 items-center justify-center bg-info/10">
                <i class="fa-solid fa-eye text-xl text-info"></i>
            </div>
            <div class="absolute bottom-0 right-0 overflow-hidden rounded-lg">
                <i class="fa-solid fa-eye translate-x-1/4 translate-y-1/4 text-5xl opacity-15"></i>
            </div>
        </div>
        <div class="card flex-row justify-between p-4">
            <div>
                <p class="text-xs+ uppercase">InActive Subscriptions</p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $expired_purchases }}
                    </p>
                    {{--  <p class="text-xs text-success">+8%</p>  --}}
                </div>
            </div>
            <div class="mask is-squircle flex size-10 items-center justify-center bg-success/10">
                <i class="fa-solid fa-thumbs-up text-xl text-success"></i>
            </div>
            <div class="absolute bottom-0 right-0 overflow-hidden rounded-lg">
                <i class="fa-solid fa-thumbs-up translate-x-1/4 translate-y-1/4 text-5xl opacity-15"></i>
            </div>
        </div>
        <div class="card flex-row justify-between p-4">
            <div>
                <p class="text-xs+ uppercase">Total Downloads</p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $total_downloads }}
                    </p>
                    {{--  <p class="text-xs text-error">-2.3%</p>  --}}
                </div>
            </div>
            <div class="mask is-squircle flex size-10 items-center justify-center bg-error/10">
                <i class="fa-solid fa-bug text-xl text-error"></i>
            </div>
            <div class="absolute bottom-0 right-0 overflow-hidden rounded-lg">
                <i class="fa-solid fa-bug translate-x-1/4 translate-y-1/4 text-5xl opacity-15"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-4">
        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Users Table
                </h2>
                <div class="flex">
                    <div class="flex items-center" x-data="{ isInputActive: false }">
                        <label class="block">
                            <input wire:model="search"
                                class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200 w-32 lg:w-48"
                                placeholder="Search here..." type="text">
                        </label>
                        <button
                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        
                        <button  @click="$wire.show_filter_modal = true"
                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <i class="fa-solid fa-filter"></i>
                        </button>
                        
                    </div>
                  
                </div>
            </div>
            <div class="card mt-3">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <table class="is-hoverable w-full text-left">
                        <thead>
                            <tr>
                                <th
                                    class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    #
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Avatar
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Name
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Last Seen
                                </th>
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Phone
                                </th>

                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Purchase Date
                                </th>

                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Renewal Date
                                </th>

                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Downloads
                                </th>

                                <th
                                    class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="avatar flex h-10 w-10">
                                            <button class="avatar h-12 w-12">
                                                <img class="rounded-full" src="{{ $user->profile_photo_url }}"
                                                    alt="{{ $user->name }}">
                                                <span
                                                    class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white {{ $user->is_online ? 'bg-success' : 'bg-slate-300' }}   dark:border-navy-700"></span>
                                            </button>
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 dark:text-navy-100 lg:px-5">
                                        {{ $user->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $user->last_online_at_for_humans }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $user->phone }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $user?->purchases()?->value('subscription_start') }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        @if ($user->purchases()->exists())
                                            @if (\Carbon\Carbon::now()->greaterThan($user->purchases()->value('subscription_end')))
                                                <p class="text-error">
                                                    {{ $user?->purchases()?->value('subscription_end') }}
                                                </p>
                                            @else
                                                <p class="text-success">
                                                    {{ $user?->purchases()?->value('subscription_end') }}
                                                </p>
                                            @endif
                                        @endif

                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div
                                            class="badge rounded-full  bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light">
                                            {{ $user->downloads()->count() }}
                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                                        <a class="px-2" href="javascript:;" wire:click="viewUser({{ $user->id }})">
                                            <i class="fa-solid fa-eye text-primary"></i>
                                        </a>

                                        @if ($user->purchases()->exists())
                                            @if (\Carbon\Carbon::now()->greaterThan($user->purchases()->value('subscription_end')))
                                             {{--  //wire:click="userSubscriprion({{ $user->id }})"     --}}
                                            <a href="javascript:;" @click="$wire.userSubscriprion({{ $user->id }})"
                                                    class="badge bg-error/10 text-error dark:bg-error/15">Renew</a>
                                            @else
                                                <a href="javascript:;" 
                                                    class="badge bg-success/10 text-success dark:bg-success/15">Active</a>
                                            @endif
                                        @else
                                            <a href="javascript:;" @click="$wire.userSubscriprion({{ $user->id }})"
                                                class="badge bg-error/10 text-error dark:bg-error/15">
                                                No Subscription
                                            </a>
                                        @endif



                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                <div
                    class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                    <div class="flex items-center space-x-2 text-xs+">
                        <span>Show</span>
                        <label class="block">
                            <select wire:model="limit"
                                class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <option>10</option>
                                <option>30</option>
                                <option>50</option>
                                <option>150</option>
                            </select>
                        </label>
                        <span>entries</span>
                    </div>

                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
    
    
    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-4">
      <div>
          <div class="flex items-center justify-between">
              <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                  Admins
              </h2>
              <div class="flex">
                  <div class="flex items-center" x-data="{ isInputActive: false }">
                      <label class="block">
                          <input wire:model="search_admin"
                              class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200 w-32 lg:w-48"
                              placeholder="Search here..." type="text">
                      </label>
                      <button @click="isInputActive = !isInputActive"
                          class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                              viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                          </svg>
                      </button>
                  </div>
                  <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)"
                      class="inline-flex">
                      <button x-ref="popperRef" @click="() => {  $wire.resetForm(); $wire.create_new_admin = true; }"
                          class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <i class="fa-solid fa-plus"></i>
                      </button>
                     
                  </div>
              </div>
          </div>
          <div class="card mt-3">
              <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table class="is-hoverable w-full text-left">
                      <thead>
                          <tr>
                              <th
                                  class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                  #
                              </th>
                              <th
                                  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                  Avatar
                              </th>
                              <th
                                  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                  Name
                              </th>
                              <th
                                  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                  Last Seen
                              </th>
                              <th
                                  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                  Phone
                              </th>

                        
                              <th
                                  class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                  Action
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($admins as $key => $admin)
                              <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                      {{ $key + 1 }}
                                  </td>
                                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                      <div class="avatar flex h-10 w-10">
                                          <button class="avatar h-12 w-12">
                                              <img class="rounded-full" src="{{ $admin->profile_photo_url }}"
                                                  alt="{{ $admin->name }}">
                                              <span
                                                  class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white {{ $admin->is_online ? 'bg-success' : 'bg-slate-300' }}   dark:border-navy-700"></span>
                                          </button>
                                      </div>
                                  </td>
                                  <td
                                      class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 dark:text-navy-100 lg:px-5">
                                      {{ $admin->name }}
                                  </td>
                                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                      {{ $admin->last_online_at_for_humans }}
                                  </td>

                                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                      {{ $admin->phone }}
                                  </td>


                                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                    <a class="px-2" href="javascript:;" wire:click="viewUser({{ $admin->id }})">
                                      <i class="fa-solid fa-eye"></i>
                                  </a>
                                  
                                  <a class="px-2" href="javascript:;" wire:click="delete({{ $admin->id }})">
                                      <i class="fa-solid fa-trash "></i>
                                  </a>
                                      
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>



              <div
                  class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
                  <div class="flex items-center space-x-2 text-xs+">
                      <span>Show</span>
                      <label class="block">
                          <select wire:model="limit"
                              class="form-select rounded-full border border-slate-300 bg-white px-2 py-1 pr-6 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                              <option>10</option>
                              <option>30</option>
                              <option>50</option>
                              <option>150</option>
                          </select>
                      </label>
                      <span>entries</span>
                  </div>

                  {{ $admins->links() }}
              </div>

          </div>
      </div>
  </div>
  
    <x-modal-x title="Filters" wire:model="show_filter_modal">
        
        <div class="mt-4 space-y-4">
            
            <label class="block">
                <span>Subscription:</span>
                <x-select wire:model="filter_by_status" :error="'filter_by_status'" :options="['active' => 'Active', 'expired' => 'Expired']" />
            </label>
            
            <label class="block">
                <span>Start Date:</span>
                <x-input-x wire:model="start_date" type="date" placeholder=" Enter Title" :error="'start_date'" min="{{ \Carbon\Carbon::now()->toDateString() }}"/>
            </label>
            
            <label class="block">
              <span>End Date:</span>
              <x-input-x wire:model="end_date" type="date" placeholder=" Enter Title" :error="'end_date'" min="{{ $start_date }}" />
          </label>
            
            <div class="space-x-2 text-right">
                <a wire:click="$set('show_filter_modal', false)"
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    Apply
                </a>
                
            </div>
        </div>
        
    </x-modal-x>
  
  
    <x-modal-x title="Add / Update Subscriptions" wire:model="create_new_subscription">
      
      <form wire:submit.prevent="saveSubscription">
        
        <div class="mt-4 space-y-4">
          
          
            <label class="block">
                <span>Package:</span>
                <x-select wire:model="package_id" :error="'package_id'" :options="$packages?->pluck('name', 'id')"/>
            </label>
           
            
            <label class="block">
                <span>Subscription Start:</span>
                <x-input-x wire:model="subscription_start" type="date" placeholder=" Enter Title" :error="'subscription_start'" min="{{ \Carbon\Carbon::now()->toDateString() }}"/>
            </label>
            
            <label class="block">
                <span>Subscription End:</span>
                <x-input-x wire:model="subscription_end" type="date" placeholder=" Enter Title" :error="'subscription_end'" min="{{ $subscription_start }}" />
            </label>
            
            <div class="space-x-2 text-right">
                <a wire:click="$set('create_new_subscription', false)"
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    Cancel
                </a>
                <button type="submit"
                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    <div wire:loading wire:target="saveSubscription"
                        class="mr-1 spinner h-4 w-4 animate-spin rounded-full border-[3px] border-white-500 border-r-transparent dark:border-white-500 dark:border-r-transparent">
                    </div> Apply
                </button>
            </div>
        </div>
        
      </form>
      
    </x-modal-x>
        

    <x-modal-x title="Create OR Edit Admin" wire:model="create_new_admin">
      
      <form wire:submit.prevent="saveUser">
        <div class="mt-4 space-y-4">
            
            <label class="block">
                <span>Name:</span>
                <x-input-x wire:model="name" placeholder=" Enter Title" :error="'name'"/>
            </label>
            
            <label class="block">
                <span>Email:</span>
                <x-input-x wire:model="email" placeholder=" Enter Email" :error="'email'"/>
            </label>
            
            <label class="block">
                <span>Phone:</span>
                <x-input-x wire:model="phone" placeholder=" Enter Phone" :error="'phone'"/>
            </label>
            
            <label class="block">
                <span>Password:</span>
                <x-input-x wire:model="password" type="password" placeholder=" Enter Password" :error="'password'"/>
            </label>
            
            <div class="space-x-2 text-right">
                <a wire:click="$set('create_new_admin', false)"
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    Cancel
                </a>
                <button type="submit"
                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    <div wire:loading wire:target="saveUser"
                        class="mr-1 spinner h-4 w-4 animate-spin rounded-full border-[3px] border-white-500 border-r-transparent dark:border-white-500 dark:border-r-transparent">
                    </div> Apply
                </button>
            </div>
        </div>
      
    </x-modal-x>

    <x-modal-x title="View User" wire:model="view_user">
      
      <form wire:submit.prevent="saveUser">
        <div class="mt-4 space-y-4">
            
            
            <label class="block">
                <span>Name:</span>
                <x-input-x wire:model="name" placeholder=" Enter Title" :error="'name'"/>
            </label>
            
            <label class="block">
                <span>Email:</span>
                <x-input-x wire:model="email" placeholder=" Enter Email" :error="'email'"/>
            </label>
            
            <label class="block">
                <span>Phone:</span>
                <x-input-x wire:model="phone" placeholder=" Enter Phone" :error="'phone'"/>
            </label>
            
            
            <label class="block">
              <span>Password:</span>
              <x-input-x wire:model="password" type="password" placeholder=" Enter Password" :error="'password'"/>
            </label>
                
            
            <div class="space-x-2 text-right">
                <a wire:click="$set('view_user', false)"
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    Cancel
                </a>
                <button type="submit"
                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    <div wire:loading wire:target="saveUser"
                        class="mr-1 spinner h-4 w-4 animate-spin rounded-full border-[3px] border-white-500 border-r-transparent dark:border-white-500 dark:border-r-transparent">
                    </div> Apply
                </button>
            </div>
        </div>
    </form>

    </x-modal-x>


</div>
