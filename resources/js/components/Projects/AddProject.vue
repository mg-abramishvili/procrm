<template>
    <div class="px-8 mt-5">

    <div class="flex flex-wrap items-center mb-6">
        <div class="flex w-1/2">
          <div class="block">
            <h1 class="text-3xl font-semibold mb-4">Новый проект</h1>
          </div>
        </div>
      </div>
<form @submit.prevent="addProject">
              <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Название</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" v-model="project.title">
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Заказчик</label>
                <input type="text" class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" v-model="project.client">
            </div>
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700 mb-2">Статус</label>
                <select class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.status">
                            <option value="active">в работе</option>
                            <option value="archive">завершен</option>
                        </select>
            </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-700 mb-2">О проекте</label>
                <textarea class="block w-full text-md rounded-md py-2 px-2 border border-gray-200" v-model="project.comment"></textarea>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4">Финансы проекта</h2>

        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
            <div class="w-full lg:w-1/3">
                <label class="block text-sm font-medium text-gray-700">Бюджет</label>
                <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="project.budget">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
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
        methods: {
            addProject() {
                this.axios
                    .post('/api/project/add', this.project)
                    .then(response => (
                        this.$router.push({name: 'projects'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>