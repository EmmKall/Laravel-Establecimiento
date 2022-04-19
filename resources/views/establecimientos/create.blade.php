@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css" integrity="sha512-qkeymXyips4Xo5rbFhX+IDuWMDEmSn7Qo7KpPMmZ1BmuIA95IPVYsVZNn8n4NH/N30EY7PUZS3gTeTPoAGo1mA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

    <div class="container">
        <h1 class="text-center uppercase my-4">Crear Establecimiento</h1>

        <div class="mt-5 row justify-content-center">

            <form method="POST" action="{{ route('establecimiento.store') }}" class="col-md-9 col-xs-12 card card-body bg-info rounded rounded-3" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="p-2 my-1 border border-primary bg-white rounded rounded-3">
                    <span class="mx-5 font-bold fs-6 text-primary">Nombre, Categoría e Imagen</span>

                    <div class="form-group my-1 p-2 border-bottom border-1 border-info">
                        <label for="nombre" class="form-label">Nombre establecimiento</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre establecimiento" value="{{ old('nombre') }}" required>
                        @error('nombre')
                        <div class="invalid-feedback">
                            <span class>{{ $message }}</span>
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
                            <span class>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group my-1 p-2 border-bottom border-1 border-info">
                        <label for="imagen_principal" class="form-label">Imagen Principal</label>
                        <input type="file" name="imagen_principal" id="imagen_principal" class="form-control @error('imagen_principal') is-invalid @enderror" required>
                        @error('imagen_principal')
                        <div class="invalid-feedback">
                            <span class>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="p-2 my-1 border border-primary bg-white rounded rounded-3">
                    <span class="mx-5 font-bold fs-6 text-primary">Ubicación</span>

                    <div class="form-group">
                        <div id="mapa" style="height: 400px;"></div>
                    </div>
                    <p class="informacion">Agrega los siguientes datos</p>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" value="{{old('direccion')}}" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección">
                        @error('direccion')
                        <div class="invalid-feedback">
                            <span class>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="colonia">Colonia</label>
                        <input type="text" value="{{old('colonia')}}" name="colonia" id="colonia" class="form-control @error('colonia') is-invalid @enderror" placeholder="Colonia">
                        @error('colonia')
                        <div class="invalid-feedback">
                            <span class>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    <input type="hidden" name="lat" id="lat" value="{{old('lat')}}">
                    <input type="hidden" name="lng" id="lng" value="{{old('lng')}}">

                </div>

                <div class="p-2 row my-1 border border-primary bg-white rounded rounded-3">
                    <span class="mx-5 font-bold fs-6 text-primary">Datos de Contacto</span>

                    <div class="form-group">
                        <label for="nombre">Teléfono</label>
                        <input type="tel" class="form-control @error('telefono')  is-invalid  @enderror" id="telefono" placeholder="Teléfono Establecimiento" name="telefono" value="{{ old('telefono') }}">

                        @error('telefono')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre">Descripción</label>
                        <textarea class="form-control  @error('descripcion')  is-invalid  @enderror" name="descripcion">{{ old('descripcion') }}</textarea>

                        @error('descripcion')
                            <div class="invalid-feedback">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="apertura">Hora Apertura:</label>
                        <input type="time" class="form-control @error('apertura')  is-invalid  @enderror" id="apertura" name="apertura" value="{{ old('apertura') }}" >
                        @error('apertura')
                            <div class="invalid-feedback">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cierre">Hora Cierre:</label>
                        <input type="time" class="form-control @error('cierre')  is-invalid  @enderror" id="cierre" name="cierre" value="{{ old('cierre') }}" >
                        @error('cierre')
                            <div class="invalid-feedback">
                                <span>{{$message}}</span>
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="p-2 row my-1 border border-primary bg-white rounded rounded-3">
                    <div class="form-group">
                        <span>Imágenes</span>
                        <div id="dropzone" class="dropzone form-control"></div>
                    </div>
                </div>

                <input type="hidden" name="uuid" id="uuid" value="{{ Str::uuid()->toString() }}">
                <div class="col-12 d-flex justify-content-center">
                    <input type="submit" value="Agregar" class="btn btn-primary my-1 d-block text-uppercase">
                </div>

            </form>

        </div>

    </div>

@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet" defer></script>
    <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.js" integrity="sha512-FFyHlfr2vLvm0wwfHTNluDFFhHaorucvwbpr0sZYmxciUj3NoW1lYpveAQcx2B+MnbXbSrRasqp43ldP9BKJcg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
