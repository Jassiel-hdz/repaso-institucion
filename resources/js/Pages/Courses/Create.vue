<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    status: 'active',
});
</script>

<template>
    <Head title="Crear Curso" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo Curso</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
                <form @submit.prevent="">
                    <div class="mb-4">
                        <label class="block font-bold">Nombre del Curso:</label>
                        <input v-model="form.name" type="text" class="w-full border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold">Estado:</label>
                        <select v-model="form.status" class="w-full border-gray-300 rounded">
                            <option value="active">Activo</option>
                            <option value="inactive">Inactivo</option>
                        </select>
                    </div>
                    <button class="bg-green-600 text-white px-4 py-2 rounded">GUARDAR CURSO</button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>