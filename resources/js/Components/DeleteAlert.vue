<script setup>
    import { inject, onMounted, ref } from 'vue';

    const emitter = inject('emitter');
    const id = ref(null);
    const name = ref('');
    const onActive = ref(false);

    const deleteAlbum = () => {
        axios.delete(`/api/albums/${id.value}`).then((response) => {
            emitter.emit('alert', response.data);
            onActive.value = false;
        }).catch();
    }

    const closeWarning = () => {
        onActive.value = false;
    }

    onMounted(() => {
        emitter.on('deleteAlbum', (album) => {
            id.value = album.albumId;
            name.value = album.albumName;
            onActive.value = true;
        });
    });
</script>
<template>
    <div id="alert-additional-content-2" v-if="onActive" class="flex justify-between p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-200" role="alert">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Info</span>
          <h3 class="text-lg font-medium">Are u sure you want delete {{ name }}</h3>
        </div>
        <div class="flex">
          <button type="button" @click="deleteAlbum" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            Yes sure
          </button>
          <button @click="closeWarning" type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
            cancel
          </button>
        </div>
    </div>
</template>
