<template>
    <div>
        <h3 class="text-center">Проекты</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Заказчик</th>
                <th>Бюджет</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="project in projects" :key="project.id">
                <td>{{ project.id }}</td>
                <td>{{ project.title }}</td>
                <td>{{ project.client }}</td>
                <td>{{ project.budget }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: project.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteProject(project.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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