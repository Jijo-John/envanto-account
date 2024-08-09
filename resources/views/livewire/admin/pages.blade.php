<div>



    <div class="mt-4 grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Page
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
                    </div>

                    <button @click="showModal = true" id="updateOrCreate" wire:click="resetForm"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <i class="fas fa-plus"></i>
                    </button>


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
                                    Title
                                </th>
                                
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    URL
                                </th>
                                
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Status 
                                </th>
                                
                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Show in footer
                                </th>
                               

                                <th
                                    class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $data)
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $key + 1 }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $data->title }}
                                    </td>
                                    
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ asset('/'). $data->slug }}
                                    </td>
                                    
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5" >
                                        <div wire:click="changeStatus('{{ $data->id }}', 'status')" >
                                        <x-toggle :status="$data->status" />
                                        </div>
                                    </td>
                                    
                                    
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5" >
                                        <div wire:click="changeStatus('{{ $data->id }}', 'show_in_footer')" >
                                        <x-toggle :status="$data->show_in_footer" />
                                        </div>
                                    </td>
                                    


                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex gap-4">

                                            <a href="javascript:void(0);" wire:click="edit('{{ $data->id }}')">
                                                <i class="fas fa-pencil"></i>
                                            </a>

                                            <a href="javascript:void(0);" wire:click="delete('{{ $data->id }}')">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
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

                    {{ $datas->links() }}
                </div>

            </div>
        </div>

    </div>

    <div x-data="{ showModal: false }" class="inline-flex">
        <button @click="showModal = true" id="openModal"
            class="hidden  btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
            {{--  <i class="fas fa-plus"></i>  --}}
        </button>

        {{--  <template x-teleport="#x-teleport-target">  --}}
        <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
            x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false"
                x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"></div>
            <div class="overflow-auto relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Add / Update 
                    </h3>
                    <button @click="showModal = !showModal"
                        class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="px-4 py-4 sm:px-5">
                    <p>
                        Fill in the information below to add or update
                    </p>
                    <form wire:submit.prevent="updateOrCreate">
                        <div class="mt-4 space-y-4">


                            <label class="block">
                                <span>Title:</span>
                                <x-input-x wire:model="title" placeholder=" Enter Title" :error="'title'" />
                            </label>



                            <label class="block">
                                <span class="mb-2">Description:</span>
                                <x-quill-editer wire:model="content" :error="'content'" />
                            </label>



                            <div class="space-x-2 text-right">
                                <a @click="showModal = false" id="closeModal"
                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <div wire:loading wire:target="updateOrCreate"
                                        class="mr-1 spinner h-4 w-4 animate-spin rounded-full border-[3px] border-white-500 border-r-transparent dark:border-white-500 dark:border-r-transparent">
                                    </div> Apply
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--  </template>  --}}

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('openModal', function(msg) {
                document.getElementById('openModal').click();
            });

            Livewire.on('closeModal', function(msg) {
                document.getElementById('closeModal').click();
            });
            
        
        });

        $('#edit').click(function() {
            document.getElementById('updateOrCreate').click();
        })
    </script>





</div>
