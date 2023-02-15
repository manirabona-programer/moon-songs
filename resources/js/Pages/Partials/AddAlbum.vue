<script setup>
    import { ref } from 'vue';
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

    const comfurmAlbumModal = ref(false);

    const comfurmAlbum = () => {
        comfurmAlbumModal.value = true;
    };

    const closeModal = () => {
        comfurmAlbumModal.value = false;
        form.reset();
    };

    const saveAlbum = () => {
        let formData = new FormData;
            formData.append('title', form.title);
            formData.append('release_date', form.date);
            formData.append('cover_image', form.cover);
            formData.append('description', form.description);

        axios.post('/api/albums', formData).then((response) => {
            let data = response.data;
            emitter.emit('alert', data);
        });

        closeModal();
    };
</script>
<template>
    <SecondaryButton class="ml-3" @click="comfurmAlbum">Create Album</SecondaryButton>

    <Modal :show="comfurmAlbumModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create new Album
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
                    @click="saveAlbum"
                >
                    Save
                </PrimaryButton>

                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
            </div>
        </div>
    </Modal>
</template>
