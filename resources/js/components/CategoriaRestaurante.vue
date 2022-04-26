<template>
    <div class="container my-5">
        <h2 class="text-center">Desde Categoria Restaurante</h2>
        <div class="row">
            <div class="col-md-4 my-5" v-for="restaurante in this.restaurantes" v-bind:key="restaurante.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${restaurante.imagen_principal}`" alt="" class="card-img-top">
                        <h3 class="text-center text-center text-primary fw-bold">{{ restaurante.nombre }}</h3>
                        <p class="card-text">{{restaurante.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{restaurante.apertura}} - {{restaurante.cierre}} </span>
                        </p>
                        <div class="d-grid gap-2">
                            <a href="" class="btn btn-primary">Ver Lugar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            restaurantes: []
        }
    },
    mounted(){
        axios.get('/categorias/restaurant')
            .then( respuesta => {
                this.restaurantes = respuesta.data;
            })
    }
}
</script>
