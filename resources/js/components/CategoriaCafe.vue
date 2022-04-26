<template>
    <div class="container my-5">
        <h2 class="text-center">Cafés</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for="cafe in this.cafes" v-bind:key="cafe.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${cafe.imagen_principal}`" alt="" class="card-iimg-top">
                        <h2 class="card-title text-center text-primary fw-bold">{{ cafe.nombre }}</h2>
                        <p class="card-text">{{cafe.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{cafe.apertura}} - {{cafe.cierre}} </span>
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
            cafes: []
        }
    },
    mounted(){
        axios.get('/categorias/cafe')
            .then( respuesta => {
                this.cafe = respuesta.data
            })
    }
}
</script>
