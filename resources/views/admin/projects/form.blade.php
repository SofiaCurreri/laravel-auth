@extends('layouts.app')

@section('title', ($project->id) ? 'Modifica progetto' : 'Crea un nuovo progetto')

@section('actions')
    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
        Torna alla lista
    </a>
@endsection

@section('content')

    @include('layouts.partials.errors')

    <section class="card">
        <div class="card-body">

            {{-- Form unico per edit e create --}}
            {{-- Se project ha già un id sarà una modifica (if(...)), se non ce l' ha è una creazione (else...) (per distinguere i due casi) --}}
            @if($project->id)
                <form method="POST" action="{{route('admin.projects.update', $project)}}" enctype="multipart/form-data">
                    @method('PUT')
            @else 
            {{-- con enctype="multipart/form-data" il form ha il permesso di inviare file --}}
                <form method="POST" action="{{route('admin.projects.store')}}" enctype="multipart/form-data" class="row">
            @endif
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-2 text-end">
                            <label for="title" class="form-label">Titolo</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $project->title)}}"> 
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>                                    
                            @enderror
                        </div>
                    </div> 
                        
                    <div class="row mb-3">
                        <div class="col-md-2 text-end">
                            <label for="image" class="form-label">Immagine</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>                                    
                            @enderror
                        </div>
                        <div class="col-2">
                            <img src="{{old('image', $project->image)}}" class="img-fluid" alt="">
                        </div>
                    </div>
                        
                    <div class="row mb-3">
                        <div class="col-md-2 text-end">
                            <label for="text" class="form-label">Testo</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="5">
                                {{old('text', $project->text)}}
                            </textarea>
                            @error('text')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>                                    
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="m-auto col-8 mb-3">
                            <input type="submit" class="btn btn-primary mt-4" value="Salva"> 
                        </div>
                    </div>
                </form>          
        </div>
    </section>
@endsection
