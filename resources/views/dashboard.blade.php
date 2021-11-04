<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tableau de bord') }}
    </h2>
  </x-slot>

  <div class="sm:max-w-7xl sm:mx-auto sm:px-4 md:px-7 lg:px-8 mt-12 divide-y">
    <div
      class="
        grid grid-cols-2
        my-6
        rounded-none
        sm:rounded-md
        overflow-hidden
        shadow
      ">
      <div class="flex items-start space-x-4 bg-white p-4 border-l">
        <span class="p-3 rounded-md bg-indigo-500 hidden sm:inline-block">
          <svg
            class="w-6 h-6 text-white"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </span>
        <div class="flex flex-col">
          <span class="font-medium text-gray-700 truncate"
            >Nombre total de demandes</span
          >
          <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
            >{{ $nDemands }}</span
          >
        </div>
      </div>
      <div class="flex items-start space-x-4 bg-white p-4 border-l">
        <span class="p-3 rounded-md bg-indigo-500 hidden sm:inline-block">
          <svg
            class="w-6 h-6 text-white"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
          </svg>
        </span>
        <div class="flex flex-col">
          <span class="font-medium text-gray-700 truncate"
            >Nombre de rendez-vous aujourd'hui</span
          >
          <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
            >{{ $nMeetingsToday }}</span
          >
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
