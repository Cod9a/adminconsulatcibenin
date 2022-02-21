<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tableau de bord') }}
    </h2>
  </x-slot>

  <div class="sm:max-w-7xl sm:mx-auto sm:px-4 md:px-7 lg:px-8 mt-12 divide-y">
    <!-- <a href="#" class="
      bg-gray-500 text-white
      p-3
      rounded
      focus:outline-none
      focus:ring
      focus:ring-opacity-50
      focus:ring-gray-400
      focus:ring-offset-2
      hover:bg-gray-300
      focus:bg-gray-300">Importer les données en un fichier Excel</a> -->
      <div x-data="{ tab: 'today' }" class="period">
        <nav class="flex">
          <a class="p-4 border space-x-2" :class="{ 'active': tab === 'today' }" x-on:click.prevent="tab = 'today'" href="#">Aujourd'hui</a>
          <a class="p-4 border space-x-2" :class="{ 'active': tab === 'week' }" x-on:click.prevent="tab = 'week'" href="#">Semaine</a>
          <a class="p-4 border space-x-2" :class="{ 'active': tab === 'month' }" x-on:click.prevent="tab = 'month'" href="#">Mois</a>
          <a class="p-4 border space-x-2" :class="{ 'active': tab === 'year' }" x-on:click.prevent="tab = 'year'" href="#">Année</a>
          <!-- <form class="p-4 space-x-2 ml-4">
            <span>Période</span>
            <input type="date" name="">
            <input type="date" name="">
            <input type="submit" name="">
          </form> -->
        </nav>
        <div x-show="tab === 'today'">
          <div
            class="
              grid grid-cols-2
              my-6
              rounded-none
              sm:rounded-md
              overflow-hidden
              shadow
            ">
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-id-card text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demandes de carte</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nDemandsToday }}</span
                >
              </div>
              <a href="{{ route('demands') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nDemandsToday }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="far fa-calendar-check text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de rendez-vous</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nMeetingsToday }}</span
                >
              </div>
              <a href="{{ route('meetings') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nMeetingsToday }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <!-- <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-wallet text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de paiements</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nPaymentsToday }}</span
                >
              </div>
            </div> -->
          
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-cart-plus text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demande de livraison</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >0</span
                >
              </div>
            </div>
          </div>
          <a href="{{ route('excel.export', 'today') }}" class="p-3 bg-gray-800 text-white" x-cloak x-show="{{ $nDemandsToday }}"><i class="far fa-file-excel"></i> Exporter fichier Excel de demandes de carte</a>
        </div>
        <div x-show="tab === 'week'" x-cloak>
          <div
            class="
              grid grid-cols-2
              my-6
              rounded-none
              sm:rounded-md
              overflow-hidden
              shadow
            ">
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-id-card text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demandes de carte</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nDemandsWeek }}</span
                >
              </div>
              <a href="{{ route('demands') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nDemandsWeek }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="far fa-calendar-check text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de rendez-vous</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nMeetingsWeek }}</span
                >
              </div>
              <a href="{{ route('meetings') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nMeetingsWeek }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <!-- <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-wallet text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de paiements</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nPaymentsWeek }}</span
                >
              </div>
            </div> -->
          
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-cart-plus text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demande de livraison</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >0</span
                >
              </div>
            </div>
          </div>
          <a href="{{ route('excel.export', 'week') }}" class="p-3 bg-gray-800 text-white" x-cloak x-show="{{ $nDemandsWeek }}"><i class="far fa-file-excel"></i> Exporter fichier Excel de demandes de carte</a>
        </div>
        <div x-show="tab === 'month'" x-cloak>
          <div
            class="
              grid grid-cols-2
              my-6
              rounded-none
              sm:rounded-md
              overflow-hidden
              shadow
            ">
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-id-card text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demandes de carte</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nDemandsMonth }}</span
                >
              </div>
              <a href="{{ route('demands') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nDemandsMonth }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="far fa-calendar-check text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de rendez-vous</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nMeetingsMonth }}</span
                >
              </div>
              <a href="{{ route('meetings') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nMeetingsMonth }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <!-- <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-wallet text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de paiements</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nPaymentsMonth }}</span
                >
              </div>
            </div> -->
          
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-cart-plus text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demande de livraison</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >0</span
                >
              </div>
            </div>
          </div>
          <a href="{{ route('excel.export', 'month') }}" class="p-3 bg-gray-800 text-white" x-cloak x-show="{{ $nDemandsMonth }}"><i class="far fa-file-excel"></i> Exporter fichier Excel de demandes de carte</a>
        </div>
        <div x-show="tab === 'year'" x-cloak>
          <div
            class="
              grid grid-cols-2
              my-6
              rounded-none
              sm:rounded-md
              overflow-hidden
              shadow
            ">
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-id-card text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demandes de carte</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nDemandsYear }}</span
                >
              </div>
              <a href="{{ route('demands') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nDemandsYear }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="far fa-calendar-check text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de rendez-vous</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nMeetingsYear }}</span
                >
              </div>
              <a href="{{ route('meetings') }}" class="text-xs rounded-md text-white p-2 bg-gray-800" x-show="{{ $nMeetingsYear }}" x-cloak>Consulter <i class="fas fa-chevron-right"></i></a>
            </div>
            <!-- <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-wallet text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de paiements</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >{{ $nPaymentsYear }}</span
                >
              </div>
            </div> -->
          
            <div class="flex items-center space-x-4 bg-white p-4 border-l">
              <span class="p-3 rounded-md bg-blue-500 hidden sm:inline-block">
                <i class="fas fa-cart-plus text-white"></i>
              </span>
              <div class="flex flex-col">
                <span class="font-medium text-gray-700 truncate"
                  >Nombre de demande de livraison</span
                >
                <span class="text-gray-900 text-2xl sm:text-3xl font-bold"
                  >0</span
                >
              </div>
            </div>
          </div>
          <a href="{{ route('excel.export', 'year') }}" class="p-3 bg-gray-800 text-white" x-cloak x-show="{{ $nDemandsYear }}"><i class="far fa-file-excel"></i> Exporter fichier Excel de demandes de carte</a>
        </div>
      </div>
  </div>
</x-app-layout>
