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
    <div
      class="flex flex-col"
      x-data="waitingQueueItemsIndex(`{{ route('waiting-queue-items.index') }}`)">
      <div class="py-6">
        <x-link href="/test" class="inline-flex items-center space-x-2">
          <span
            ><svg
              class="w-6 h-6 text-gray-300"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg
          ></span>
          <span>Valider un nouveau QR Code</span>
        </x-link>
      </div>
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
            ">
            <h2 class="bg-white px-4 py-2 text-2xl font-semibold">
              File d'attente
            </h2>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    ">
                    ID
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    ">
                    Name
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    ">
                    Code
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    ">
                    Heure du rendez-vous
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <template x-for="waitingQueueItem in waitingQueueItems">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="text-sm font-medium text-gray-900"
                          x-text="waitingQueueItem.id"></div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div
                        class="text-sm text-gray-900"
                        x-text="`${waitingQueueItem.meeting.user.nom} ${waitingQueueItem.meeting.user.prenom}`"></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div
                        class="text-sm text-gray-900"
                        x-text="waitingQueueItem.code"></div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      x-text="waitingQueueItem.meeting.meeting_hour"></td>
                  </tr>
                </template>
                <template x-if="waitingQueueItems.length === 0">
                  <tr>
                    <td colspan="5">
                      <div
                        class="
                          flex flex-col
                          items-center
                          justify-center
                          py-12
                          space-y-8
                        ">
                        <div class="rounded-full bg-gray-100">
                          <img
                            src="{{ asset('assets/images/empty.svg') }}"
                            alt=""
                            class="w-80" />
                        </div>
                        <span class="text-gray-500"
                          >Personne pour le moment</span
                        >
                      </div>
                    </td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
