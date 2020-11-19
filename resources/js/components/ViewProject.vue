<template>
    <div>
        <h3 class="text-center">Просмотр</h3>
        <router-link :to="{name: 'edit', params: { id: project.id }}" class="btn btn-warning">Edit
        </router-link>
        <div class="row">
            <div class="col-4 form-group">
                <label>Название</label>
                <input type="text" class="form-control" v-model="project.title" disabled>
            </div>
            <div class="col-4 form-group">
                <label>Заказчик</label>
                <input type="text" class="form-control" v-model="project.client" disabled>
            </div>
            <div class="col-4 form-group">
                <label>Статус</label>
                <input type="text" class="form-control" v-model="project.status" disabled>
            </div>
            <div class="col-4 form-group">
                <label>Бюджет</label>
                <input type="text" class="form-control" v-model="project.budget" disabled>
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