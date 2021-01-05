@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">
    <form action="/projects/{{$project->id}}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$project->id}}">
<div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <input type="text" name="title" value="{{ $project->title }}" class="text-3xl font-semibold mb-4 rounded-md border border-gray-300">
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Сохранить</button>
        </div>
      </div>


                
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Дата создания проекта</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ $project->created_at }}" disabled>
            </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Заказчик</label>
                            <select name="clients" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}" @foreach($project->clients as $t) @if($client->id == $t->id)selected="selected"@endif @endforeach>{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Статус</label>
                            <select name="status" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300">
                                <option value="active" @if($project->status == "active") selected @endif>в работе</option>
                                <option value="archive" @if($project->status == "archive") selected @endif>завершен</option>
                            </select>
                        </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700 mb-2">О проекте</label>
                <textarea name="comment" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200">{{ $project->comment }}</textarea>
            </div>
        </div>

<h2 class="text-xl font-semibold mb-4">Финансы проекта</h2>

                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Бюджет</label>
                            <input name="budget" type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300" value="{{ $project->budget }}">
                        </div>
                    </div>
                    
                </form>
            </div>

@endsection