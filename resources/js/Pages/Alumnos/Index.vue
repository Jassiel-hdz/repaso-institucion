<script setup>
// No necesitas importar nada extra aquí por ahora
</script>

<template>
    <v-app>
        <v-main>
            <v-container>
                <v-card class="mx-auto mt-5" max-width="500" elevation="10">
                    <v-card-item>
                        <v-card-title class="text-h5">
                            Página de Alumnos
                        </v-card-title>
                        <v-card-subtitle>
                            Universidad Católica de Honduras
                        </v-card-subtitle>
                    </v-card-item>

                    <v-card-text>
                        <p class="text-body-1">La página funciona Correctamente con Vuetify.</p>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn color="primary" variant="elevated" prepend-icon="mdi-check-circle">
                            ¡Todo listo!
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-container>
        </v-main>
    </v-app>
</template>