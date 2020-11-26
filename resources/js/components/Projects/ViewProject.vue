<template>
    <div>
        
      <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">{{ project.title }}</h1>
          </div>
        </div>
        <div class="flex w-1/2 justify-end">
          <router-link :to="{name: 'project-edit', params: { id: project.id }}" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded-lg px-6 py-2 text-white text-sm font-semibold shadow">Изменить</router-link>
        </div>
      </div>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Название</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" :value="project.title" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Заказчик</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" :value="project.client" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Статус</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" :value="project.status" disabled>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4">Финансы проекта</h2>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Бюджет</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" :value="project.budget" disabled>
            </div>
            <div class="w-full lg:w-1/3" v-for="finance in project.finances" :key="finance.id">
                <label class="block text-sm font-medium text-gray-700">{{ finance.title }} ({{ finance.date }})</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" :value="finance.amount" disabled>
            </div>
        </div>
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
                .get(`/api/project/view/${this.$route.params.id}`)
                .then((response) => {
                    this.project = response.data;
                    // console.log(response.data);
                });
        },
    }
</script>