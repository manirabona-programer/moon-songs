<script setup>
    import { inject, toRefs } from 'vue';
    import UpdateAlbum from "@/Pages/Update/UpdateAlbum.vue";

    const props = defineProps({
        albumId: String,
        albumName: String
    });

    const { albumId } = toRefs(props)
    const { albumName } = toRefs(props)
    const emitter = inject('emitter');

    const onDelete = () => {
        emitter.emit('deleteAlbum', {albumId: albumId.value, albumName: albumName.value});
    }
</script>
<template>
    <div class="inline-flex rounded-md shadow-sm mt-2" role="group">
        <UpdateAlbum :albumId="albumId" />

        <button @click="onDelete" type="button" class="px-3 py-1 text-sm font-medium text-gray-50 bg-red-900 rounded-r-md hover:bg-red-700 hover:text-gray-50 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 ">
            Delete
        </button>
    </div>
</template>
