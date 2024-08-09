<div>

    <div class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6">
        <div class="flex items-center space-x-1">

            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                Settings
            </h2>
        </div>
        <div class="flex justify-center space-x-2">

            <button wire:click="save"
                class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
               <i class="fa fa-spinner fa-spin" wire:loading wire:target="save"></i>
               &nbsp;
                Save
            </button>
        </div>
    </div>



    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        <div class="col-span-12 lg:col-span-12">
            <div class="card">
                <div class="tabs flex flex-col">
                    <div class="tab-content p-4 sm:p-5">
                        <div class="space-y-5">
                           
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">
                                    Title
                                </span>
                                <x-input-x wire:model="title" :error="'title'" />
                            </label>
                            
                            
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">
                                    Interval
                                </span>
                                <x-input-x wire:model="interval" type="number" :error="'interval'" />
                            </label>
                           
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100 mb-2">
                                    Logo
                                </span>
                                <x-image :error="'logo'" :value="$logo" />
                            </label>
                            
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">
                                    Contact URL
                                </span>
                                <x-input-x wire:model="contact_url" :error="'contact_url'" />
                            </label>
                            
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">
                                    Payment Enabled
                                </span>
                                <x-select wire:model="payment_enabled" :error="'payment_enabled'" :options="[0 => 'No', 1 => 'Yes']" />
                            </label>
                            
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">
                                    Razorpay Key
                                </span>
                                <x-input-x wire:model="razorpay_key" :error="'razorpay_key'" />
                            </label>
                            
                            <label class="block">
                                <span class="font-medium text-slate-600 dark:text-navy-100">
                                    Razorpay Secret
                                </span>
                                <x-input-x wire:model="razorpay_secret" :error="'razorpay_secret'" />
                            </label>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
