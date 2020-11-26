<template>
    <div class="flex flex-wrap">
        <div class="w-1/2 md:w-1/3 lg:w-64 fixed md:top-0 md:left-0 h-screen lg:block bg-gray-100 border-r z-30 hidden">
            <div class="w-full h-20 border-b flex px-4 items-center mb-8"><p class="font-semibold text-3xl text-blue-400 pl-4">LOGO</p></div>
            <nav class="mb-4 px-4">
                <router-link to="/projects" class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer"><span class="text-gray-700">Проекты</span></router-link>

                <router-link to="/finances" class="w-full flex items-center text-blue-400 h-10 pl-4 hover:bg-gray-200 rounded-lg cursor-pointer"><span class="text-gray-700">Финансы</span></router-link>
            </nav>
        </div>

        <div class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen">
            <div class="p-6 bg-gray-100 mb-20">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    export default {}
</script>