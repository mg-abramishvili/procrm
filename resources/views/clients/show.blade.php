@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">
        
      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">{{ $project->title }}</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <a href="/projects/{{ $project->id }}/edit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Изменить</a>
        </div>
      </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Дата создания проекта</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y')}}" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Заказчик</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ $project->client }}" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Статус</label>
                @if($project->status == 'active')
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="в работе" disabled>
                @elseif($project->status == 'archive')
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="завершен" disabled>
                @else
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ $project->status }}" disabled>
                @endif
            </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700 mb-2">О проекте</label>
                <textarea class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" disabled>{{ $project->comment }}</textarea>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
              <h2 class="text-xl font-semibold mb-4">Бюджет</h2>
                <span class="block w-full text-5xl font-semibold text-blue-600">{{ $project->budget }} ₽</span>
            </div>
            <div class="w-full lg:w-1/3">
              <h2 class="text-xl font-semibold mb-4">Поступления</h2>
                <ul>
                @foreach($project->finances as $finance)
                <li class="block text-md font-bold text-green-700 mb-2">{{ $finance->amount }} ₽ <small class="block text-sm font-normal text-gray-500">{{ $finance->title }} ({{ $finance->date }})</small></li>
                @endforeach
                </ul>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4">Документы и файлы</h2>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            @foreach($project->documents as $document)
            <div class="w-full lg:w-1/3">
                
                  <a href="{{ $document->file }}" class="underline text-blue-700">{{ $document->title }}</a>
                
            </div>
            @endforeach
        </div>

    </div>
    @endsection