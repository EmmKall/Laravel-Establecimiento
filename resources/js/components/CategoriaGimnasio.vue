<template>
    <div class="container my-5">
        <h2 class="text-center">Gimnasios</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for="gym in this.gimnasios" v-bind:key="gym.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${gym.imagen_principal}`" alt="" class="card-img-top">
                        <h3 class="card-title text-center text-primary fw-bold">{{ gym.nombre }}</h3>
                        <p class="card-text">{{gym.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{gym.apertura}} - {{gym.cierre}} </span>
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
            gimnasios: []
        }
    },
    mounted(){
        axios.get('/categorias/gimnasio')
            .then( respuesta => {
                this.gimnasios = respuesta.data;
            })
    }
}
</script>
