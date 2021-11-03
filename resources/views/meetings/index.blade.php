<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Liste des Rendez-vous') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div
      class="sm:max-w-7xl sm:mx-auto sm:px-4 md:px-7 lg:px-8"
      x-data="meetingsIndex(`{{ route('api.meetings.index') }}`)">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div
            class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div
              class="
                shadow
                overflow-hidden
                border-b border-gray-200
                sm:rounded-lg
              ">
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
                      Type de rendez-vous
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
                      Date du rendez-vous
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <template x-for="meeting in meetings">
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div
                            class="text-sm font-medium text-gray-900"
                            x-text="meeting.meeting_type === 0 ? 'Empreintes biométriques & signature électronique' : 'Retrait de document'"></div>
                        </div>
                      </td>
                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-sm text-gray-500
                        "
                        x-text="meeting.meeting_date_formatted"></td>
                      <td
                        class="
                          px-6
                          py-4
                          whitespace-nowrap
                          text-right text-sm
                          font-medium
                        ">
                        <button
                          @click="setDeleted(meeting)"
                          class="
                            text-red-600
                            hover:text-red-900
                            inline-flex
                            items-center
                            space-x-1
                            font-medium
                            disabled:opacity-50
                          "
                          :disabled="meeting.deleted">
                          <span
                            ><svg
                              class="w-4 h-4"
                              fill="none"
                              stroke="currentColor"
                              viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg
                          ></span>
                          <span>Supprimer</span>
                        </button>
                      </td>
                    </tr>
                  </template>
                  <template x-if="loading">
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
                          <span class="text-gray-500">Chargement...</span>
                        </div>
                      </td>
                    </tr>
                  </template>
                  <template x-if="meetings.length === 0 && !loading">
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
                            >Pas de donnees pour l'instant</span
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
        <div class="mt-4">
          <button
            @click.prevent="fetchPrev()"
            :disabled="prev_link === null"
            class="
              shadow
              inline-flex
              items-center
              px-4
              py-2
              bg-white
              border border-transparent
              rounded-md
              font-semibold
              text-xs text-gray-500
              uppercase
              tracking-widest
              focus:outline-none focus:ring focus:ring-gray-300
              disabled:opacity-25
              transition
            ">
            Prev
          </button>
          <button
            @click.prevent="fetchNext()"
            :disabled="next_link === null"
            class="
              inline-flex
              items-center
              px-4
              py-2
              bg-gray-800
              border border-transparent
              rounded-md
              font-semibold
              text-xs text-white
              uppercase
              tracking-widest
              hover:bg-gray-700
              active:bg-gray-900
              focus:outline-none
              focus:border-gray-900
              focus:ring
              focus:ring-gray-300
              disabled:opacity-25
              transition
            ">
            Next
          </button>
        </div>
      </div>

      <x-deletion-modal x-show="deleted !== null" x-cloak>
        <x-slot name="header">
          Etes-vous surs de vouloir supprimer ce rendez-vous?
        </x-slot>
        <x-slot name="body">
          Le rendez-vous sera déprogrammer sans possibilité de le récupérer.
          Cette action est définitive.
        </x-slot>
        <x-slot name="actions">
          <button
            @click="sendDeletion()"
            type="button"
            class="
              w-full
              inline-flex
              justify-center
              rounded-md
              border border-transparent
              shadow-sm
              px-4
              py-2
              bg-red-600
              text-base
              font-medium
              text-white
              hover:bg-red-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-red-500
              sm:ml-3 sm:w-auto sm:text-sm
            ">
            Supprimer
          </button>
          <button
            @click="cancelDeletion()"
            type="button"
            class="
              mt-3
              w-full
              inline-flex
              justify-center
              rounded-md
              border border-gray-300
              shadow-sm
              px-4
              py-2
              bg-white
              text-base
              font-medium
              text-gray-700
              hover:bg-gray-50
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-indigo-500
              sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
            ">
            Annuler
          </button>
        </x-slot>
      </x-deletion-modal>
    </div>
  </div>
</x-app-layout>
