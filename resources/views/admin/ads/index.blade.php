@extends('layouts.app')

@section('content')
    <section>
        <div class="container d-flex justify-content-center align-items-center flex-column vh_100_without_header position-relative">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show mt-4 w-100" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex align-items-center flex-column flex-md-row justify-content-between py-4 px-3 w-100">
            <h1 class="fw-bold text_fire">I tuoi annunci</h1>
            
            <div class="border border-1 rounded-5 mt-3 mt-md-0 bg_slide btn_push strong_shadow">
                <a class="btn text-end" href="{{ route('admin.ads.create') }}">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(208, 208, 208)"
                            class="bi bi-plus-lg vertical_align_text_top" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                    </span>
                    <span class="text_from_left text_fire" style="margin: 10px 0 5px 0;">Inserisci annuncio</span></a>
            </div>
        </div>
            <div class="row">
                @forelse($ads as $ad)
                    <div class="col-12 d-flex align-items-center justify-content-between border_car_card flex-wrap rounded-1 my-4">
                        <div class="col-12 col-sm-6 col-md-6 my-3 position-relative">
                            {{-- <img src="{{ asset('storage/uploads/' . $ad->cover_image) }}" alt="Immagine {{ $ad->name }}"
                                class="w-100 rounded-3 strong_shadow image_aspect_ratio"> --}}
                                <div id="carouselExampleControls{{$ad->id}}" class="carousel slide">
                                    <div class="carousel-inner"  >
                                      <div class="carousel-item active" >
                                        <img src="{{ asset('storage/uploads/' . $ad->cover_image) }}" alt="Immagine {{ $ad->name }}"
                                class="w-100 rounded-3 strong_shadow image_index "  >
                                      </div>
                                      @if($ad->cover_image2)
                                      <div class="carousel-item">
                                        <img src="{{ asset('storage/uploads/' . $ad->cover_image2) }}" alt="Immagine {{ $ad->name }}"
                                        class="w-100 rounded-3 strong_shadow image_index " >
                                      </div>
                                      @endif
                                      @if($ad->cover_image3)
                                      <div class="carousel-item">
                                        <img src="{{ asset('storage/uploads/' . $ad->cover_image3) }}" alt="Immagine {{ $ad->name }}"
                                class="w-100 rounded-3 strong_shadow image_index " >
                                      </div>
                                      @endif
                                      @if($ad->cover_image4)
                                      <div class="carousel-item">
                                        <img src="{{ asset('storage/uploads/' . $ad->cover_image4) }}" alt="Immagine {{ $ad->name }}"
                                class="w-100 rounded-3 strong_shadow image_index " >
                                      </div>
                                      @endif
                                      @if($ad->cover_image5)
                                      <div class="carousel-item">
                                        <img src="{{ asset('storage/uploads/' . $ad->cover_image5) }}" alt="Immagine {{ $ad->name }}"
                                class="w-100 rounded-3 strong_shadow image_index " >
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
                        <div
                            class="col-12 col-sm-6 col-md-6 py-3 px-3 px-sm-4 px-md-4 d-flex flex-column justify-content-center">
                            <h3 class="mb-3"><strong class="text_fire">{{ $ad->name }} </strong></h3>
                            <div>
                                <div class="text_cloudy mb-3 fs-5"><strong class="text_fire">Prezzo vettura : </strong> {{ is_null($ad->price) ? 'NaN' : $ad->price . '€'}}</div>
                                <div class="text_cloudy mb-3 fs-5" ><strong class="text_fire">Km : </strong> {{ is_null($ad->km) ? 'NaN' : $ad->km }}</div>
                                <div class="text_cloudy fs-5" ><strong class="text_fire">Data di immatricolazione : </strong> {{ $ad->date_of_enrollment}}</div>
                                {{-- <p class="fw-bold {{ $ad->visible ? 'text-success' : 'text-danger' }}">
                                    @if ($ad->visible)
                                        Disponibile &#x2713;
                                    @else
                                        Non Disponibile &#x2717;
                                    @endif
                                </p> --}}
                            </div>
                            <hr class="text-white">
                            <div class="index_buttons">
                                <div
                                    class="d-flex justify-content-start justify-content-sm-center justify-content-md-start flex-wrap flex-sm-column flex-md-row gap-2">
                                    <a class="btn my-2 btn_push btn-light bg_slide strong_shadow rounded-5"
                                        href="{{ route('admin.ads.show', $ad) }}">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye-fill vertical_align_text_top"
                                                viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </span>
                                        <span class="text_from_left strecth_text_hover">Dettagli</span>
                                    </a>
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
                                                    <button type="button" class="btn btn-dark rounded-5 px-3"
                                                        data-bs-dismiss="modal">Chiudi</button>
                                                    <form
                                                        action="{{ route('admin.ads.destroy', $ad->slug) }}"
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
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <h3 class="text-center">Non hai ancora registrato alcun appartamento</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
