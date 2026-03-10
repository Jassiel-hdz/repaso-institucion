<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="border-b border-gray-100 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">
                    <div class="flex">
                        <div class="flex shrink-0 items-center">
                            <Link :href="route('dashboard')">
                                <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                            </Link>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <Link :href="route('dashboard')" 
                                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out">
                                Dashboard
                            </Link>
                        </div>
                    </div>

                    <div class="hidden sm:ms-6 sm:flex sm:items-center">
                        <div class="text-sm font-medium text-gray-500">
                            {{ $page.props.auth.user ? $page.props.auth.user.name : 'Usuario' }}
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <v-card>
            <v-layout>
                <v-navigation-drawer expand-on-hover permanent rail color="grey-lighten-4">
                    <v-list>
                        <v-list-item
                            prepend-avatar="https://randomuser.me/api/portraits/lego/1.jpg"
                            :subtitle="$page.props.auth.user ? $page.props.auth.user.email : 'admin@test.com'"
                            :title="$page.props.auth.user ? $page.props.auth.user.name : 'Admin'"
                        ></v-list-item>
                    </v-list>

                    <v-divider></v-divider>

                    <v-list density="compact" nav> 
                        <Link :href="route('alumnos.index')" class="text-decoration-none text-black">
                            <v-list-item prepend-icon="mdi-account-school" title="Alumnos" value="alumnos"></v-list-item> 
                        </Link>

                        <Link :href="route('courses.index')" class="text-decoration-none text-black">
                            <v-list-item prepend-icon="mdi-book-open-page-variant" title="Courses" value="courses"></v-list-item>
                        </Link>

                        <Link :href="route('enrollments.index')" class="text-decoration-none text-black">
                            <v-list-item prepend-icon="mdi-clipboard-list-outline" title="Enrollments" value="enrollments"></v-list-item>
                        </Link>

                        <v-divider class="my-2"></v-divider>

                        <Link :href="route('logout')" method="post" as="button" class="text-decoration-none w-100">
                            <v-list-item prepend-icon="mdi-logout" title="Cerrar Sesión" value="logout" class="text-red"></v-list-item>
                        </Link>
                    </v-list>
                </v-navigation-drawer>

                <v-main style="min-height: 100vh;">
                    <div class="py-6 px-6">
                        <slot />
                    </div>
                </v-main>
            </v-layout>
        </v-card>
    </div>
</template>

<style scoped>

.text-decoration-none {
    text-decoration: none !important;
}
</style>