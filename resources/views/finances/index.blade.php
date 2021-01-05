@extends('layouts.layout')
@section('content')
    <div class="finances pt-5">
        <div class="flex flex-wrap items-center mb-6 px-8">
            <div class="flex w-1/2">
                <div class="block">
                    <h1 class="text-2xl font-semibold">Финансы</h1>
                </div>
            </div>
            <div class="flex w-1/2 justify-end">
                <a href="/finances/create" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded px-6 py-2 text-white text-sm font-semibold shadow">Добавить поступление</a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-12 px-8">
            <div class="w-full lg:w-1/2">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('MMMM') }}
                            </div>
                            <div class="text-xl font-bold">
                                {{ $finances_month }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{ $current_year }} год
                            </div>
                            <div class="text-xl font-bold">
                                {{ $finances_year }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-blue-100"></div>
        <div>
            @foreach ($finances as $month => $finance)
            <h3 class="px-8 py-3 bg-blue-50 w-full text-sm font-medium text-gray-500 uppercase">{{ \Carbon\Carbon::parse($month)->locale('ru')->isoFormat('MMMM')}}</h3>
            <div class="overflow-hidden">
                <table class="min-w-full border-t border-blue-100">
                    <tbody class="bg-white">

                        @foreach($finance as $financeItem)
                        <tr class="border-b border-blue-100">
                        <td class="px-8 py-4 whitespace-nowrap w-1/2">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $financeItem->title }} →
                                        @foreach($financeItem->projects as $project)<span>{{ $project->title }}</span>@endforeach
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right w-1/5">
                            <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($financeItem->date)->locale('ru')->isoFormat('D MMMM YYYY')}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-right text-gray-800 w-1/5">
                            @if($financeItem->fin_type == 'plus')
                            <span class="px-4 py-2 inline-flex text-sm leading-3 font-bold rounded-full bg-green-100 text-gray-700">+ {{ $financeItem->amount }} ₽</span>
                            @elseif($financeItem->fin_type == 'minus')
                            <span class="px-4 py-2 inline-flex text-sm leading-3 font-bold rounded-full bg-red-100 text-gray-700">- {{ $financeItem->amount }} ₽</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium w-1/4">
                            <div class="inline-flex action-buttons">
                                <a href="/finances/{{ $financeItem->id }}/edit" class="flex-1 w-5 text-indigo-600 hover:text-indigo-900">
                                <img src="/img/edit.svg" class="opacity-30"/>
                                </a>
                                <button class="flex-1 w-5 ml-1 text-indigo-600 hover:text-indigo-900" @click="deleteFinance(finance.id)">
                                <img src="/img/trash.svg" class="opacity-30"/>
                                </button>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>

    </div>
@endsection