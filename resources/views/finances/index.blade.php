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
            <!--<div class="w-full lg:w-1/4">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{ \Carbon\Carbon::now()->subMonth(1)->locale('ru')->isoFormat('MMMM') }}
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($finances_month_past, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="w-full lg:w-1/3">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{ \Carbon\Carbon::now()->locale('ru')->isoFormat('MMMM') }}
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($finances_month, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="w-full lg:w-1/4">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{ $past_year }} год
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($finances_year_past, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="w-full lg:w-1/3">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{ $current_year }} год
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($finances_year, 0, ',', ' ') }} ₽

                                @if($finances_year > $finances_year_past)
                                    <span class="text-green-500">+{{ number_format($finances_past_current_year_percent, 0, ',', ' ') }}%</span>
                                @elseif($finances_year < $finances_year_past)
                                    <span class="text-red-500">{{ number_format($finances_past_current_year_percent, 0, ',', ' ') }}%</span>
                                @else
                                    <span class="text-yellow-500">{{ number_format($finances_past_current_year_percent, 0, ',', ' ') }}%</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                Ожидается
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($project_finance_est, 0, ',', ' ') }} ₽
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
                            <span class="px-4 py-2 inline-flex text-sm leading-3 font-bold rounded-full bg-green-100 text-gray-700">+ {{ number_format($financeItem->amount, 0, ',', ' ') }} ₽</span>
                            @elseif($financeItem->fin_type == 'minus')
                            <span class="px-4 py-2 inline-flex text-sm leading-3 font-bold rounded-full bg-red-100 text-gray-700">- {{ number_format($financeItem->amount, 0, ',', ' ') }} ₽</span>
                            @endif
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