<template>
    <div>
        
<div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">{{ project.title }}</h1>
          </div>
        </div>
      </div>


                <form @submit.prevent="updateProject">
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.title">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Заказчик</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.client">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Статус</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.status">
                        </div>
                    </div>

<h2 class="text-xl font-semibold mb-4">Финансы проекта</h2>

                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Бюджет</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.budget">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Сохранить</button>
                </form>
            </div>
</template>

<script>
    export default {
        data() {
            return {
                project: {}
            }
        },
        created() {
            this.axios
                .get(`/api/project/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.project = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateProject() {
                this.axios
                    .post(`/api/project/update/${this.$route.params.id}`, this.project)
                    .then((response) => {
                        this.$router.push({name: 'projects'});
                    });
            }
        }
    }
</script>