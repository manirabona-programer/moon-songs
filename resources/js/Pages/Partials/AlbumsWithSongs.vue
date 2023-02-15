<script setup>
    import { ref, unref } from "vue";
    import axios from "axios";

    const albums = ref([]);

    axios.get('/api/albums').then((res) => {
      albums.value = res.data.data
    });
</script>
<template>
    <div class="bg-gray-100 flex flex-col" v-for="album in albums" :key="album.id">
        <div class="relative max-w-xl w-full h-36 bg-white rounded-lg shadow-lg overflow-hidde mb-5">
            <div class="absolute inset-0 rounded-lg overflow-hidden bg-red-200">
                <img :src="album.cover_image" :alt="album.title"/>
                <div class="absolute inset-0 backdrop backdrop-blur-10 bg-gradient-to-b from-transparent to-black"></div>
            </div>
            <div class="absolute flex space-x-6 transform translate-x-6 translate-y-8">
                <div class="text-white pt-12">
                    <h3 class="font-bold">Album</h3>
                    <div class="text-sm opacity-60">{{ album.title }}</div>
                </div>
            </div>
        </div>

        <div class="max-w-xl bg-white rounded-lg shadow-lg overflow-hidden mt-3" v-for="song in album.songs" :key="song.id">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1500099817043-86d46000d58f?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=800&h=250&q=80" class="object-cover"/>
                <div class="absolute p-4 inset-0 flex flex-col justify-end bg-gradient-to-b from-transparent to-gray-900 backdrop backdrop-blur-5 text-white">
                    <h3 class="font-bold capitalize">{{ song.genre.name }}</h3>
                    <span class="opacity-70">{{ song.title }}</span>
                </div>
            </div>
            <div>
                <div class="relative h-1 bg-gray-200">
                    <div class="absolute h-full w-1/2 bg-green-500 flex items-center justify-end">
                        <div class="rounded-full w-3 h-3 bg-white shadow"></div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between text-xs font-semibold text-gray-500 px-4 py-2">
                <div>01:00</div>
                <div class="flex space-x-3 p-2">
                    <button class="focus:outline-none">
                        <svg
                            class="w-4 h-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <polygon points="19 20 9 12 19 4 19 20"></polygon>
                            <line x1="5" y1="19" x2="5" y2="5"></line>
                        </svg>
                    </button>
                    <button class="rounded-full w-8 h-8 flex items-center justify-center pl-0.5 ring-2 ring-gray-100 focus:outline-none">
                        <svg
                            class="w-5 h-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <polygon points="5 3 19 12 5 21 5 3"></polygon>
                        </svg>
                    </button>
                    <button class="focus:outline-none">
                        <svg class="w-4 h-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <polygon points="5 4 15 12 5 20 5 4"></polygon>
                            <line x1="19" y1="5" x2="19" y2="19"></line>
                        </svg>
                    </button>
                </div>
                <div>{{ song.length }}</div>
            </div>
        </div>
    </div>
</template>
