@extends('layouts.app')

@section('javascript')
    {{-- @vite(['resources/js/adStatistics.js']) --}}
@endsection

@section('content')
    <div>
        <div class="bg_double_show body_minus_header_block"></div>

        <div class="container d-flex justify-content-center align-items-center flex-column vh_100_without_header position-relative py-5">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- messaggio effettuata sponsorizzazione --}}
            @if (session('success_message'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong> {{ session('success_message') }}</strong>
                </div>
            @endif


            <div class="border border-1 rounded-5 bg_slide btn_push text-center">
                <a class="btn text-end strong_shadow" href="{{ route('admin.ads.index') }}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(208, 208, 208)"
                            class="bi bi-house-door-fill vertical_align_text_top" viewBox="0 0 16 16">
                            <path
                                d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg>
                    </span>
                    <span class="text_from_left text_fire" style="margin: 10px 0 5px 0;">ritorna agli annunci</span>
                </a>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text_cloudy w-100 mt-5">
                <h1 class="fw-bold">{{ $ad->name }}</h1>
                <h6 class="">Annuncio caricato il : {{$ad->created_at}}</h6>
            </div>
            <div class="info_container mt-4 d-flex justify-content-between w-100 flex-wrap text_fire">
                <div
                    class="mt-2 mt-md-0 col-12 col-md-6 d-flex flex-column align-items-start justify-content-center">
                
                    <h3 class="fw-bold mb-3">
                        @foreach($brands as $brand)
                        {{ $ad->brand == $brand->id ? $brand->name : '' }}
                        @endforeach
                    </h3>
                    <p><strong>Modello : </strong> {{ $ad->model }}</p>
                    <hr class=" text_cloudy w-75">
                    <p><strong>Data di Immatricolazione :</strong> {{ $ad->date_of_enrollment }}</p>
                    <p><strong>Km :</strong> {{ $ad->km }}</p>
                    <p><strong>Carburante :</strong> {{ $ad->fuel_type }}</p>
                    <p><strong>Cambio :</strong> {{ $ad->transmission }}</p>
                    <p><strong>Cv :</strong> {{ $ad->cv }}</p>
                    <p><strong>Cilindrata :</strong> {{ $ad->engine_displacement }}</p>
                    <p><strong>Colore :</strong> {{ $ad->color }}</p>
                    <p><strong>Numero porte :</strong>{{ $ad->car_doors_number }}</p>
                    <p><strong>Descrizione :</strong> {{ $ad->description }}</p>
                    <hr class="w-75 text_cloudy">
                    <p><strong>Prezzo</strong> {{ $ad->price }}€</p>
              

                
                    <div class="d-flex justify-content-start flex-wrap gap-2 mt-3">
                        <a class="btn my-2 btn_push btn-light bg_slide strong_shadow rounded-5"
                        href="{{ route('admin.ads.edit', $ad) }}">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-pencil-fill vertical_align_text_top"
                                viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg>
                        </span>
                        <span class="text_from_left strecth_text_hover">Modifica</span>
                    </a>

                    <!-- Modal trigger button -->
                    <button type="button" class="btn bg_pomegranate btn_push my-2 strong_shadow bg_slide_dark rounded-5" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $ad->id }}">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="rgb(208, 208, 208)" class="bi bi-trash3-fill vertical_align_text_top"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </span>
                        <span class="text_from_left text_cloudy strecth_text_hover">Elimina</span>
                    </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade text-black" id="modalId-{{ $ad->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                            aria-labelledby="modalTitleId-{{ $ad->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-{{ $ad->id }}">
                                            Eliminare l'annuncio
                                            {{ $ad->name }}?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark rounded-5 px-3" data-bs-dismiss="modal">Chiudi</button>
                                        <form action="{{ route('admin.ads.destroy', $ad->slug) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-5 px-3">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image mt-4 mt-md-0 col-12 col-md-6 d-flex justify-content-center align-items-center flex-column ">
                
                    <div class="ps-md-3 my-3 position-relative" style="max-height: 420px">
                            <div id="carouselExampleControls{{$ad->id}}" class="carousel slide">
                                <div class="carousel-inner"  >
                                  <div class="carousel-item active" >
                                    <img src="{{ asset('storage/uploads/' . $ad->cover_image) }}" alt="Immagine {{ $ad->name }}"
                            class="w-100 rounded-3 strong_shadow "  >
                                  </div>
                                  @if($ad->cover_image2)
                                  <div class="carousel-item">
                                    <img src="{{ asset('storage/uploads/' . $ad->cover_image2) }}" alt="Immagine {{ $ad->name }}"
                                    class="w-100 rounded-3 strong_shadow " >
                                  </div>
                                  @endif
                                  @if($ad->cover_image3)
                                  <div class="carousel-item">
                                    <img src="{{ asset('storage/uploads/' . $ad->cover_image3) }}" alt="Immagine {{ $ad->name }}"
                            class="w-100 rounded-3 strong_shadow " >
                                  </div>
                                  @endif
                                  @if($ad->cover_image4)
                                  <div class="carousel-item">
                                    <img src="{{ asset('storage/uploads/' . $ad->cover_image4) }}" alt="Immagine {{ $ad->name }}"
                            class="w-100 rounded-3 strong_shadow " >
                                  </div>
                                  @endif
                                  @if($ad->cover_image5)
                                  <div class="carousel-item">
                                    <img src="{{ asset('storage/uploads/' . $ad->cover_image5) }}" alt="Immagine {{ $ad->name }}"
                            class="w-100 rounded-3 strong_shadow " >
                                  </div>
                                  @endif
                                </div>
                                @if($ad->cover_image2 || $ad->cover_image3 || $ad->cover_image4 || $ad->cover_image5 )
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$ad->id}}" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                @endif
                                @if($ad->cover_image2 || $ad->cover_image3 || $ad->cover_image4 || $ad->cover_image5 )
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$ad->id}}" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                                @endif
                              </div>
                    </div>
             
                </div>
            </div>

            {{-- <input type="hidden" name="slug" id="slug" value="{{ $ad->slug }}" disabled> --}}

            {{-- <div class="card card_bg_special my-4">
                <div class="card-header text-center">
                    <h2 class="fw-bolder m-0 text-secondary text-uppercase">{{ __('VISITE MENSILI ') . date('Y') }}</h2>
                </div>
                <div class="card-body" style="width: 100%; max-width: 700px; margin-inline: auto">
                    <canvas id="myChart"></canvas>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
