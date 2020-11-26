<template>
    <div>

      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Финансы</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <router-link to="/finances/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Добавить поступление</router-link>
        </div>
      </div>

<div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
  <div class="w-full lg:w-1/2"><div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Месяц</div><div class="text-xl font-bold">{{ totalMonth }} ₽</div></div></div></div></div>
  <div class="w-full lg:w-1/2"><div class="widget w-full p-4 rounded-lg bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Год</div><div class="text-xl font-bold">{{ totalYear }} ₽</div></div></div></div></div>
</div>


<div class="mb-4" v-for="month in months" :key="month">
<h3 class="text-md font-semibold text-gray-400 mb-4">{{ month.date }}</h3>
      <div class="overflow-hidden border border-gray-200 sm:rounded-lg mb-4">
        <table class="min-w-full divide-y divide-gray-200">
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="(finance, i) in month.finances" :key="i">
              <td class="px-6 py-4 whitespace-nowrap w-1/2">
                <div class="flex items-center">
                  <div>
                    <div class="text-sm font-medium text-gray-900">
                      {{ finance.title }}
                        <div>
                          <span v-for="project in finance.projects" :key="project.id" class="text-gray-400 text-xs">{{ project.title }}</span>
                        </div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ finance.date }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ finance.amount | amount }} ₽
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <router-link :to="{name: 'finance-edit', params: { id: finance.id }}" class="text-indigo-600 hover:text-indigo-900">Правка
                        </router-link>
                        <button class="text-indigo-600 hover:text-indigo-900" @click="deleteFinance(finance.id)">Удалить</button>
              </td>
            </tr>

            <!-- More rows... -->
          </tbody>
        </table>
      </div>
</div></div>
        
</template>

<script>
    export default {
        data() {
            return {
                finances: [],
            }
        },
        computed: {

            totalMonth() {
                return this.finances.filter(finance => finance.date.slice(0, 7)=='2020-10').reduce((sum, n) => sum + parseFloat(n.amount), 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            totalYear() {
                return this.finances.filter(finance => finance.date.slice(0, 4)=='2020').reduce((sum, n) => sum + parseFloat(n.amount), 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },

            months () {
            const map = {}

            for (const finance of this.finances) {
            const month = finance.date.slice(0, 7)

            map[month] = map[month] || { date: month, finances: [] }
            map[month].finances.push(finance)
            }

            return Object.keys(map).sort().map(month => map[month])
            },
        },
        filters: {
          amount: function (value) {
          if (!value) return ''
          value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
          return value
          }
        },
        created() {
            this.axios
                .get('/api/finances')
                .then(response => {
                    this.finances = response.data.data;
                });
        },
        methods: {
            deleteFinance(id) {
                this.axios
                    .delete(`/api/finance/delete/${id}`)
                    .then(response => {
                        let i = this.finances.map(item => item.id).indexOf(id); // find index of your object
                        this.finances.splice(i, 1)
                    });
            }
        }
    }
</script>