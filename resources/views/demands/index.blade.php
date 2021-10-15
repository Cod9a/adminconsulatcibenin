<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demandes') }}
        </h2>
    </x-slot>

    <div class="sm:max-w-7xl sm:mx-auto sm:px-4 md:px-7 lg:px-8 mt-12" x-data="demandsIndex(`{{ route('api.demands.index') }}`)">
        <div class="flex flex-col">
            <div>
                <form class="flex flex-col sm:flex-row sm:items-center my-2 sm:space-x-2 sm:space-y-0 space-y-2">
                    <input x-model="q" type="search" name="q" placeholder="Rehercher par nom du document" class="py-1 border-gray-300 sm:max-w-xs sm:w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition ease-in-out duration-300 rounded-md" />
                    <div class="flex sm:flex-row-reverse flex-row space-x-3 sm:space-x-reverse">
                        <button @click.prevent="q = ''; search()" class="w-1/2 sm:w-auto bg-white py-2 px-3 rounded-md shadow text-sm uppercase text-gray-700 tracking-wide font-semibold">Reinitialiser</button>
                        <button @click.prevent="search()" class="w-1/2 sm:w-auto bg-gray-900 py-2 px-3 rounded-md shadow text-sm uppercase text-white tracking-wide font-semibold">Rechercher</button>
                    </div>
                </form>
            </div>
            <div class="-my-2 sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom du document demande
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900" x-text="demand.document.titre_doc"></div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <template x-if="demand.rejection === null">
                                                <div class="relative inline-block text-left" x-data="{shown: false}" @status-update="updateStatus($event.detail.demand, $event.detail.status)">
                                                    <button class="flex items-center bg-gray-100 px-2 py-1 rounded space-x-2 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-gray-400 focus:ring-offset-2 hover:bg-gray-300 focus:bg-gray-300" @click="shown = true;">
                                                        <span class=" inline-flex text-xs leading-5 font-semibold rounded-full text-gray-700" x-text="demand.status"></span>
                                                        <span><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                            </svg></span>
                                                    </button>
                                                    <div x-ref="popover" x-show="shown" @click.away="shown = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                                                        <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                            <div class="py-1" role="none">
                                                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                                <a @click="$dispatch('status-update', {'demand': demand, 'status': 'EN ATTENTE'}); shown = false" class="cursor-pointer hover:bg-gray-100 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">En Attente</a>
                                                                <a @click="$dispatch('status-update', {'demand': demand, 'status': 'DISPONIBLE'}); shown = false" class="cursor-pointer hover:bg-gray-100 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Disponible</a>
                                                                <a @click="$dispatch('status-update', {'demand': demand, 'status': 'RETIRE'}); shown = false" class="cursor-pointer hover:bg-gray-100 hover:text-gray-900 text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">Retirer</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                            <template x-if="demand.rejection !== null">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Rejeté
                                                </span>
                                            </template>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" x-text="demand.formatted_date"></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a @click.prevent="setSelectedDemand(demand)" class="text-blue-600 hover:text-blue-900 inline-flex space-x-1 font-medium disabled:opacity-50 cursor-pointer">Details</a>
                                        </td>
                                    </tr>
                                </template>
                                <template x-if="demands.length === 0">
                                    <tr>
                                        <td colspan="5">
                                            <div class="flex flex-col items-center justify-center py-12 space-y-8">
                                                <div class="rounded-full bg-gray-100">
                                                    <img src="{{ asset('assets/images/empty.svg') }}" alt="" class="w-80">
                                                </div>
                                                <span class="text-gray-500">Pas de donnees pour l'instant</span>
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
            <button @click.prevent="fetchPrev()" :disabled="prev_link === null" class="shadow inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest focus:outline-none focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Prev</button>
            <button @click.prevent="fetchNext()" :disabled="next_link === null" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Next</button>
        </div>
        <x-default-modal x-show="selectedDemand !== null" x-cloak>
            <x-slot name="content">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="`Detail de la demande du client '${selectedDemand !== null ? selectedDemand.user.nom : ''} ${selectedDemand !== null ? selectedDemand.user.prenom : ''}'`"></h3>
                            <div class="mt-8 grid gap-5">
                                <template x-for="enclosed in selectedDemand.encloseds">
                                    <a :href="enclosed.download_url" class="bg-gray-200 px-2 py-2 text-gray-700 rounded inline-flex items-center space-x-4">
                                        <span>
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </span>
                                        <span x-text="enclosed.name"></span>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <template x-if="!selectedDemand.rejection">
                        <button @click="rejectSelectedDemand()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Rejeter la demande
                        </button>
                    </template>
                    <button @click.prevent="cancelOutSelectedDemand()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Fermer
                    </button>
                </div>
            </x-slot>
        </x-default-modal>
        <x-default-modal x-show="rejectionModal" x-cloak>
            <x-slot name="content">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div>
                        <div class="mt-3 text-center sm:mt-0 sm:m-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Formulaire de rejet</h3>
                            <div class="mt-8 grid gap-1">
                                <label for="justificatif" class="text-sm font-medium text-gray-600">Justificatif du rejet</label>
                                <textarea x-model="justificationText" name="" id="" cols="30" rows="5" class="w-full rounded focus:border-blue-500 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-blue-500 transition ease-in-out duration-300"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="onRejectionConfirmed()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Rejeter la demande
                    </button>
                    <button @click="onRejectionCancelled()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Fermer
                    </button>
                </div>
            </x-slot>
        </x-default-modal>
    </div>
</x-app-layout>
