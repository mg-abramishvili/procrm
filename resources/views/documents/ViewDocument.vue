<template>
    <div>
        <h3 class="text-center">Просмотр</h3>
        <router-link :to="{name: 'edit', params: { id: project.id }}" class="btn btn-warning">Edit
        </router-link>
        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Название</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.title" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Заказчик</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.client" disabled>
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Статус</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.status" disabled>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Бюджет</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.budget" disabled>
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