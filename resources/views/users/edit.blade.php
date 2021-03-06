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





</div>

@endsection