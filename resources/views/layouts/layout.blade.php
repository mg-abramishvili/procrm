<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>mCRM</title>
    
    @livewireStyles
    <link href="/css/app.css" type="text/css" rel="stylesheet"/>
    
</head>
<body>


<div class="flex flex-wrap">

        <!--<div class="w-1/2 md:w-1/3 lg:w-56 fixed md:top-0 md:left-0 h-screen lg:block bg-white shadow-xl z-30 hidden">
            <div class="w-full h-20 border-b flex px-6 items-center mb-8"><p class="font-extrabold text-2xl abr-text-blue">mCRM</p></div>
            <nav class="mb-4 px-6">
                <a href="/projects" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/stack.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Проекты</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/clipboard-check.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Задачи</span>
                </a>

                <a href="/finances" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/currency-dollar.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Финансы</span>
                </a>

                <a href="/documents" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/file-text.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Документы</span>
                </a>

                <a href="/clients" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/users.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Заказчики</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/pennant.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Заявки</span>
                </a>
                <hr class="mt-3 mb-3">
                <a href="/users/{{ \Auth::user()->id }}/edit" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/user.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">{{ \Auth::user()->fio }}</span>
                </a>
            </nav>
            
        </div>-->


  <div @click.away="open = false" class="flex flex-col w-full lg:w-56 fixed lg:h-screen text-gray-700 bg-white shadow-xl z-30 flex-shrink-0" x-data="{ open: false }">
    <div class="flex-shrink-0 flex flex-row items-center justify-between">
    <div class="w-full h-20 lg:border-b flex px-6 items-center lg:mb-8"><p class="font-extrabold text-2xl abr-text-blue">mCRM</p></div>
      <button class="rounded-lg mr-6 md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-6 pb-4 md:pb-0 md:overflow-y-auto">
    <a href="/projects" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/stack.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Проекты</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/clipboard-check.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Задачи</span>
                </a>

                <a href="/finances" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/currency-dollar.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Финансы</span>
                </a>

                <a href="/documents" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/file-text.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Документы</span>
                </a>

                <a href="/clients" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/users.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Заказчики</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/pennant.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">Заявки</span>
                </a>
                <hr class="mt-3 mb-3">
                <a href="/users/{{ \Auth::user()->id }}/edit" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/user.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-medium abr-text-menu">{{ \Auth::user()->fio }}</span>
                </a>
      <div @click.away="open = false" class="relative" x-data="{ open: false }">
      </div>
    </nav>
  </div>


        <div class="flex flex-col w-full abr-bg pl-0 lg:pl-56 min-h-screen shadow-lg">
            <div class="mb-20">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts

    <script src="/js/app.js" type="text/javascript"></script>
    
</body>
</html>