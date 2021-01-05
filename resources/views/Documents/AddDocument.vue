<template>
    <div>
        <h3 class="text-center">Добавить документ</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addDocument">

                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input type="text" class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="document.title">
                        </div>
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Файл</label>
                            <input type="file" v-on:change="onFileChange" class="block w-full text-md rounded-md p-1 border border-gray-300">
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                        <div class="w-full lg:w-1/3">
                            <label class="block text-sm font-medium text-gray-700">Проект</label>
                            <select class="block w-full text-md rounded-md p-1 border border-gray-300" v-model="document.projects">
                                <option v-for="project in projects" :key="project.id" :value="project.id">{{ project.title }}</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                document: {},
                projects: [],
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
            onFileChange(e){
                // console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            addDocument() {

                let formData = new FormData();
                formData.append('title', this.document.title);
                formData.append('file', this.file);
                formData.append('projects', this.document.projects);

                this.axios
                    .post('/api/document/add', formData)
                    .then(response => (
                        this.$router.push({name: 'documents'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>