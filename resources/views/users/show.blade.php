@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">
        
      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">Профиль</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <a href="/users/{{ $user->id }}/edit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Изменить</a>
        </div>
      </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Никнейм</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ $user->name }}" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ $user->email }}" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Имя</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" value="{{ $user->fio }}" disabled>
            </div>
        </div>

    </div>
    @endsection