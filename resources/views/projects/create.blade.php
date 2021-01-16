@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">

    <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">Новый проект</h1>
          </div>
        </div>
      </div>
      <form action="/project/created" method="post" enctype="multipart/form-data">@csrf
              <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Название</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" name="title">
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Заказчик</label>
                <select name="clients" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Статус</label>
                <select class="block w-full text-md rounded-md py-2 px-2 border border-gray-300" name="status">
                            <option value="active">в работе</option>
                            <option value="archive">завершен</option>
                        </select>
            </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700 mb-2">О проекте</label>
                <textarea class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" name="comment"></textarea>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4">Финансы проекта</h2>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Бюджет</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300" name="budget">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить</button>
      </form>

    </div>
@endsection