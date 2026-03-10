<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    enrollments: Array
});
</script>

<template>
    <Head title="Matrículas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Listado de Matrículas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end mb-4">
                    <Link :href="route('enrollments.create')" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow uppercase">
                        Crear Matrícula
                    </Link>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg p-6 overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100 uppercase text-sm">
                            <tr>
                                <th class="border border-gray-300 p-3">ID</th>
                                <th class="border border-gray-300 p-3">ESTUDIANTE</th>
                                <th class="border border-gray-300 p-3">CURSO</th>
                                <th class="border border-gray-300 p-3">FECHA DE REGISTRO</th>
                                <th class="border border-gray-300 p-3">ESTADO</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr v-for="enrol in enrollments" :key="enrol.id" class="hover:bg-gray-50 text-center">
                                <td class="border border-gray-300 p-3">{{ enrol.id }}</td>
                                <td class="border border-gray-300 p-3 text-left font-bold">{{ enrol.estudiante }}</td>
                                <td class="border border-gray-300 p-3 text-left">{{ enrol.curso }}</td>
                                <td class="border border-gray-300 p-3">{{ enrol.fecha }}</td>
                                <td class="border border-gray-300 p-3">
                                    <span :class="{
                                        'px-2 py-1 rounded text-xs font-bold uppercase': true,
                                        'bg-green-100 text-green-800': enrol.estado === 'Completado',
                                        'bg-yellow-100 text-yellow-800': enrol.estado === 'Pendiente',
                                        'bg-red-100 text-red-800': enrol.estado === 'Cancelado'
                                    }">
                                        {{ enrol.estado }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>