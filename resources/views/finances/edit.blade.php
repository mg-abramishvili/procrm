@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">
        <div class="flex flex-wrap items-center mb-6">
            <div class="flex w-1/2">
                <div class="block">
                    <h1 class="text-2xl font-semibold">Изменение записи</h1>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
            <form action="/finances/{{$finance->id}}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$finance->id}}">
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" name="title" value="{{ $finance->title }}">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Тип</label>
                            <select name="fin_type" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300">
                                <option value="plus" @if($finance->fin_type == "plus") selected @endif>приход</option>
                                <option value="minus" @if($finance->fin_type == "minus") selected @endif>расход</option>
                            </select>
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Дата</label>
                            <input type="date" class="block w-full text-md rounded-md p-1 border border-gray-300" name="date" value="{{ $finance->date }}">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Сумма</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" name="amount" value="{{ $finance->amount }}">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Проект</label>
                            <select class="block w-full text-md rounded-md p-1 border border-gray-300" name="projects">
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" @foreach($finance->projects as $t) @if($project->id == $t->id)selected="selected"@endif @endforeach>{{ $project->title }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection