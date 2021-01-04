<template>
    <div>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <form class="mt-8 space-y-6" action="#" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Логин</label>
          <input v-model="form.email" name="email" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Логин">
        </div>
        <div>
          <label for="password" class="sr-only">Пароль</label>
          <input v-model="form.password" name="password" type="password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Пароль">
        </div>
      </div>

      <div>
        <button @click.prevent="loginUser" type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Войти
        </button>
      </div>
    </form>
  </div>
</div>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                errors: []
            }
        },
        methods: {
            loginUser() {
                axios.post('/api/login', this.form).then(() => {
                    this.$router.push({name: 'projects'});
                }).catch((error) => {
                    this.errors = error.response.data.errors;
                })
            }
        }
    }
</script>