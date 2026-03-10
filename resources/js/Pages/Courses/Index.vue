<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ courses: Array });
</script>

<template>
    <Head title="Courses" />
    <AuthenticatedLayout>
        <div class="bg-white p-6 rounded shadow-lg overflow-x-auto">
            <div class="flex justify-between mb-4">
                <h2 class="text-xl font-bold">GESTIÓN DE CURSOS</h2>
                <Link :href="route('courses.create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    CREAR CURSOS
                </Link>
            </div>

            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100 uppercase text-sm">
                    <tr>
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">CÓDIGO</th>
                        <th class="border border-gray-300 p-2">NOMBRE DEL CURSO</th>
                        <th class="border border-gray-300 p-2">CRÉDITOS</th>
                        <th class="border border-gray-300 p-2">DOCENTE</th>
                        <th class="border border-gray-300 p-2">PERIODO</th>
                        <th class="border border-gray-300 p-2">ESTADO</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr v-for="course in courses" :key="course.id" class="hover:bg-gray-50 text-center">
                        <td class="border border-gray-300 p-2">{{ course.id }}</td>
                        <td class="border border-gray-300 p-2">{{ course.codigo }}</td>
                        <td class="border border-gray-300 p-2 text-left font-bold">{{ course.nombre }}</td>
                        <td class="border border-gray-300 p-2">{{ course.creditos }}</td>
                        <td class="border border-gray-300 p-2 text-left">{{ course.docente || 'Por asignar' }}</td>
                        <td class="border border-gray-300 p-2">{{ course.periodo || 'I-2026' }}</td>
                        <td class="border border-gray-300 p-2">
                            <span class="text-green-600 font-bold">Activo</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>