<div class="w-full max-w-[26rem] p-4 sm:px-5">
    <div class="text-center">
        {{ $logo }}
        <div class="mt-4">
          <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
            Welcome Back
          </h2>
          <p class="text-slate-400 dark:text-navy-300">
            Please sign in to continue
          </p>
        </div>
      </div>

    <div class="card mt-5 rounded-lg p-5 lg:p-7">
        {{ $slot }}
    </div>
</div>
