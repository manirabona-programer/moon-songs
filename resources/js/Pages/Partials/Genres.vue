<script setup>
    import { inject, onMounted, ref } from 'vue';

    const genres = ref([]);
    const emitter = inject('emitter');

    const getGenres = () => {
        axios.get('/api/genres').then((response) => {
            genres.value = response.data.data;
        }).catch();
    }

    const deleteGenre = (genreId) => {
        alert('Do you want to delete this genre');
        axios.delete(`/api/genres/${genreId}`).then((response) => {
            emitter.emit('alert', response.data);
            emitter.emit('genres');
        }).catch();
    }

    onMounted(() => {
        emitter.on('genres', () => {
            getGenres();
        });

        getGenres();
    });
</script>
<template>
    <div v-if="genres">
        <div v-for="genre in genres" :key="genre.id">
            <button v-on:dblclick="deleteGenre(genre.id)" :data-tooltip-target="'tooltip-default-'+genre.id" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                {{ genre.name }}
            </button>
            <div :id="'tooltip-default-'+genre.id" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Double click to delete
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Albums</span> No albums found in storage
        </div>
    </div>
</template>
