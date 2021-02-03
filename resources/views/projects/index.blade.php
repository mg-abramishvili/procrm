@extends('layouts.layout')
@section('content')
<style>
[x-cloak] { display: none }
</style>

    <div class="projects pt-5" x-cloak x-data="{ open: false }">
        @livewire('project-search')




<!-- Dialog (full screen) -->
<div class="absolute top-0 left-0 flex items-center justify-center w-full" x-show="open" >

  <!-- A basic modal dialog with title, body and one button to close -->
  <div class="h-auto w-1/2 p-8 mt-8 text-left bg-white rounded shadow-xl border-2 border-gray-200" @click.away="open = false">
    <div class="mt-3 text-center">


    @isset($project_conf->index_table_budget_column)
    <form action="/projects_conf/{{$project_conf->id}}" method="post" enctype="multipart/form-data">@csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$project_conf->id}}">

        <label>Показывать колонку Бюджет</label>
        <select name="index_table_budget_column" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200 mb-4">
            <option value="y" @if($project_conf->index_table_budget_column == 'y') selected @endif>Вкл</option>
            <option value="n" @if($project_conf->index_table_budget_column == 'n') selected @endif>Выкл</option>
        </select>

        <button type="submit" class="inline-flex justify-center mx-2 w-1/3 bg-red-500 hover:bg-red-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">
          Сохранить
        </button>
        <span @click="open = false" class="inline-flex justify-center mx-2 w-1/3 bg-white focus:outline-none rounded-lg px-6 py-2 text-sm font-semibold shadow">
          Закрыть
        </span>
    </form>
    @else
    <form action="/projects_conf" method="post" enctype="multipart/form-data">@csrf

        <label>Показывать колонку Бюджет</label>
        <select name="index_table_budget_column" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200 mb-4">
            <option value="y">Вкл</option>
            <option value="n" selected>Выкл</option>
        </select>

        <div class="mt-5 flex items-center justify-center">
        <button type="submit" class="inline-flex justify-center mx-2 w-1/3 bg-red-500 hover:bg-red-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">
          Сохранить
        </button>
        <span @click="open = false" class="inline-flex justify-center mx-2 w-1/3 bg-white focus:outline-none rounded-lg px-6 py-2 text-sm font-semibold shadow">
          Закрыть
        </span>
    </div>

        </form>
    @endisset

  </div>



  </div>
</div>


    </div>
@endsection