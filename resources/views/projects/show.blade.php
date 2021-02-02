@extends('layouts.layout')
@section('content')
<style>
[x-cloak] { display: none }
</style>

    <div class="px-8 mt-5" x-cloak x-data="{ open: false }">
        
      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-bold mb-4 abr-text-darkblue">{{ $project->title }}</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <a href="/project/{{ $project->id }}/edit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Изменить</a>
          <a href="#" @click="open = true" class="bg-red-500 hover:bg-red-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow ml-2">Удалить</a>
        </div>
      </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-4 space-y-2 lg:space-y-0 mb-8">
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                  <label class="block text-sm font-medium mb-2 abr-text-pale">Дата создания проекта</label>
                  <div class="block w-full text-lg text-semibold">{{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y')}}</div>
                </div>
            </div>
            <div class="w-full lg:w-1/3">
              <div class="bg-white rounded-md abr-box-shadow p-5">
                <label class="block text-sm font-medium abr-text-pale mb-2">Заказчик</label>
                @foreach($project->clients as $client)
                <div class="block w-full text-lg text-semibold">{{ $client->name }}</div>
                @endforeach
              </div>
            </div>
            <div class="w-full lg:w-1/3">
              <div class="bg-white rounded-md abr-box-shadow p-5">
                <label class="block text-sm font-medium abr-text-pale mb-2">Статус</label>
                @if($project->status == 'active')
                <div class="block w-full text-lg text-semibold">в работе</div>
                @elseif($project->status == 'archive')
                <div class="block w-full text-lg text-semibold">завершен</div>
                @else
                <div class="block w-full text-lg text-semibold">{{ $project->status }}</div>
                @endif
              </div>
            </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-8">
            <div class="w-full">
              <div class="bg-white rounded-md abr-box-shadow p-5">
                <label class="block text-sm font-medium abr-text-pale mb-2">О проекте</label>
                <div class="block w-full text-md text-semibold">{{ $project->comment }}</div>
              </div>
            </div>
        </div>

        <h3 class="text-xl font-bold mb-4 abr-text-darkblue">Финансы</h3>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-4 space-y-2 lg:space-y-0 mb-8">
            <div class="w-full lg:w-1/3">
              <div class="bg-white rounded-md abr-box-shadow p-5">
                <h2 class="block text-sm font-medium abr-text-pale mb-2">Бюджет</h2>
                <span class="block w-full text-5xl font-medium abr-text-blue">{{ number_format($project->budget, 0, ',', ' ') }} ₽</span>
                
                <!--<span>{{ $project_finance_est }}</span>-->

              </div>
            </div>
            <div class="w-full lg:w-1/3">
              <div class="bg-white rounded-md abr-box-shadow p-5">
                <h2 class="block text-sm font-medium abr-text-pale mb-2">Поступления</h2>
                  <ul>
                  @foreach($project->finances as $finance)
                    @if($finance->fin_type == 'plus')
                      <li class="block text-md font-bold text-green-700 mb-2">+ {{ number_format($finance->amount, 0, ',', ' ') }} ₽ <small class="block text-sm font-normal text-gray-500">{{ $finance->title }} ({{ \Carbon\Carbon::parse($finance->date)->locale('ru')->isoFormat('D MMMM YYYY')}})</small></li>
                    @endif
                  @endforeach
                  </ul>
                </div>
            </div>
            <div class="w-full lg:w-1/3">
              <div class="bg-white rounded-md abr-box-shadow p-5">
                <h2 class="block text-sm font-medium abr-text-pale mb-2">Расходы</h2>
                  <ul>
                  @foreach($project->finances as $finance)
                    @if($finance->fin_type == 'minus')
                      <li class="block text-md font-bold text-red-700 mb-2">- {{ number_format($finance->amount, 0, ',', ' ') }} ₽ <small class="block text-sm font-normal text-gray-500">{{ $finance->title }} ({{ \Carbon\Carbon::parse($finance->date)->locale('ru')->isoFormat('D MMMM YYYY')}})</small></li>
                    @endif
                  @endforeach
                  </ul>
                </div>
            </div>
        </div>

        <h3 class="text-xl font-bold mb-4 abr-text-darkblue">Документы</h3>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            @foreach($project->documents as $document)
            <div class="w-full lg:w-1/3">
                @if (pathinfo($document->file, PATHINFO_EXTENSION) == 'jpg')
                  <img src="/uploads/{{ $document->file }}" style="width:150px;"/>
                @else
                  <a href="/uploads/{{ $document->file }}" class="underline text-blue-700">{{ $document->title }}</a>
                @endif
            </div>
            @endforeach
        </div>

        

<!-- Dialog (full screen) -->
<div class="absolute top-0 left-0 flex items-center justify-center w-full" x-show="open" >

  <!-- A basic modal dialog with title, body and one button to close -->
  <div class="h-auto w-1/2 p-8 mt-8 text-left bg-white rounded shadow-xl border-2 border-gray-200" @click.away="open = false">
    <div class="mt-3 text-center">

      <div class="mt-2">
        <p class="text-base leading-5 text-gray-500 mb-3">
          Вы уверены, что хотите удалить проект <strong>{{ $project->title }}</strong>?
        </p>
        <p class="text-base leading-5 text-gray-500">
          Вместе с проектом будут удалены его документы, финансы и задачи.
        </p>
    </div>
  </div>

    <!-- One big close button.  --->
    <div class="mt-5 flex items-center justify-center">
        <a href="/project/{{ $project->id }}/delete" class="inline-flex justify-center mx-2 w-1/3 bg-red-500 hover:bg-red-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">
          Удалить проект
        </a>
        <button @click="open = false" class="inline-flex justify-center mx-2 w-1/3 bg-white focus:outline-none rounded-lg px-6 py-2 text-sm font-semibold shadow">
          Отменить
        </button>
    </div>

  </div>
</div>




    </div>







    @endsection