<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('QR Code Scanning') }}
    </h2>
  </x-slot>
  <div
    x-data="{qrScanner: null, timeout: null, wait: false}"
    x-init="timeout = () => wait = true; qrScanner = new QrScanner($refs.videoElm, (result) => {
            let informations = JSON.parse(result);
            if (!wait) {
                axios
                    .post(`{{ route('waiting-queue-items.store') }}`, informations)
                    .then((response) => {
                        wait = true;
                        clearTimeout(timeout);
                        setTimeout(timeout, 1000);
                        window.location.href = '/';
                    })
                    .catch((e) => {
                        wait = true;
                        clearTimeout(timeout);
                        setTimeout(timeout, 1000);
                        if (e.response.status === 422) {
                            $dispatch('form-error', e.response.data.errors);
                        }
                    });
            }
    }); qrScanner.start()">
    <div class="mx-auto relative py-5">
      <video src="" x-ref="videoElm" class="mx-auto max-w-7xl w-full"></video>
    </div>
  </div>
  <div class="bg-red-600 fixed inset-x-0 top-0" x-data="{errors: [], opened: false}" @form-error.window="errors = $event.detail; opened = true;" x-show="opened"
      x-transition.duration.300ms>
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex items-start justify-between flex-wrap">
        <div class="w-0 flex-1 flex items-start">
          <span class="flex p-2 rounded-lg bg-red-800">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
          </span>
          <p class="ml-3 font-medium text-white truncate">
            <ul class="ml-5">
                <template x-for="error in errors">
                    <li class="text-white" x-text="error"></li>
                </template>
            </ul>
          </p>
        </div>
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
          <button
            type="button"
            @click="opened = false"
            class="
              -mr-1
              flex
              p-2
              rounded-md
              hover:bg-red-500
              focus:outline-none focus:ring-2 focus:ring-white
              sm:-mr-2
            ">
            <span class="sr-only">Dismiss</span>
            <svg
              class="h-6 w-6 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
