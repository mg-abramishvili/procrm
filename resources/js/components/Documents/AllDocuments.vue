<template>
    <div class="documents pt-5">
        <div class="flex flex-wrap items-center mb-6 px-8">
            <div class="flex w-1/2">
                <div class="block">
                    <h1 class="text-2xl font-semibold">Документы</h1>
                </div>
            </div>
            <div class="flex w-1/2 justify-end">
                <router-link to="/documents/add" class="bg-blue-500 hover:bg-blue-600 focus:outline-none rounded px-6 py-2 text-white text-sm font-semibold shadow">Добавить документ</router-link>
            </div>
        </div>

        <div class="overflow-hidden">
            <table class="min-w-full border-t border-blue-100">
                <tbody class="bg-white">
                    <tr v-for="document in documents" :key="document.id" class="border-b border-blue-100">
                    <td class="px-8 py-4 whitespace-nowrap w-1/2">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm font-medium text-gray-900">
                                    {{ document.title }} →
                                    <span v-for="project in document.projects" :key="project.id">{{ project.title }}</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right w-1/5">
                        <div class="text-sm text-gray-900">{{ document.file }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium w-1/4">
                        <div class="inline-flex action-buttons">
                            <router-link :to="{name: 'document-edit', params: { id: document.id }}" class="flex-1 w-5 text-indigo-600 hover:text-indigo-900">
                            <img src="/img/edit.svg" class="opacity-30"/>
                            </router-link>
                            <button class="flex-1 w-5 ml-1 text-indigo-600 hover:text-indigo-900" @click="deleteDocument(document.id)">
                            <img src="/img/trash.svg" class="opacity-30"/>
                            </button>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                documents: [],
            }
        },
        computed: {

        },
        filters: {

        },
        created() {
            this.axios
                .get('/api/documents')
                .then(response => {
                    this.documents = response.data.data;
                });
        },
        methods: {

            // delete document record
            deleteDocument(id) {
                if(confirm("Удалить документ?")){
                this.axios
                    .delete(`/api/document/delete/${id}`)
                    .then(response => {
                        let i = this.documents.map(item => item.id).indexOf(id); // find index of your object
                        this.documents.splice(i, 1)
                    });
                }
            },

        }
    }
</script>