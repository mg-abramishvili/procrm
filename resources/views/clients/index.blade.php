@extends('layouts.layout')
@section('content')
    <div class="clients pt-5">

      <div class="flex flex-wrap items-center mb-6 px-8">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Заказчики</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <a href="/clients/create" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить</a>
        </div>
      </div>

      <div class="overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Заказчик
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($clients as $client)
            <tr>
              <td class="px-8 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      <a href="/clients/{{ $client->id }}">
                      {{ $client->name }}
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        
    </div>
@endsection