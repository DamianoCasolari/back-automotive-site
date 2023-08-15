@extends('layouts.app')

@section('javascript')
    @vite(['resources/js/insertPreviewApartment.js'])
@endsection

@section('content')

    <div class="container d-flex justify-content-center align-items-center flex-column vh_100_without_header position-relative py-5">
        <div class="border border-1 rounded-5 bg_slide btn_push text-center strong_shadow"">
            <a class="btn text-end" href="{{ route('admin.ads.index') }}">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(208, 208, 208)"
                        class="bi bi-house-door-fill vertical_align_text_top" viewBox="0 0 16 16">
                        <path
                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                    </svg>
                </span>
                <span class="text_from_left text_fire" style="margin: 10px 0 5px 0;">ritorna agli annunci</span></a>
            </div>
        <div class="row w-100">
            <div class="col">
                <div class=" p-3 my-5 ">
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif

                    <div>
                        <h4 class="text_fire">Inserisci un annuncio!</h4>
                        <form id="create_ad_form" class="text_fire" action="{{ route('admin.ads.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="mb-3 col-12 col-md-8">
                                    <label for="image" class="form-label">Aggiungi un'immagine (*)</label>
                                    
                                    <input type="file" class="form-control shadow" name="cover_image" id="cover_image"
                                        aria-describedby="helpId" accept="image/*" required >
                                    @error('cover_image')
                                        <small class="text-danger">Per favore, inserisci correttamente l'immagine.</small>
                                    @enderror
                                </div>
                                <div id="cover_image-preview-container"
                                    class="mt-2 d-none col-12 col-md-4 d-flex justify-content-center strong_shadow">
                                    <img id="cover_image-preview" src="#" alt="Preview dell'immagine"
                                        style="max-width: 100%;" class="p-3">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="mb-3 col-12 col-md-8">
                                    <input type="file" class="form-control shadow" name="cover_image2" id="cover_image2"
                                        aria-describedby="helpId" accept="image/*" >
                                    @error('cover_image2')
                                        <small class="text-danger">Per favore, inserisci correttamente l'immagine.</small>
                                    @enderror
                                </div>
                                <div id="cover_image2-preview-container" class="mt-2 d-none col-12 col-md-4 d-flex justify-content-center strong_shadow">
                                    <img id="cover_image2-preview" src="#" alt="Preview dell'immagine"
                                        style="max-width: 100%;" class="p-3">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="mb-3 col-12 col-md-8">
                                    <input type="file" class="form-control shadow" name="cover_image3" id="cover_image3"
                                    aria-describedby="helpId" accept="image/*" >
                                @error('cover_image3')
                                    <small class="text-danger">Per favore, inserisci correttamente l'immagine.</small>
                                @enderror
                                </div>
                                <div id="cover_image3-preview-container" class="mt-2 d-none col-12 col-md-4 d-flex justify-content-center strong_shadow">
                                    <img id="cover_image3-preview" src="#" alt="Preview dell'immagine"
                                        style="max-width: 100%;" class="p-3">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="mb-3 col-12 col-md-8">
                                    <input type="file" class="form-control shadow" name="cover_image4" id="cover_image4"
                                    aria-describedby="helpId" accept="image/*" >
                                @error('cover_image4')
                                    <small class="text-danger">Per favore, inserisci correttamente l'immagine.</small>
                                @enderror
                                </div>
                                <div id="cover_image4-preview-container" class="mt-2 d-none col-12 col-md-4 d-flex justify-content-center strong_shadow">
                                    <img id="cover_image4-preview" src="#" alt="Preview dell'immagine"
                                        style="max-width: 100%;" class="p-3">
                                </div>
                            </div>
                            <div  class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="mb-3 col-12 col-md-8">
                                    <input type="file" class="form-control shadow" name="cover_image5" id="cover_image5"
                                    aria-describedby="helpId" accept="image/*" >
                                @error('cover_image5')
                                    <small class="text-danger">Per favore, inserisci correttamente l'immagine.</small>
                                @enderror
                                </div>
                                <div id="cover_image5-preview-container" class="mt-2 d-none col-12 col-md-4 d-flex justify-content-center strong_shadow">
                                    <img id="cover_image5-preview" src="#" alt="Preview dell'immagine"
                                        style="max-width: 100%;" class="p-3">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Nome (*)</label>
                                <input type="text" class="form-control shadow" name="name" id="name"
                                    aria-describedby="helpId" placeholder="" value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="text-danger">Per favore, inserisci correttamente il nome.</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="brand" class="form-label">Seleziona la marca della vettura (*)</label>

                                <select class="form-select shadow @error('brand') is-invalid @enderror"
                                    name="brand" id="brand" required>
                                    <option value="">-</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == old('brand', '') ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="mb-3">
                                <label for="model" class="form-label" required>Modello(*)</label>
                                <input type="text" class="form-control shadow" name="model" id="model"
                                    aria-describedby="helpId" placeholder="" value="{{ old('model') }}" >
                                @error('model')
                                    <small class="text-danger">Per favore, inserisci correttamente il modello</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label" >Prezzo(€)</label>
                                <input type="number" class="form-control shadow" name="price"
                                    id="price" aria-describedby="helpId" placeholder=""
                                    value="{{ old('price') }}" >
                                @error('price')
                                    <small class="text-danger">Per favore, inserisci correttamente il prezzo</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="km" class="form-label">Km(*)</label>
                                <input type="number" class="form-control shadow" name="km" id="km"
                                    aria-describedby="helpId" placeholder="" value="{{ old('km') }}" required>
                                @error('km')
                                    <small class="text-danger">Per favore, inserisci correttamente i km.</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_of_enrollment" class="form-label">Data immatricolazione(*)</label>
                                <input type="date" class="form-control shadow" name="date_of_enrollment" id="date_of_enrollment"
                                    aria-describedby="helpId" placeholder="" value="{{ old('date_of_enrollment') }}" required>
                                @error('date_of_enrollment')
                                    <small class="text-danger">Per favore, inserisci la data corretta.</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fuel_type" class="form-label">Carburante</label>
                                <input type="text" class="form-control shadow" name="fuel_type"
                                    id="fuel_type" aria-describedby="helpId" placeholder=""
                                    value="{{ old('fuel_type') }}" >
                                @error('fuel_type')
                                    <small class="text-danger">Per favore, inserisci correttamente il carburante</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="transmission" class="form-label">Cambio</label>
                                <input type="text" class="form-control shadow" name="transmission" id="transmission"
                                        aria-describedby="helpId" placeholder="" value="{{ old('transmission') }}" >
                                @error('transmission')
                                    <small class="text-danger">Per favore, inserisci correttamente il tipo di cambio</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="engine_displacement" class="form-label">Cilindrata</label>
                                <input type="number" class="form-control shadow" name="engine_displacement"
                                    id="engine_displacement" aria-describedby="helpId" placeholder=""
                                    value="{{ old('engine_displacement') }}" >
                                @error('engine_displacement')
                                    <small class="text-danger">Per favore, inserisci correttamente la cilindrata</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cv" class="form-label">Cv</label>
                                <input type="number" class="form-control shadow" name="cv"
                                    id="cv" aria-describedby="helpId" placeholder=""
                                    value="{{ old('cv') }}" >
                                @error('cv')
                                    <small class="text-danger">Per favore, inserisci correttamente la cilindrata</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="car_doors_number" class="form-label">Numero portiere</label>
                                <input type="number" class="form-control shadow" name="car_doors_number"
                                    id="car_doors_number" aria-describedby="helpId" placeholder=""
                                    value="{{ old('car_doors_number') }}" >
                                @error('car_doors_number')
                                    <small class="text-danger">Per favore, inserisci correttamente il numero di portiere</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="color" class="form-label">Colore</label>
                                <input type="text" class="form-control shadow" name="color"
                                    id="color" aria-describedby="helpId" placeholder=""
                                    value="{{ old('color') }}" >
                                @error('color')
                                    <small class="text-danger">Per favore, inserisci correttamente il colore</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea class="form-control shadow" name="description" id="description"  rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">Per favore, inserisci correttamente la descrizione.</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark w-100 text-uppercase strong_shadow ">Aggiungi
                                annuncio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

