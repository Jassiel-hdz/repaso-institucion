<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

defineProps({
    students: Array,
    courses: Array
});

const form = useForm({
    student_id: '',
    course_id: '',
    status: 'active'
});

const submit = () => {
    form.post(route('enrollments.store'));
};
</script>

<template>
    <Head title="Nueva Matrícula" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Registrar Matrícula</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit" class="bg-white p-6 shadow rounded-lg">
                    <div class="mb-4">
                        <label class="block font-bold">ESTUDIANTE</label>
                        <select v-model="form.student_id" class="w-full border-gray-300 rounded" required>
                            <option value="">Seleccione un estudiante</option>
                            <option v-for="s in students" :key="s.id" :value="s.id">{{ s.name }}</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">CURSO</label>
                        <select v-model="form.course_id" class="w-full border-gray-300 rounded" required>
                            <option value="">Seleccione un curso</option>
                            <option v-for="c in courses" :key="c.id" :value="c.id">{{ c.name }}</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">ESTADO</label>
                        <select v-model="form.status" class="w-full border-gray-300 rounded">
                            <option value="active">Activo</option>
                            <option value="inactive">Inactivo</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-bold uppercase">
                        Guardar Matrícula
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>