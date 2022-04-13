@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
@endsection

@section('content')

    <div class="container">
        <h1 class="text-center uppercase my-4">Crear Establecimiento</h1>

        <div class="mt-5 row justify-content-center">

            <form action="" class="col-md-9 col-xs-12 card card-body bg-info rounded rounded-3">

                <div class="p-2 my-1 border border-primary bg-white rounded rounded-3">
                    <span class="mx-5 font-bold fs-6 text-primary">Nombre, Categoría e Imagen</span>

                    <div class="form-group my-1 p-2 border-bottom border-1 border-info">
                        <label for="nombre" class="form-label">Nombre establecimiento</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre establecimiento" value="{{ old('nombre') }}" required>
                        @error('nombre')
                        <div class="invalid-feedback">
                            <span class>{{ message }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group my-1 p-2 border-bottom border-1 border-info">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control @error('nombre') is-invalid @enderror">
                            <option value="" selected disabled>-- SELECCIONE OPCIÓN --</option>
                            @foreach ($categorias as $categoria)
                                <option {{ $categoria->id === old('categoria_id') ? 'selected' : '' }} value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                        <div class="invalid-feedback">
                            <span class>{{ message }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group my-1 p-2 border-bottom border-1 border-info">
                        <label for="imagen_principal" class="form-label">Imagen Principal</label>
                        <input type="file" name="imagen_principal" id="imagen_principal" class="form-control @error('imagen_principal') is-invalid @enderror" required>
                        @error('imagen_principal')
                        <div class="invalid-feedback">
                            <span class>{{ message }}</span>
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="p-2 my-1 border border-primary bg-white rounded rounded-3">
                    <span class="mx-5 font-bold fs-6 text-primary">Ubicación</span>

                    <div class="form-group my-1 p-2 border-bottom border-1 border-info">
                        <label for="formbuscador" class="form-label">Dirección del establecimiento</label>
                        <input type="text" class="form-control" id="formbuscador" placeholder="Calle del Negocio o Establecimiento">
                        <p class="text-secaondary mt-5 mb-3 text-center">El asistente colocará una dirección estimada, ajusta el ping al lugar exacto</p>
                    </div>

                    <div class="form-group">
                        <div id="mapa" style="height: 400px;"></div>
                    </div>
                    <p class="informacion">Confirma que los siguientes campos son correctos</p>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" value="{{old('direccion')}}" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección">
                        @error('direccion')
                        <div class="invalid-feedback">
                            <span class>{{ message }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="colonia">Colonia</label>
                        <input type="text" value="{{old('colonia')}}" name="colonia" id="colonia" class="form-control @error('colonia') is-invalid @enderror" placeholder="Colonia">
                        @error('colonia')
                        <div class="invalid-feedback">
                            <span class>{{ message }}</span>
                        </div>
                        @enderror
                    </div>

                    <input type="hidden" name="lat" id="lat" value="{{old('lat')}}">
                    <input type="hidden" name="lng" id="lng" value="{{old('lng')}}">

                </div>

            </form>

        </div>

    </div>

@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endsection
