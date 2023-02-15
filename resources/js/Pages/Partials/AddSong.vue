<script setup>
    import { onMounted, ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import { Head } from '@inertiajs/vue3';
    import Modal from '@/Components/Modal.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import SelectInput from '@/Components/SelectInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const form = useForm({
        title: '',
        length: '',
        album_id: 'Choose Album',
        genre_id: 'Choose Genre',
    });

    const songsModal = ref(false);
    const albums = ref([]);
    const genres = ref([]);

    const comfurmSongModal = () => {
        songsModal.value = true;
    };

    const closeModal = () => {
        songsModal.value = false;
        form.reset();
    };

    const getAlbums = () => {
        axios.get('/api/albums').then((response) => {
            albums.value = response.data.data;
        });
    }

    const getGenres = () => {
        axios.get('/api/genres').then((response) => {
            genres.value = response.data.data;
        });
    }

    const saveSong = () => {
        axios.post('/api/songs', form).then((response) => {
            let data = response.data;
            emitter.emit('alert', data);
        }).catch((error) => {
            console.log(error);
        });

        closeModal();
    };

    onMounted(() => {
        getAlbums();
        getGenres();
    });
</script>
<template>
    <SecondaryButton class="ml-3" @click="comfurmSongModal">Song</SecondaryButton>

    <Modal :show="songsModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Add new Song
            </h2>

            <!-- Song title input -->
            <div class="mt-6">
                <InputLabel for="title" value="title" class="sr-only" />

                <TextInput
                    id="title"
                    ref="titleInput"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Song title"
                />
            </div>

            <!-- Song album input -->
            <div class="mt-6">
                <InputLabel for="title" value="title" class="sr-only" />

                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5"
                    ref="genreInput"
                    v-model="form.album_id">
                    <option selected>Choose Album</option>
                    <option v-for="album in albums" :key="album.id" :value="album.id">{{ album.title }}</option>
                </select>
            </div>

            <!-- Song Genre input -->
            <div class="mt-6">
                <InputLabel for="genre" value="genre" class="sr-only" />

                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 "
                    ref="genreInput"
                    v-model="form.genre_id">
                    <option selected>Choose Genre</option>
                    <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
                </select>
            </div>

            <!-- Song Genre input -->
            <div class="mt-6">
                <InputLabel for="Length" value="Length" class="sr-only" />

                <input
                    class="rounded-md shadow-sm block w-3/4 text-sm text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none p-2.5"
                    type="text"
                    v-model="form.length"
                    placeholder="Song length"
                    >
            </div>

            <div class="mt-6 flex justify-start">
                <PrimaryButton
                    class="mr-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="saveSong"
                >
                    Save
                </PrimaryButton>

                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
            </div>
        </div>
    </Modal>
</template>
