<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


const props = defineProps({
    alumnos: Array
});


const headers = [
    { title: 'ID', key: 'id' },
    { title: 'Nombre Completo', key: 'nombre_completo' },
    { title: 'Correo', key: 'correo' },
    { title: 'Teléfono', key: 'telefono' },
    { title: 'Carrera', key: 'carrera.nombre' }, 
];
</script>

<template>
    <Head title="Catedraticos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Listado de Catedraticos
            </h2>
        </template>

        <v-container>
            <v-card elevation="2">
                <v-card-title class="d-flex align-center py-4">
                    <v-icon icon="mdi-account-group" class="me-2"></v-icon>
                    Gestión de Catedraticos
                    <v-spacer></v-spacer>
                    
                    <

                </v-card-title>

                <v-divider></v-divider>

                <v-data-table
                    :headers="headers"
                    :items="alumnos"
                    class="elevation-1"
                    hover
                >
                    <template v-slot:item.carrera.nombre="{ item }">
                        <v-chip color="blue" variant="outlined" size="small">
                            {{ item.carrera ? item.carrera.nombre : 'No asignada' }}
                        </v-chip>
                    </template>

                    <template v-slot:item.actions="{ item }">
                        <v-icon size="small" color="orange" class="me-2">mdi-pencil</v-icon>
                        <v-icon size="small" color="red">mdi-delete</v-icon>
                    </template>
                </v-data-table>
            </v-card>
        </v-container>
    </AuthenticatedLayout>
</template>

<style scoped>
.text-decoration-none {
    text-decoration: none;
}
</style>