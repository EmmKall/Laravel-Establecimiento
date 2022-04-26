<template>
    <div class="container my-5">
        <h2 class="text-center">Bares</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for="bar in this.bares" v-bind:key="bar.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${bar.imagen_principal}`" alt="" class="card-img-top">
                        <h2 class="card-title text-center text-primary fw-bold">{{ bar.nombre }}</h2>
                        <p class="card-text">{{bar.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{bar.apertura}} - {{bar.cierre}} </span>
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
export default{

    data: function(){
        return {
            bares: []
        }
    },
    mounted() {
        axios.get('/categorias/bar')
            .then( respuesta => {
                this.bares = respuesta.data
            })
    }
}
</script>
