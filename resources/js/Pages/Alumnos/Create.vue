<script setup>
import { useForm } from '@inertiajs/vue3'

// Definimos las props que vienen del controlador (las carreras)
const props = defineProps({
    carreras: Array
})

const form = useForm({
    nombre_completo: '',
    correo: '',
    telefono: '',
    direccion: '',
    carrera_id: null
})

const submit = () => {
    form.post('/alumnos')
}
</script>

<template>
  <v-app>
    <v-main>
      <v-container>
        <v-card max-width="700" class="mx-auto mt-10" elevation="3">
          <v-card-title class="bg-primary text-white">Registrar Alumno</v-card-title>
          
          <v-card-text class="mt-4">
            <v-text-field 
                v-model="form.nombre_completo" 
                label="Nombre Completo" 
                variant="outlined"
                :error-messages="form.errors.nombre_completo"
            />
            <v-text-field 
                v-model="form.correo" 
                label="Correo Electrónico" 
                variant="outlined"
                :error-messages="form.errors.correo"
            />
            <v-text-field 
                v-model="form.telefono" 
                label="Teléfono" 
                variant="outlined"
                :error-messages="form.errors.telefono"
            />
            <v-textarea 
                v-model="form.direccion" 
                label="Dirección" 
                variant="outlined"
                :error-messages="form.errors.direccion"
            />
            
            <v-select
                v-model="form.carrera_id"
                :items="carreras"
                item-title="nombre" 
                item-value="id"
                label="Selecciona una Carrera"
                variant="outlined"
                :error-messages="form.errors.carrera_id"
            />
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn 
                color="primary" 
                variant="elevated" 
                @click="submit" 
                :loading="form.processing"
            >
                Guardar Estudiante
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-container>
    </v-main>
  </v-app>
</template>