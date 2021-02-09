@extends('layouts.layout')
@section('content')
<style>
[x-cloak] { display: none }

.toggle__dot {
  top: -.25rem;
  left: -.25rem;
  transition: all 0.3s ease-in-out;
}

input[type="checkbox"]:checked ~ .toggle__dot {
  transform: translateX(100%);
  background-color: #48bb78;
}
</style>

    <div class="projects pt-5" x-cloak x-data="{ open: false }">
        @livewire('project-search')




<!-- Dialog (full screen) -->
<div class="absolute top-0 left-0 flex items-center justify-center w-full" x-show="open" >

  <!-- A basic modal dialog with title, body and one button to close -->
  <div class="h-auto w-1/2 p-8 mt-8 text-left bg-white rounded shadow-xl border-2 border-gray-200" @click.away="open = false">
    <div class="mt-3 text-center">


    <form action="/projects_conf/{{$project_conf->id}}" method="post" enctype="multipart/form-data">@csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$project_conf->id}}">

        <label for="index_table_budget_column" class="flex items-center cursor-pointer">
            <div class="relative">
                @if($project_conf->index_table_budget_column == 'y')
                    <input id="index_table_budget_column" type="checkbox" name="index_table_budget_column" class="hidden" value="y" checked/>
                @elseif($project_conf->index_table_budget_column == 'n')
                    <input id="index_table_budget_column" type="checkbox" name="index_table_budget_column" class="hidden" value="y"/>
                @endif
                <div class="toggle__line w-10 h-4 bg-gray-200 rounded-full shadow-inner"></div>
                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
            </div>
            <div class="ml-3">
                Показывать колонку Бюджет
            </div>
        </label>

        <div class="mt-8"></div>

        <button type="submit" class="inline-flex justify-center mx-2 w-1/3 bg-red-500 hover:bg-red-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">
          Сохранить
        </button>
        <span @click="open = false" class="inline-flex justify-center mx-2 w-1/3 bg-white cursor-pointer focus:outline-none rounded-lg px-6 py-2 text-sm font-semibold shadow">
          Закрыть
        </span>
    </form>

  </div>



  </div>
</div>


    </div>
@endsection