<script setup>
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import AddGerne from "@/Pages/Partials/AddGenre.vue";
    import AddAlbum from "@/Pages/Partials/AddAlbum.vue";
    import AddSong from "@/Pages/Partials/AddSong.vue";
    import Albums from "@/Pages/Albums.vue";
    import Alert from "@/Components/Alert.vue";
    import { ref, unref } from "vue";
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

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Alert />
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="">
                        <ul
                            class="flex flex-wrap -mb-px"
                            id="myTab"
                            data-tabs-toggle="#myTabContent"
                            role="tablist"
                        >
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                    id="profile-tab"
                                    data-tabs-target="#profile"
                                    type="button"
                                    role="tab"
                                    aria-controls="profile"
                                    aria-selected="false"
                                >
                                    Home
                                </button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active"
                                    id="dashboard-tab"
                                    data-tabs-target="#dashboard"
                                    type="button"
                                    role="tab"
                                    aria-controls="dashboard"
                                    aria-selected="true"
                                >
                                    Songs
                                </button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                    id="settings-tab"
                                    data-tabs-target="#settings"
                                    type="button"
                                    role="tab"
                                    aria-controls="settings"
                                    aria-selected="false"
                                >
                                    Albums
                                </button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                    id="contacts-tab"
                                    data-tabs-target="#contacts"
                                    type="button"
                                    role="tab"
                                    aria-controls="contacts"
                                    aria-selected="false"
                                >
                                    Genre
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 gap-4">
            <Albums />
        </div>
    </AuthenticatedLayout>
</template>
