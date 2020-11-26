<template>
    <div>
        <h3 class="text-center">Добавление проекта</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProject">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" v-model="project.title">
                    </div>
                    <div class="form-group">
                        <label>Заказчик</label>
                        <input type="text" class="form-control" v-model="project.client">
                    </div>
                    <div class="form-group">
                        <label>Бюджет</label>
                        <input type="text" class="form-control" v-model="project.budget">
                    </div>
                    <div class="form-group">
                        <label>Статус</label>
                        <input type="text" class="form-control" v-model="project.status">
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