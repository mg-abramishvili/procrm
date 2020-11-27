<template>
    <div class="finances pt-5">

      <div class="flex flex-wrap items-center mb-6 px-8">
        <div class="flex w-1/2">
          <div class="block">
          <h1 class="text-2xl font-semibold">Финансы</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <router-link to="/finances/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded px-6 py-2 text-white text-sm font-semibold shadow">Добавить поступление</router-link>
        </div>
      </div>

<div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-12 px-8">
  <div class="w-full lg:w-1/2"><div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Месяц</div><div class="text-xl font-bold">{{ totalMonth }} ₽</div></div></div></div></div>
  
  <div class="w-full lg:w-1/2"><div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890"><div class="flex flex-row items-center justify-between"><div class="flex flex-col"><div class="text-xs uppercase font-light text-grey-500">Год</div><div class="text-xl font-bold">{{ totalYear }} ₽</div></div></div></div></div>
</div>


<div class="mb-4" v-for="month in months" :key="month">
<h3 class="text-md font-semibold text-blue-500 mb-4 px-8">{{ month.date }}</h3>
      <div class="overflow-hidden mb-16">
        <table class="min-w-full border-t">
          <tbody class="bg-white">
            <tr v-for="(finance, i) in month.finances" :key="i" class="border-b hover:bg-gray-100">
              <td class="px-8 py-4 whitespace-nowrap w-1/2">
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
              <td class="px-6 py-4 whitespace-nowrap w-1/5">
                <div class="text-sm text-gray-900">{{ finance.date }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800 w-1/5">
                {{ finance.amount | amount }} ₽
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium w-1/4">
                  <div class="inline-flex action-buttons">
                    <router-link :to="{name: 'finance-edit', params: { id: finance.id }}" class="flex-1 w-5 text-indigo-600 hover:text-indigo-900">
                      <img src="/img/edit.svg" class="opacity-30"/>
                    </router-link>
                    <button class="flex-1 w-5 ml-1 text-indigo-600 hover:text-indigo-900" @click="deleteFinance(finance.id)">
                      <img src="/img/trash.svg" class="opacity-30"/>
                    </button>
                  </div>
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
                if(confirm("Удалить поступление?")){
                this.axios
                    .delete(`/api/finance/delete/${id}`)
                    .then(response => {
                        let i = this.finances.map(item => item.id).indexOf(id); // find index of your object
                        this.finances.splice(i, 1)
                    });
                }
            }
        }
    }
</script>