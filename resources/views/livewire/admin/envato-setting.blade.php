<div x-data="{ showModal: @entangle('showModal') }">

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 mt-4">
        <div class="card flex-row justify-between p-4">
            <div>
                <p class="text-xs+ uppercase">Total Downloads</p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $total_downloads }}
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
                <p class="text-xs+ uppercase">
                    Total Accounts
                </p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $total_accounts }}
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
                <p class="text-xs+ uppercase">Total
                    Active Accounts
                </p>
                <div class="mt-8 flex items-baseline space-x-1">
                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                        {{ $total_active }}
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


    <div class="mt-4 grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">

        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Envato Setting
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

                    <button @click="showModal = true" id="updateOrCreate"
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
                                    Username
                                </th>

                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Total Downloads
                                </th>

                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Limit
                                </th>


                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Status
                                </th>

                                <th
                                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Last Updated
                                </th>


                                <th
                                    class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($envato_cookies as $key => $data)
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $key + 1 }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $data->username }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $data->total_downloads }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $data->limit_downloads }}
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div wire:click="changeActive({{ $data->id }})" class="cursor-pointer">
                                            @if ($data->active == 1)
                                                <span
                                                    class="badge bg-success/10 text-success dark:bg-success/15">Active</span>
                                            @else
                                                <span
                                                    class="badge bg-error/10 text-error dark:bg-error/15">Inactive</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        {{ $data->updated_at->diffForHumans() }}
                                    </td>



                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex gap-4">

                                            <a href="javascript:void(0);"
                                                wire:click="updateCookie('{{ $data->id }}')">
                                                <i class="fas fa-refresh" wire:loading.remove
                                                    wire:target="updateCookie"></i>
                                                <div wire:loading wire:target="updateCookie"
                                                    class="mr-1 spinner h-4 w-4 animate-spin rounded-full border-[3px] border-white-500 border-r-transparent dark:border-white-500 dark:border-r-transparent">
                                                </div>
                                            </a>

                                            <a href="javascript:void(0);"
                                                wire:click="deleteEnvatoAccount('{{ $data->id }}')">
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

                    {{ $envato_cookies->links() }}
                </div>

            </div>
        </div>

    </div>

    <div class="inline-flex">

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
                        Envato Setting
                    </h3>
                    <button @click="showModal = !showModal"
                        class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="px-4 py-4 sm:px-5">
                    <p>
                        Fill in the information below to add or update
                    </p>
                    <form wire:submit.prevent="store">
                        <div class="mt-4 space-y-4">


                            <label class="block">
                                <span>Username:</span>
                                <x-input-x wire:model="username" placeholder=" Enter Username" :error="'username'" />
                            </label>


                            <label class="block">
                                <span>Passoword:</span>
                                <x-input-x wire:model="password" type="password" placeholder=" Enter Password"
                                    :error="'password'" />
                            </label>


                            <label class="block">
                                <span>Proxy:</span>
                                <x-input-x wire:model="proxy" placeholder=" Enter Proxy" :error="'proxy'" />
                            </label>


                            <div class="space-x-2 text-right">
                                <a @click="showModal = false" id="closeModal"
                                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <div wire:loading wire:target="store"
                                        class="mr-1 spinner h-4 w-4 animate-spin rounded-full border-[3px] border-white-500 border-r-transparent dark:border-white-500 dark:border-r-transparent">
                                    </div> Apply
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>





</div>
