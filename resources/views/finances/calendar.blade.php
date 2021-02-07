@extends('layouts.layout')
@section('content')
    <div class="finances px-8 mt-5">

        <div class="flex flex-wrap items-center mb-6">
            <div class="flex w-1/2">
                <div class="block">
                    <h1 class="text-3xl font-bold mb-2 abr-text-darkblue">Календарь финансов</h1>
                    
                    <label class="block">
                        <select onchange="location = this.value;" name="year_select" class="block w-full bg-transparent border-gray-300 rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="/finances-calendar/2021" @if($year == '2021') selected @endif>2021</option>
                            <option value="/finances-calendar/2020" @if($year == '2020') selected @endif>2020</option>
                        </select>
                    </label>

                </div>
            </div>
            <div class="flex w-1/2 justify-end">
                <div class="block w-full text-5xl font-medium abr-text-blue text-right">
                    {{ number_format($year_total, 0, ',', ' ') }} ₽
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-6 space-y-2 lg:space-y-0 mb-3">
            
            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Январь
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($jan, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Февраль
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($feb, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Март
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($mar, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Апрель
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($apr, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-6 space-y-2 lg:space-y-0 mb-3">

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Май
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($may, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Июнь
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($jun, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Июль
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($jul, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Август
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($aug, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-6 space-y-2 lg:space-y-0 mb-3">

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Сентябрь
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($sep, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Октябрь
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($oct, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Ноябрь
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($nov, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/4 mb-3">
                <div class="bg-white rounded-md abr-box-shadow p-5">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-gray-500">
                                Декабрь
                            </div>
                            <div class="text-xl font-bold">
                                {{ number_format($dec, 0, ',', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


    </div>
@endsection