<template>
    <div>
        <h3 class="text-center">Правка</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProject">
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
                    <button type="submit" class="btn btn-primary">Изменить</button>
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
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>