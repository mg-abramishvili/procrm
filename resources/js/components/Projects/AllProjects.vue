<template>
    <div>

<div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
  <div class="w-full lg:w-1/4"><div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Проекты</div><div class="text-xl font-bold">{{ projects.length }}</div></div></div></div></div>
  <div class="w-full lg:w-1/4"><div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Активные</div><div class="text-xl font-bold">{{ projectsActive.length }}</div></div></div></div></div>
  <div class="w-full lg:w-1/4"><div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Сумма</div><div class="text-xl font-bold">{{ total }}</div></div></div></div></div>
  <div class="w-full lg:w-1/4"><div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Сумма</div><div class="text-xl font-bold">{{ total }}</div></div></div></div></div>
</div>

      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Проекты</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <router-link to="/projects/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить проект</router-link>
        </div>
      </div>

      <div class="overflow-hidden border border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Название проекта
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Заголовок
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Статус
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Бюджет
              </th>
              <th scope="col" class="px-6 py-3 bg-gray-50">
                
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="project in projects" :key="project.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      {{ project.title }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ project.client }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{ project.status }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ project.budget }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <router-link :to="{name: 'project-view', params: { id: project.id }}" class="text-indigo-600 hover:text-indigo-900">Детали
                        </router-link>
                        <router-link :to="{name: 'project-edit', params: { id: project.id }}" class="text-indigo-600 hover:text-indigo-900">Правка
                        </router-link>
                        <button class="text-indigo-600 hover:text-indigo-900" @click="deleteProject(project.id)">Удалить</button>
              </td>
            </tr>

            <!-- More rows... -->
          </tbody>
        </table>
      </div>

        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projects: [],
            }
        },
        computed: {
            projectsActive() {
                return this.projects.filter(project => project.status=='active');
            },
            total() {
                return this.projects.filter(project => project.status=='active').reduce((sum, n) => sum + parseFloat(n.budget), 0)
            }
        },
        created() {
            this.axios
                .get('/api/projects')
                .then(response => {
                    this.projects = response.data.data;
                });
        },
        methods: {
            deleteProject(id) {
                this.axios
                    .delete(`/api/project/delete/${id}`)
                    .then(response => {
                        let i = this.projects.map(item => item.id).indexOf(id); // find index of your object
                        this.projects.splice(i, 1)
                    });
            }
        }
    }
</script>