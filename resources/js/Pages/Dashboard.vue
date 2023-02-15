<script setup>
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import AddGerne from "@/Pages/Partials/AddGenre.vue";
    import AddAlbum from "@/Pages/Partials/AddAlbum.vue";
    import AddSong from "@/Pages/Partials/AddSong.vue";
    import Alert from "@/Components/Alert.vue";
    import DeleteAlert from "@/Components/DeleteAlert.vue";
    import { ref, unref } from "vue";
    import Genres from "@/Pages/Partials/Genres.vue";
    import AlbumsWithSongs from "./Partials/AlbumsWithSongs.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>

                <div class="nav-action-modal ml-3">
                    <AddGerne />
                    <AddAlbum />
                    <AddSong />
                </div>
            </div>
        </template>

        <!-- Genres -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 flex">
            <Genres />
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <Alert />
            <DeleteAlert />
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-4 mt-5">
            <AlbumsWithSongs />
        </div>
    </AuthenticatedLayout>
</template>
