<template>
    <div class="container my-5">
        <h2 class="text-center">Hospitales</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for="hospital in hospitales" v-bind:key="hospital.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${hospital.imagen_principal}`" alt="" class="card-img-t">
                        <h3 class="card-title text-center text-primary fw-bold">{{ hospital.id }}</h3>
                        <p class="card-text">{{hospital.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{hospital.apertura}} - {{hospital.cierre}} </span>
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
            hospitales: []
        }
    },
    mounted(){
        axios.get('/categorias/hospital')
            .then( respuesta => {
                this.hospitales = respuesta.data;
            })
    }
}
</script>
