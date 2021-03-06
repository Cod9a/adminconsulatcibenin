<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta
      content="Administration de la gestion des documents du Consulat Honoraire du Bénin en Côte d'Ivoire"
      name="description" />
    <meta property="og:image" content="{{ asset('assets/images/p.jpg') }}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="861" />
    <meta property="og:image:height" content="622" />
    <meta name="propeller" content="d9ad28c7269cb797267dc2acc59ee8e6" />
    <meta name="msapplication-TileColor" content="#eaeaea" />
    <meta name="theme-color" content="#eaeaea" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />

    <!-- Fonts -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body class="font-sans antialiased">
    @include('layouts.navigation')
    <div class="min-h-screen bg-gray-50 flex-auto">
      <header class="bg-white border-b">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>

      <!-- Page Content -->
      <main>{{ $slot }}</main>
    </div>
    <div
      class="bg-blue-600 fixed inset-x-0 bottom-0"
      x-data="{show: false, timeout: null, message: ''}"
      @notify.window="clearTimeout(timeout); message = $event.detail.message; show = true; timeout = setTimeout(() => show = false, 2000)"
      x-show.transition.out.opacity.duration.1500ms="show"
      x-transion:leave.opacity.duration.1500ms
      x-cloak>
      <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
          <div class="w-0 flex-1 flex items-center">
            <span class="flex p-2 rounded-lg">
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
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </span>
            <p class="ml-3 font-medium text-white truncate">
              <span class="md:inline" x-text="message"></span>
            </p>
          </div>
          <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button
              type="button"
              class="
                -mr-1
                flex
                p-2
                rounded-md
                hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-white
                sm:-mr-2
              "
              @click="show = false">
              <span class="sr-only">Dismiss</span>
              <!-- Heroicon name: outline/x -->
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
    <script type="text/javascript">
      function toggle(){  
          var main = document.querySelector('.mainCheckbox');  
          var ele = document.getElementsByName('sel');  
          for(var i = 0; i < ele.length; i++){  
              if(ele[i].type == 'checkbox') {
                if(main.checked)
                  ele[i].checked = true; 
                else
                  ele[i].checked = false;  
              }
          }  
      }  
    </script>
  </body>
</html>
