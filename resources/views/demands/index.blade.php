<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Demandes') }}
    </h2>
  </x-slot>

  <div
    class="sm:max-w-7xl sm:mx-auto sm:px-4 md:px-7 lg:px-8 mt-12"
    x-data="demandsIndex(`{{ route('api.demands.index') }}`)">
    <div class="flex flex-col">
      <div>
        <form
          class="
            flex flex-col
            sm:flex-row sm:items-center
            my-2
            sm:space-x-2 sm:space-y-0
            space-y-2
          ">
          <input
            x-model="q"
            type="search"
            name="q"
            placeholder="Rechercher un document"
            class="
              py-1
              border-gray-300
              sm:max-w-xs sm:w-full
              focus:border-blue-500
              focus:ring
              focus:ring-blue-500
              focus:ring-opacity-50
              transition
              ease-in-out
              duration-300
              rounded-md
            " />
          <div
            class="
              flex
              sm:flex-row-reverse
              flex-row
              space-x-3
              sm:space-x-reverse
            ">
            <button
              @click.prevent="q = ''; search()"
              class="
                w-1/2
                sm:w-auto
                bg-white
                py-2
                px-3
                rounded-md
                shadow
                text-sm
                uppercase
                text-gray-700
                tracking-wide
                font-semibold
              ">
              Reinitialiser
            </button>
            <button
              @click.prevent="search()"
              class="
                w-1/2
                sm:w-auto
                bg-gray-900
                py-2
                px-3
                rounded-md
                shadow
                text-sm
                uppercase
                text-white
                tracking-wide
                font-semibold
              ">
              Rechercher
            </button>
          </div>
        </form>
        <div x-data="{ tab: 'all' }">
          <a href="#" @click.prevent="getI('all')" period="all" class="p-3 border mr-1 my-3 bg-white inline-block" :class="{ 'active': tab === 'all' }" >Tous</a>
          <a href="#" @click.prevent="getI('today')" period="today" class="p-3 border mr-1 my-3 bg-white inline-block" :class="{ 'active': tab === 'today' }" >Aujourd'hui</a>
          <a href="#" @click.prevent="getI('week')" period="week" class="p-3 border mr-1 my-3 bg-white inline-block" :class="{ 'active': tab === 'week' }" >Cette semaine</a>
          <a href="#" @click.prevent="getI('month')" period="month" class="p-3 border mr-1 my-3 bg-white inline-block" :class="{ 'active': tab === 'month' }" >Ce mois</a>
          <a href="#" @click.prevent="getI('year')" period="year" class="p-3 border mr-1 my-3 bg-white inline-block" :class="{ 'active': tab === 'year' }" >Cette année</a>
        </div>
        
        <!-- <a href="#" class="mr-2" style="margin-top: 1em; margin-bottom: 1em; display: inline-block;">Tout</a>
        <a href="#" class="mr-2" style="margin-top: 1em; margin-bottom: 1em; display: inline-block;">Aujourd'hui</a>
        <a href="#" class="mr-2" style="margin-top: 1em; margin-bottom: 1em; display: inline-block;">Semaine</a>
        <a href="#" class="mr-2" style="margin-top: 1em; margin-bottom: 1em; display: inline-block;">Mois</a>
        <a href="#" class="mr-2" style="margin-top: 1em; margin-bottom: 1em; display: inline-block;">Année</a> -->
      </div>
      <div
        class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 hide-scroll"
        style="padding-bottom: 200px; margin-bottom: -200px">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow border-b border-gray-200 sm:rounded-lg">
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
                      rounded-tl
                    ">
                    <input type="checkbox" name="main" class="mainCheckbox" onclick="toggle()">
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
                      rounded-tl
                    ">
                    Num Dossier
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
                      rounded-tl
                    ">
                    Nom & Prénom(s)
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
                      rounded-tl
                    ">
                    Date de naissance
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
                      rounded-tl
                    ">
                    Profession
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
                    Statut demande
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
                      rounded-tr
                    ">
                    Date de creation
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <template x-for="demand in demands">
                  <tr>
                    <td
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                      rounded-tl
                    ">
                      <input type="checkbox" name="sel">
                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div
                            class="text-sm font-medium text-gray-900"
                            x-text="'CC-' + demand.formatted_date + demand.formatted_id"></div>
                        </div>
                      </div>
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div
                            class="text-sm font-medium text-gray-900"
                            x-text="demand.first_name + ' ' + demand.last_name"></div>
                        </div>
                      </div>
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div
                            class="text-sm font-medium text-gray-900"
                            x-text="demand.formatted_birthdate"></div>
                        </div>
                      </div>
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div
                            class="text-sm font-medium text-gray-900"
                            x-text="demand.job"></div>
                        </div>
                      </div>
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="ml-4">
                          <div
                            class="text-xs font-medium text-gray-900 px-2 py-1 border border-2 rounded-lg font-semibold"
                            x-text="demand.status" :class="demand.status == 'rejeté' ? 'text-red-600 border-red-600' : (demand.status == 'disponible' ? 'text-blue-600 border-blue-600' : '')"></div>
                        </div>
                      </div>
                    </td>

                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                      <template x-if="demand.rejection === null">
                        <div
                          class="relative inline-block text-left"
                          x-data="{shown: false}"
                          @status-update="updateStatus($event.detail.demand, $event.detail.status)">
                          <button
                            class="
                              flex
                              items-center
                              bg-gray-100
                              px-2
                              py-1
                              rounded
                              space-x-2
                              focus:outline-none
                              focus:ring
                              focus:ring-opacity-50
                              focus:ring-gray-400
                              focus:ring-offset-2
                              hover:bg-gray-300
                              focus:bg-gray-300
                            "
                            @click="shown = true;">
                            <span
                              class="
                                inline-flex
                                text-xs
                                leading-5
                                font-semibold
                                rounded-full
                                text-gray-700
                                uppercase
                              "
                              x-text="demand.status"></span>
                            <span
                              ><svg
                                class="w-3 h-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path></svg
                            ></span>
                          </button>
                          <div
                            x-ref="popover"
                            x-show="shown"
                            @click.away="shown = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="z-10">
                            <div
                              class="
                                origin-top-right
                                absolute
                                z-10
                                right-0
                                mt-2
                                w-56
                                rounded-md
                                shadow-lg
                                bg-white
                                ring-1 ring-black ring-opacity-5
                                focus:outline-none
                              "
                              role="menu"
                              aria-orientation="vertical"
                              aria-labelledby="menu-button"
                              tabindex="-1">
                              <div class="py-1" role="none">
                                <a
                                  @click="$dispatch('status-update', {'demand': demand, 'status': 'en-attente'}); shown = false"
                                  class="
                                    cursor-pointer
                                    hover:bg-gray-100 hover:text-gray-900
                                    text-gray-700
                                    block
                                    px-4
                                    py-2
                                    text-sm
                                  "
                                  role="menuitem"
                                  tabindex="-1"
                                  id="menu-item-0"
                                  >En Attente</a
                                >
                                <a
                                  @click="$dispatch('status-update', {'demand': demand, 'status': 'disponible'}); shown = false"
                                  class="
                                    cursor-pointer
                                    hover:bg-gray-100 hover:text-gray-900
                                    text-gray-700
                                    block
                                    px-4
                                    py-2
                                    text-sm
                                  "
                                  role="menuitem"
                                  tabindex="-1"
                                  id="menu-item-1"
                                  >Disponible</a
                                >
                                <a
                                  @click="$dispatch('status-update', {'demand': demand, 'status': 'retire'}); shown = false"
                                  class="
                                    cursor-pointer
                                    hover:bg-gray-100 hover:text-gray-900
                                    text-gray-700
                                    block
                                    px-4
                                    py-2
                                    text-sm
                                  "
                                  role="menuitem"
                                  tabindex="-1"
                                  id="menu-item-2"
                                  >Retirer</a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </template>
                      <template x-if="demand.rejection !== null">
                        <span
                          class="
                            px-2
                            inline-flex
                            text-xs
                            leading-5
                            font-semibold
                            rounded-full
                            bg-red-100
                            text-red-800
                          ">
                          Rejeté
                        </span>
                      </template>
                    </td> -->
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      x-text="demand.formatted_date2"></td>
                    <td
                      class="
                        px-6
                        py-4
                        whitespace-nowrap
                        text-right text-sm
                        font-medium
                      ">
                      <a
                        @click.prevent="setSelectedDemand(demand)"
                        class="
                          text-amber-50
                          hover:text-blue-900
                          inline-flex
                          space-x-1
                          font-medium
                          disabled:opacity-50
                          cursor-pointer
                        "
                        ><i class="fas fa-chevron-right"></i></a
                      >
                    </td>
                  </tr>
                </template>
                <template x-if="demands.length === 0">
                  <tr>
                    <td colspan="8">
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
    <x-default-modal x-show="selectedDemand !== null" x-cloak>
      <x-slot name="content">
        <div class="bg-white h-auto px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <div class="flex justify-between">
                <h3
                class="text-lg leading-6 font-medium text-gray-900"
                id="modal-title"
                x-text="`Détail de la demande`"></h3> {{-- de ${selectedDemand?.document?.title} --}}
                <i class="far fa-times-circle fa-2x text-red-600 cursor-pointer" @click.prevent="cancelOutSelectedDemand()"></i>
              </div>
              <div
                class="
                  mt-8
                  grid grid-cols-1
                  sm:grid-cols-2
                  md:grid-cols-3
                  lg:grid-cols-4
                  gap-8
                ">
                <div class="row-span-1 sm:row-span-2">
                  <label class="text-sm text-gray-600" for="photo">Photo</label>
                  <div class="mt-2">
                    <span
                      class="
                        block
                        rounded-full
                        w-20
                        h-20
                        bg-white
                        inline-flex
                        items-center
                        justify-center
                        border
                      ">
                      <svg
                        class="w-8 h-8 text-gray-700"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="last-name"
                    >Nom</label
                  >
                  <span x-text="selectedDemand.last_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="first-name"
                    >Prénom(s)</label
                  >
                  <span x-text="selectedDemand.first_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="birthdate"
                    >Date de naissance</label
                  >
                  <span x-text="selectedDemand.formatted_birthdate"></span>
                </div>
                <!-- <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="origin-country"
                    >Pays de naissance</label
                  >
                  <span x-text="selectedDemand.origin_country"></span>
                </div> -->
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="origin-commune"
                    >Commune de naissance</label
                  >
                  <span
                    x-text="selectedDemand.origin_commune"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="job"
                    >Profession</label
                  >
                  <span x-text="selectedDemand.job"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="diploma"
                    >Diplôme</label
                  >
                  <span x-text="selectedDemand.diploma"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="phone"
                    >Numéro de téléphone</label
                  >
                  <span x-text="selectedDemand.phone"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="phone-alt"
                    >Numéro de téléphone alternatif</label
                  >
                  <span x-text="selectedDemand.phone_alt"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="genre">Sexe</label>
                  <span
                    x-text="selectedDemand.genre === 'male' ? 'Masculin' : 'Féminin'"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="spouse-name"
                    >Nom de votre époux</label
                  >
                  <span
                    x-text="selectedDemand.spouse_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="email">Email</label>
                  <span x-text="selectedDemand.email"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="mailbox"
                    >Boîte Postale</label
                  >
                  <span x-text="selectedDemand.mailbox"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="father-last-name"
                    >Nom du père</label
                  >
                  <span
                    x-text="selectedDemand.father_last_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="father-first-name"
                    >Prénom du père(s)</label
                  >
                  <span
                    x-text="selectedDemand.father_first_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="mother-last-name"
                    >Nom de la mère</label
                  >
                  <span
                    x-text="selectedDemand.mother_last_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="mother-first-name"
                    >Prénom de la mère(s)</label
                  >
                  <span
                    x-text="selectedDemand.mother_first_name"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="ethnic-grp"
                    >Ethnie</label
                  >
                  <span x-text="selectedDemand.ethnic_grp"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="arrival-date-ci"
                    >Date d'arrivée en Côte d'Ivoire</label
                  >
                  <span
                    x-text="selectedDemand.arrival_date_ci"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="residence-commune"
                    >Commune de résidence</label
                  >
                  <span
                    x-text="selectedDemand.residence_commune"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600"
                    >Situation matrimoniale</label
                  >
                  <span
                    x-text="selectedDemand.marital_situation === 'single' ? 'Célibataire' : 'Marié(e)'"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="n-children"
                    >Nombre d'enfants</label
                  >
                  <span x-text="selectedDemand.n_children"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="ravip-number"
                    >Numéro d'enrôlement Ravip</label
                  >
                  <span
                    x-text="selectedDemand.ravip_number"></span>
                </div>
                <div class="flex flex-col">
                  <label
                    class="text-sm text-gray-600"
                    for="benin-contact-fullname"
                    >Contact au Bénin</label
                  >
                  <span
                    x-text="selectedDemand.benin_contact_fullname"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="benin-contact-phone"
                    >Numéro de téléphone du contact</label
                  >
                  <span
                    x-text="selectedDemand.benin_contact_phone"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="ci-contact-fullname"
                    >Contact en Côte d'Ivoire</label
                  >
                  <span
                    x-text="selectedDemand.ci_contact_fullname"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="ci-contact-phone"
                    >Numéro de téléphone du contact</label
                  >
                  <span
                    x-text="selectedDemand.ci_contact_phone"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="eye-color"
                    >Couleur des Yeux</label
                  >
                  <span x-text="selectedDemand.eye_color"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="hair-color"
                    >Couleur des cheveux</label
                  >
                  <span x-text="selectedDemand.hair_color"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="complexion-color"
                    >Teint</label
                  >
                  <span
                    x-text="selectedDemand.complexion_color"></span>
                </div>
                <div class="flex flex-col">
                  <label class="text-sm text-gray-600" for="height"
                    >Taille (en cm)</label
                  >
                  <span x-text="selectedDemand.height"></span>
                </div>
                <div class="flex flex-col md:col-span-2">
                  <label class="text-sm text-gray-600" for="other-signs"
                    >Autres signes</label
                  >
                  <span
                    x-text="selectedDemand.other_signs"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          {{--<template x-if="!selectedDemand?.rejection">
            <button
              @click="rejectSelectedDemand()"
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
              Rejeter la demande
            </button>
          </template>--}}
          <button
            @click.prevent="cancelOutSelectedDemand()"
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
            Fermer
          </button>
          <button
            @click="rejectSelectedDemand()"
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
            " x-show="selectedDemand.status == 'en-attente'">
            Rejeter la demande
          </button>
          <button
            @click="onValidated()"
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
              bg-blue-600
              text-base
              font-medium
              text-white
              hover:bg-blue-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-red-500
              sm:ml-3 sm:w-auto sm:text-sm
            " x-cloak x-show="selectedDemand.status == 'en-attente'">
            Accepter la demande
          </button>
        </div>
      </x-slot>
    </x-default-modal>
    <x-default-modal x-show="rejectionModal" x-cloak>
      <x-slot name="content">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div>
            <div class="mt-3 text-center sm:mt-0 sm:m-4 sm:text-left">
              <h3
                class="text-lg leading-6 font-medium text-gray-900"
                id="modal-title">
                Formulaire de rejet
              </h3>
              <div class="mt-8 grid gap-1">
                <label
                  class="text-sm text-gray-600"
                  for="justificatif"
                  class="text-sm font-medium text-gray-600"
                  >Justificatif du rejet</label
                >
                <textarea
                  x-model="justificationText"
                  name=""
                  id=""
                  cols="30"
                  rows="5"
                  class="
                    w-full
                    rounded
                    focus:border-blue-500
                    focus:outline-none
                    focus:ring
                    focus:ring-opacity-50
                    focus:ring-blue-500
                    transition
                    ease-in-out
                    duration-300
                  "></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button
            @click="onRejectionConfirmed()"
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
            Rejeter la demande
          </button>
          <button
            @click="onRejectionCancelled()"
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
            Fermer
          </button>
        </div>
      </x-slot>
    </x-default-modal>
  </div>
</x-app-layout>
