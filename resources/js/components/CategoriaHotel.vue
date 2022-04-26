<template>
    <div class="container my-5">
        <h2 class="text-center">Desde Categoria Hotel</h2>
        <div class="row">
            <div class="col-md-4 my-5" v-for="hotel in this.hoteles" v-bind:key="hotel.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${hotel.imagen_principal}`" alt="" class="card-img-top">
                        <h3 class="text-center text-center text-primary fw-bold">{{ hotel.nombre }}</h3>
                        <p class="card-text">{{hotel.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{hotel.apertura}} - {{hotel.cierre}} </span>
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
        return{
            hoteles: []
        }
    },
    mounted(){
        axios.get('/categorias/hotel')
            .then( respuesta => {
                this.hoteles = respuesta.data;
            })
    }

}
</script>
