<template>
    <div class="container my-5">
        <h2 class="text-center">Doctores</h2>
        <div class="row">
            <div class="col-md-4 mt-4" v-for="doctor in this.doctores" v-bind:key="doctor.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`storage/${doctor.imagen_principal}`" alt="" class="card-img-top">
                        <h3 class="text-center text-center text-primary fw-bold">{{ doctor.nombre }}</h3>
                        <p class="card-text">{{doctor.direccion}}</p>
                        <p class="card-text">
                            <span class="fw-bold">{{doctor.apertura}} - {{doctor.cierre}} </span>
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
            doctores: []
        }
    },
    mounted() {
        axios.get('/categorias/doctor')
            .then( respuesta => {
                this.doctores = respuesta.data
            })
    }
}
</script>
