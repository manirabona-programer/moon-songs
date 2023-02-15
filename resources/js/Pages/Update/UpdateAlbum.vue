<script setup>
    import { onMounted, ref, toRefs } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import { Head } from '@inertiajs/vue3';
    import Modal from '@/Components/Modal.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import FileInput from '@/Components/FileInput.vue';
    import TextereaInput from '@/Components/TextereaInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const form = useForm({
        title: '',
        date: '',
        cover: '',
        description: ''
    });

    const props = defineProps({
        albumId: String
    });

    const { albumId } = toRefs(props)
    const comfurmAlbumModal = ref(false);

    const comfurmAlbum = () => {
        comfurmAlbumModal.value = true;
    };

    const closeModal = () => {
        comfurmAlbumModal.value = false;
        form.reset();
    };

    const updateUlbum = () => {
        let formData = new FormData;
            formData.append('title', form.title);
            formData.append('release_date', form.date);
            formData.append('cover_image', form.cover);
            formData.append('description', form.description);

        axios.post(`/api/albums/${albumId.value}`, formData).then((response) => {
            let data = response.data;
            emitter.emit('alert', data);
        });

        closeModal();
    };

    onMounted(() => {
        axios.get(`/api/albums/${albumId.value}`).then((response) => {
            let album = response.data.data;
            form.title = album.title;
            form.date = album.release_date;
            form.description = album.description;
        }).catch();
    });
</script>
<template>
    <button @click="comfurmAlbum" type="button" class="px-3 py-1 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Update
    </button>

    <Modal :show="comfurmAlbumModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Update album
            </h2>

            <div class="mt-6">
                <InputLabel for="title" value="title" class="sr-only" />

                <TextInput
                    id="title"
                    ref="titleInput"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Album title"
                />
            </div>
            <div class="mt-6">
                <InputLabel for="date" value="date" class="sr-only" />

                <TextInput
                    id="date"
                    ref="dateInput"
                    v-model="form.date"
                    type="date"
                    class="mt-1 block w-3/4"
                    placeholder="Release date"
                />
            </div>
            <div class="mt-6">
                <InputLabel for="Choose Cover" value="cover" class="sr-only" />

                <FileInput
                    id="cover"
                    ref="coverInput"
                    @input="form.cover = $event.target.files[0]"
                    type="file"
                    class="mt-1 block w-3/4"
                    placeholder="Choose Cover"
                />
            </div>

            <div class="mt-6">
                <TextereaInput
                    id="description"
                    ref="descriptionInput"
                    v-model="form.description"
                    type="file"
                    class="mt-1 block w-3/4"
                    placeholder="Description"
                />
            </div>

            <div class="mt-6 flex justify-start">
                <PrimaryButton
                    class="mr-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="updateUlbum"
                >
                    Save Changes
                </PrimaryButton>

                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
            </div>
        </div>
    </Modal>
</template>
