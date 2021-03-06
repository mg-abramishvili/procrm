@extends('layouts.layout')
@section('content')
    <div class="leads pt-5">
        <div class="flex flex-wrap items-center mb-6 px-8">
            <div class="flex w-1/2">
                <div class="block">
                    <h1 class="text-2xl font-semibold">Заявки</h1>
                </div>
            </div>
            <div class="flex w-1/2 justify-end">
                <a href="/leads/create" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded px-6 py-2 text-white text-sm font-semibold shadow">Добавить заявку</a>
            </div>
        </div>

        <div class="px-8">
            @foreach($leads as $lead)
                <div class="px-4 py-3 mb-4 bg-white border border-grey-100">
                    <h5 class="font-semibold">{{ $lead->title }}</h5>
                    <p>{{ $lead->text }}</p>
                    <button class="flex-1 w-5 ml-1 text-indigo-600 hover:text-indigo-900">
                        <img src="/img/trash.svg" class="opacity-30"/>
                    </button>
                </div>
            @endforeach
        </div>

    </div>
@endsection