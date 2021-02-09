<div class="px-6">

<div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/3">
            <div class="flex flex-wrap items-center">
                <h1 class="text-3xl font-bold abr-text-darkblue inline-flex">Проекты</h1>

                <label class="inline-flex ml-4">
                <select wire:model.lazy="status" class="rounded-lg w-full border-none shadow text-sm px-2 pr-6 py-2">
                <option value="">Все</option>
                <option value="active">В работе</option>
                <option value="archive">Выполненные</option>
                </select>
                </label>
            </div>
        </div>

        <div class="flex w-1/3">
        <input wire:model.lazy="search" type="text" class="rounded-lg w-full border-none shadow text-sm px-6 py-2" placeholder="Найти проект ..."/>
        </div>

        <div class="flex w-1/3 justify-end">
            <a href="#" @click="open = true" class="bg-white focus:outline-none rounded-lg px-6 py-2 text-sm font-semibold shadow mr-2">*</a>
            <a href="/project/create" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить проект</a>
        </div>
    </div>

    <div wire:loading class="mb-4">
    <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="#3b82f6" stroke-width="4"></circle>
          <path class="opacity-75" fill="#3b82f6" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

<div class="overflow-hidden border border-gray-200 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
            <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
              <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Название проекта
              </th>
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Заказчик
              </th>
              @isset($project_conf->index_table_budget_column)
              @if($project_conf->index_table_budget_column == 'y')
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 text-right uppercase tracking-wider">
                Бюджет
              </th>
              @endif
              @endisset
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 text-center uppercase tracking-wider">
                Договор
              </th>
              <th scope="col" class="px-8 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 text-center uppercase tracking-wider">
                Акт
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($projects as $project)
            <tr>
            <td class="w-2 pl-8 py-4 whitespace-nowrap">
            @if($project->status == 'active')
                <span class="w-4 h-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-200 text-yellow-700">
                </span>
                @elseif($project->status == 'archive')
                <span class="w-4 h-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                </span>
                @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                  {{ $project->status }}
                </span>
                @endif
            </td>
              <td class="px-4 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      <a href="/project/{{ $project->id }}" class="flex items-center">


{{ $project->title }}
                      
                      </a>
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-8 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  @foreach($project->clients as $client)
                    {{ $client->name }}
                  @endforeach
                </div>
              </td>
              @isset($project_conf->index_table_budget_column)
              @if($project_conf->index_table_budget_column == 'y')
              <td class="px-8 py-4 whitespace-nowrap text-right">
                <div class="flex items-center justify-end">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      {{ number_format($project->budget, 0, ',', ' ') }} ₽
                    </div>
                  </div>
                </div>
              </td>
              @endif
              @endisset
              <td class="px-8 py-4 whitespace-nowrap text-right">
                <div class="flex items-center justify-center">
                  <div>
                    <div class="flex items-center text-sm font-medium text-gray-900">
                      
                        @foreach($project->documents as $document)
                          @isset($document)
                            @if($document->title == 'contract')
                              <img src="/img/square-check.svg" class="inline-flex w-5 h-5"/>
                            @endif
                          @endisset
                        @endforeach
                      
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-8 py-4 whitespace-nowrap text-right">
                <div class="flex items-center justify-center">
                  <div>
                    <div class="flex items-center text-sm font-medium text-gray-900">
                      
                        @foreach($project->documents as $document)
                          @isset($document)
                            @if($document->title == 'act')
                              <img src="/img/square-check.svg" class="inline-flex w-5 h-5"/>
                            @endif
                          @endisset
                        @endforeach
                      
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