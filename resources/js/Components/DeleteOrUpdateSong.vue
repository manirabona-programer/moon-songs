<script setup>
    import { inject, toRefs } from 'vue';
    import UpdateSong from "@/Pages/Update/UpdateSong.vue";

    const props = defineProps({
        songId: String,
        songName: String
    });

    const { songId } = toRefs(props)
    const { songName } = toRefs(props)
    const emitter = inject('emitter');

    const onDelete = () => {
        emitter.emit('deleteSong', {songId: songId.value, songName: songName.value});
    }
</script>
<template>
    <div class="inline-flex rounded-md shadow-sm mt-2 mb-3" role="group">
        <UpdateSong :songId="songId" />

        <button @click="onDelete" type="button" class="px-3 py-1 text-sm font-medium text-gray-50 bg-red-900 rounded-r-md hover:bg-red-700 hover:text-gray-50 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
            Delete
        </button>
    </div>
</template>
