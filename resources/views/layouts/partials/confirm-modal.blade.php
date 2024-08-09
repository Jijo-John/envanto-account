<div x-data="{ showModal: false }">

    <button @click="showModal = true" id="confirm-modal"
        class="hidden btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
    </button>

    <template x-teleport="#x-teleport-target">
        <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
            x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300"
                @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            <div class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
                x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                
                
                <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="inline h-28 w-28 text-success mr-4" viewBox="0 0 595.275 841.891" style="enable-background:new 0 0 595.275 841.891;" xml:space="preserve">
                  <g>
                    <path style="fill:#FFFFFF;" d="M326.039,513.568h-69.557v-9.441c0-10.531,2.12-19.876,6.358-28.034   c4.239-8.156,13.165-18.527,26.783-31.117l12.33-11.176c7.322-6.678,12.684-12.973,16.09-18.882   c3.4-5.907,5.105-11.817,5.105-17.727c0-8.99-3.084-16.022-9.248-21.098c-6.166-5.073-14.773-7.611-25.819-7.611   c-10.405,0-21.646,2.152-33.719,6.455c-12.075,4.305-24.663,10.693-37.765,19.171v-60.5c15.541-5.395,29.735-9.375,42.582-11.946   c12.843-2.568,25.241-3.854,37.186-3.854c31.342,0,55.232,6.392,71.678,19.171c16.439,12.783,24.662,31.439,24.662,55.973   c0,12.591-2.506,23.862-7.516,33.815c-5.008,9.956-13.553,20.649-25.625,32.08l-12.332,10.983   c-8.736,7.966-14.451,14.354-17.148,19.171s-4.045,10.115-4.045,15.896V513.568z M256.482,542.085h69.557v68.593h-69.557V542.085z"/>
                  </g>
                  <circle style="fill:#F44336;" cx="299.76" cy="439.067" r="218.516"/>
                  <g>
                    
                      <rect x="267.162" y="307.978" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -222.6202 340.6915)" style="fill:#FFFFFF;" width="65.545" height="262.18"/>
                    
                      <rect x="266.988" y="308.153" transform="matrix(0.7071 0.7071 -0.7071 0.7071 398.3889 -83.3116)" style="fill:#FFFFFF;" width="65.544" height="262.179"/>
                  </g>
                  </svg>
                  
               

                <div class="mt-2">
                    <h2 class="text-2xl text-slate-700 dark:text-navy-100" id="title-confirm">
                    </h2>
                    <p class="mt-2" id="message-confirm">

                    </p>
                    <button @click="showModal = false"
                        class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                        Close
                    </button>
                    
                      <button onclick="callBack()" @click="showModal = false"
                        class="btn mt-6 bg-navy-500 font-medium text-white hover:bg-navy-500-focus focus:bg-navy-500-focus active:bg-navy-500-focus/90">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </template>
    
    <script>
    function callBack()
    {
        Livewire.emit('remove');
    }
    </script>
</div>
