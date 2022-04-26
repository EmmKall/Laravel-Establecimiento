<template>
    <div>
        <h1 class="text-center">Desde PaginaInicio</h1>

        <categoria-cafe></categoria-cafe>
        <categoria-hotel></categoria-hotel>
        <categoria-gimnasio></categoria-gimnasio>
        <categoria-restaurante></categoria-restaurante>
        <categoria-bar></categoria-bar>
        <categoria-hospital></categoria-hospital>
        <categoria-doctor></categoria-doctor>

    </div>
</template>

<script>
import CategoriaCafe from './CategoriaCafe';
import CategoriaHotel from './CategoriaHotel';
import CategoriaGimnasio from './CategoriaGimnasio';
import CategoriaRestaurante from './CategoriaRestaurante';
import CategoriaHospital from './CategoriaHospital';
import CategoriaBar from './CategoriaBar';
import CategoriaDoctor from './CategoriaDoctor';

export default {

    components: {
        CategoriaCafe,
        CategoriaHotel,
        CategoriaGimnasio,
        CategoriaRestaurante,
        CategoriaBar,
        CategoriaHospital,
        CategoriaDoctor,
    }

}
</script>
