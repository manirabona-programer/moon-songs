<script setup>
    import { ref, unref } from "vue";
    import axios from "axios";
    import DeleteOrUpdate from "@/Components/DeleteOrUpdate.vue";

    const albums = ref([]);

    axios.get('/api/albums').then((res) => {
      albums.value = res.data.data
    });
</script>
<template>
    <div class="bg-gray-100 flex flex-col justify-center" v-for="album in albums" :key="album.id">
        <div class="relative max-w-xl w-full h-36 bg-white rounded-lg shadow-lg overflow-hidde mb-5">
            <div class="absolute inset-0 rounded-lg overflow-hidden bg-red-200">
                <img :src="album.cover_image" :alt="album.title"/>
                <div class="absolute inset-0 backdrop backdrop-blur-10 bg-gradient-to-b from-transparent to-black"></div>
            </div>
            <div class="absolute flex space-x-6 transform translate-x-6 translate-y-8">
                <div class="text-white pt-12">
                    <h3 class="font-bold">Album</h3>
                    <div class="text-sm opacity-60">{{ album.title }}</div>
                    <DeleteOrUpdate :albumId="album.id" :albumName="album.title" />
                </div>
            </div>
        </div>
    </div>
</template>
