@extends('layouts.layout')
@section('content')
    <div class="px-8 mt-5">

    <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">Новый заказчик</h1>
          </div>
        </div>
      </div>
      <form action="/clients" method="post" enctype="multipart/form-data">@csrf
              <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Заказчик</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" name="name">
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </form>

    </div>
@endsection