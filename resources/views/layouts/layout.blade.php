<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>mCRM</title>
    <link href="/css/app.css" type="text/css" rel="stylesheet"/>
</head>
<body>


<div class="flex flex-wrap">
        <div class="w-1/2 md:w-1/3 lg:w-56 fixed md:top-0 md:left-0 h-screen lg:block bg-gray-100 border-r z-30 hidden">
            <div class="w-full h-20 border-b flex px-6 items-center mb-8"><p class="font-semibold text-2xl text-blue-400">Mishiko CRM</p></div>
            <nav class="mb-4 px-6">
                <a href="/projects" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/stack.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">Проекты</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/clipboard-check.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">Задачи</span>
                </a>

                <a href="/finances" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/currency-dollar.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">Финансы</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/file-text.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">Документы</span>
                </a>

                <a href="/clients" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/users.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">Заказчики</span>
                </a>

                <a href="#" class="opacity-50 w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/pennant.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">Заявки</span>
                </a>
                <hr class="mt-3 mb-3">
                <a href="/users/{{ \Auth::user()->id }}" class="w-full inline-flex items-center text-blue-400 h-10 hover:bg-gray-200 rounded-lg cursor-pointer mb-2">
                    <img src="/img/user.svg" class="w-6 opacity-60 mr-2" />
                    <span class="flex-1 font-semibold text-gray-600">{{ \Auth::user()->fio }}</span>
                </a>
            </nav>
            
        </div>

        <div class="w-full bg-white pl-0 lg:pl-56 min-h-screen shadow-lg">
            <div class="bg-white mb-20">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="/js/app.js" type="text/javascript"></script>

</body>
</html>