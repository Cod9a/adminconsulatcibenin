<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tableau de bord') }}
    </h2>
  </x-slot>

  <div class="sm:max-w-7xl sm:mx-auto sm:px-4 md:px-7 lg:px-8 mt-12 divide-y">
    <div
      class="
        grid grid-cols-3
        my-6
        rounded-none
        sm:rounded-md
        overflow-hidden
        shadow
      ">
      <div class="flex items-start space-x-4 bg-white p-4">
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
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </span>
        <div class="flex flex-col">
          <span class="font-medium text-gray-700 truncate"
            >Nombre d'utilisateurs</span
          >
          <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
            >{{ $nUsers }}</span
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
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
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
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
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
