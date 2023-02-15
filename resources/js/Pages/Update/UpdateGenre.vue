<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import { Head } from '@inertiajs/vue3';
    import axios from 'axios';
    import { inject } from 'vue'

    import Modal from '@/Components/Modal.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const form = useForm({ name: '' });
    const emitter = inject('emitter');

    const nameInput = ref(null);
    const genreModal = ref(false);

    const openGenreModal = () => {
        genreModal.value = true;
    };

    const closeModal = () => {
        genreModal.value = false;
        form.reset();
    };

    const saveGenre = () => {
        axios.post('/api/genres', { name: form.name }).then((response) => {
            let data = response.data;
            emitter.emit('alert', data);
            emitter.emit('genres');
        });

        closeModal();
    };
</script>
<template>
    <SecondaryButton @click="openGenreModal">Genre</SecondaryButton>

    <Modal :show="genreModal" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create new Genre
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please
                enter your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mt-6">
                <InputLabel for="name" value="Name" class="sr-only" />
                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="Genre Name"
                />
            </div>

            <div class="mt-6 flex justify-start">
                <PrimaryButton
                    class="mr-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="saveGenre"
                >
                    Save
                </PrimaryButton>

                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>
            </div>
        </div>
    </Modal>
</template>
