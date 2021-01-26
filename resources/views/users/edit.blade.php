@extends('layouts.layout')
@section('content')
<div class="px-8 mt-5">

    <h2 class="text-3xl font-semibold mb-4">Профиль</h2>
    <form action="/users/{{$user->id}}" method="post" enctype="multipart/form-data">@csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$user->id}}">

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Имя</label>
                <input name="fio" type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300" value="{{ $user->fio }}">
                @if ($errors->has('fio'))
                    <div>
                        Укажите название
                    </div>
                @endif
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                <input name="email" type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300" value="{{ $user->email }}">
                @if ($errors->has('email'))
                    <div>
                        Укажите e-mail
                    </div>
                @endif
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Изменить пароль</label>
                <input name="password" type="password" class="block w-full text-md rounded-md py-2 px-2 border border-gray-300" placeholder="Новый пароль">
            </div>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Сохранить</button>
    </form>

    <hr class="mt-10 mb-10">

    <h2 class="text-3xl font-semibold mb-4">Раздел Проекты</h2>
    @isset($project_conf->index_table_budget_column)
    <form action="/projects_conf/{{$project_conf->id}}" method="post" enctype="multipart/form-data">@csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$project_conf->id}}">

        <select name="index_table_budget_column" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200">
            <option value="y" @if($project_conf->index_table_budget_column == 'y') selected @endif>Вкл</option>
            <option value="n" @if($project_conf->index_table_budget_column == 'n') selected @endif>Выкл</option>
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Сохранить</button>
    </form>
    @else
    <form action="/projects_conf" method="post" enctype="multipart/form-data">@csrf

        <select name="index_table_budget_column" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200">
            <option value="y">Вкл</option>
            <option value="n" selected>Выкл</option>
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Сохранить</button>
    </form>
    @endisset
</div>

@endsection