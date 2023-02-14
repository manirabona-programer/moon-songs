<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import { Head } from '@inertiajs/vue3';
    import Modal from '@/Components/Modal.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    const form = useForm({
        name: '',
    });

    const nameInput = ref(null);
    const confirmingUserDeletion = ref(false);

    const confirmGenreModal = () => {
        confirmingUserDeletion.value = true;
    };

    const closeModal = () => {
        confirmingUserDeletion.value = false;
        form.reset();
    };

    const saveGenre = () => {
        form.post(route('store.genres'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
            onError: () => nameInput.value.focus(),
            onFinish: () => form.reset(),
        });
    };
</script>
<template>
    <SecondaryButton class="ml-3" @click="confirmGenreModal">Song</SecondaryButton>

    <Modal :show="confirmingUserDeletion" @close="closeModal">
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
