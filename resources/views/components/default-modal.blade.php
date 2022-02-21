<div
  class="fixed z-10 inset-0 overflow-y-auto"
  aria-labelledby="modal-title"
  role="dialog"
  aria-modal="true"
  {{
  $attributes
  }}>
  <div
    class="
      flex
      items-end
      justify-center
      min-h-screen
      pt-4
      px-4
      pb-20
      text-center
      sm:block sm:p-0
    ">
    <div
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
      aria-hidden="true"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:enter="ease-in duration-200"
      x-transition:leave-end="opacity-0"
      x-transition:leave-start="opacity-100"></div>
    <span
      class="hidden sm:inline-block sm:align-middle sm:h-screen"
      aria-hidden="true"
      >&#8203;</span
    >
    <div
      class="
        inline-block
        bg-white
        rounded-lg
        text-left
        overflow-hidden
        shadow-xl
        transform
        transition-all
        sm:my-8 sm:align-middle sm:max-w-xl
        md:max-w-3xl
        lg:max-w-4xl
        sm:w-full
        max-w-screen
      "
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
      x-transition:enter="ease-in duration-200"
      x-transition:leave-end="opacity-0 translate-y-0 sm:scale-100"
      x-transition:leave-start="opacity-100 translate-y-4 sm:translate-y-0 sm:scale-95"
      {{
      $attributes
      }}>
      {{ $content }}
    </div>
  </div>
</div>
