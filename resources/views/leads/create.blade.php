@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">
        <h3 class="text-center">Новая заявка</h3>
        <div class="row">
            <div class="col-md-6">
                <form action="/leads" method="post" enctype="multipart/form-data">@csrf
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" name="title">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Текст</label>
                            <textarea rows="5" class="block w-full text-md rounded-md p-1 border border-gray-300" name="text"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection