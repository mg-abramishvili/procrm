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
            <div class="w-full lg:w-1/2">
                <div class="widget w-full p-4 bg-white border border-grey-100 dark:bg-grey-895 dark:border-grey-890">
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs uppercase font-light text-grey-500">
                                {{currentMonth}}
                            </div>
                            <div class="text-xl font-bold">
                                {{ totalMonth }} ₽
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
                                {{currentYear}} год
                            </div>
                            <div class="text-xl font-bold">
                                {{ totalYear }} ₽
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-blue-100"></div>
        <div v-for="month in months">
            <h3 class="px-8 py-3 bg-blue-50 w-full text-sm font-medium text-gray-500 uppercase">{{ month.date | momentMonth }}</h3>
            <div class="overflow-hidden">
                <table class="min-w-full border-t border-blue-100">
                    <tbody class="bg-white">
                        <tr v-for="(finance, i) in month.finances" :key="i" class="border-b border-blue-100">
                        <td class="px-8 py-4 whitespace-nowrap w-1/2">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ finance.title }} →
                                        <span v-for="project in finance.projects" :key="project.id">{{ project.title }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right w-1/5">
                            <div class="text-sm text-gray-900">{{ finance.date | moment }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-right text-gray-800 w-1/5">
                            <span class="px-4 py-2 inline-flex text-sm leading-3 font-bold rounded-full bg-green-100 text-gray-700">{{ finance.amount | amount }} ₽</span>
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
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                finances: [],
            }
        },
        computed: {

            // Current month
            currentMonth() {
              return this.$moment().lang("ru").format('MMMM');
            },

            // Current year
            currentYear() {
              return this.$moment().lang("ru").format('YYYY');
            },

            // Total sum of current month
            totalMonth() {
                return this.finances.filter(finance => finance.date.slice(0, 7)==this.$moment().format('YYYY-MM')).reduce((sum, n) => sum + parseFloat(n.amount), 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },

            // Total sum of current year
            totalYear() {
                return this.finances.filter(finance => finance.date.slice(0, 4)==this.$moment().format('YYYY')).reduce((sum, n) => sum + parseFloat(n.amount), 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },

            // Group by months
            months () {
              const map = {}
              for (const finance of this.finances) {
                const month = finance.date.slice(0, 7)
                map[month] = map[month] || { date: month, finances: [] }
                map[month].finances.push(finance)
              }
                return Object.keys(map).sort().reverse().map(month => map[month])
            },
        },
        filters: {

          // date filter
          moment: function (date) {
            return moment(date).lang("ru").format('LL');
          },

          // just month filter
          momentMonth: function (date) {
            return moment(date).lang("ru").format('YYYY MMMM');
          },

          // thousand separator with spaces
          amount: function (value) {
            if (!value) return ''
            value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ").slice(0, -3);
            return value
          },

        },
        created() {
            this.axios
                .get('/api/finances')
                .then(response => {
                    this.finances = response.data.data;
                });
        },
        methods: {

            // delete finance record
            deleteFinance(id) {
                if(confirm("Удалить поступление?")){
                this.axios
                    .delete(`/api/finance/delete/${id}`)
                    .then(response => {
                        let i = this.finances.map(item => item.id).indexOf(id); // find index of your object
                        this.finances.splice(i, 1)
                    });
                }
            },

        }
    }
</script>