<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('QR Code Scanning') }}
    </h2>
  </x-slot>
  <div
    x-data="{qrScanner: null}"
    x-init="qrScanner = new QrScanner($refs.videoElm, result => console.log('decoded qr code:', result)); qrScanner.start()">
    <div class="mx-auto relative">
      <video
        src=""
        x-ref="videoElm"
        class="mx-auto w-full object-center object-cover"></video>
      <div
        class="
          absolute
          top-1/2
          left-1/2
          -translate-x-1/2 -translate-y-1/2
          w-96
          h-96
          bg-transparent
          rounded-md
          z-10
        "></div>
      <div
        class="absolute content-[''] bg-opacity-25 bg-black inset-0"
        style="clip-path: polygon()"></div>
    </div>
  </div>
</x-app-layout>
