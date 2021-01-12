<template>
    <div class="tasks pt-5">
        <div class="flex flex-wrap items-center mb-6 px-8">
            <div class="flex w-1/2">
                <div class="block">
                    <h1 class="text-2xl font-semibold">Задачи</h1>
                </div>
            </div>
            <div class="flex w-1/2 justify-end">
                <router-link to="/tasks/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded px-6 py-2 text-white text-sm font-semibold shadow">Добавить задачу</router-link>
            </div>
        </div>

        <div class="mx-8 pb-4 whitespace-nowrap overflow-x-auto">
            <div v-for="project in projects" :key="project.id" class="inline-block align-top w-56 mx-2 mb-2">
                <h3 class="px-8 py-3 mb-2 bg-blue-50 w-full text-sm font-medium text-gray-500">{{ project.title }}</h3>
                <ul class="p-0">
                    <li v-for="task in project.tasks" :key="task.id" class="p-3 bg-white border border-grey-100">
                        {{ task.title }}
                        <button class="flex-1 w-5 ml-1 text-indigo-600 hover:text-indigo-900" @click="deleteTask(task.id)">
                            <img src="/img/trash.svg" class="opacity-30"/>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                projects: [],
                tasks: [],
            }
        },
        mounted() {
        this.getProjectsTasks()
        },

        computed: {
            
        },
        filters: {

          // date filter
          moment: function (date) {
            return moment(date).lang("ru").format('LL');
          },

        },
        created() {
            this.axios
                .get('/api/tasks')
                .then(response => {
                    this.projects = response.data.data;
                });
        },
        methods: {

            getProjectsTasks(page_url) {
            page_url = page_url || '/api/tasks/'

            axios
                .get(page_url)
                .then(response => {
                    this.projects = response.data.data
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true;
                })
                .finally(() => this.loading = false)
            },

            // delete task record
            deleteTask(id) {
                if(confirm("Удалить задачу?")){
                this.axios
                    .delete(`/api/task/delete/${id}`)
                    .then(response => {
                        this.getProjectsTasks()
                    });
                }
            },

        }
    }
</script>