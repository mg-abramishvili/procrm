@extends('layouts.layout')
@section('content')
    <div class="projects pt-5">

      <div class="flex flex-wrap items-center mb-6 px-8">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Проекты</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <a href="/projects/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить проект</a>
        </div>
      </div>

              <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-12 px-8">
            <div class="w-full lg:w-1/2">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                Активные проекты
                            </div>
                            <div class="text-xl font-bold">
                                {{ $projects_active->count() }}
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
                                Всего проектов
                            </div>
                            <div class="text-xl font-bold">
                                {{ $projects->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class="overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Название проекта
              </th>
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Заказчик
              </th>
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Статус
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($projects as $project)
            <tr>
              <td class="px-8 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      <a href="/projects/{{ $project->id }}">
                      {{ $project->title }}
                      </a>
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-8 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $project->client }}</div>
              </td>
              <td class="px-8 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-700">
                {{ $project->status }}
                </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        
    </div>
@endsection