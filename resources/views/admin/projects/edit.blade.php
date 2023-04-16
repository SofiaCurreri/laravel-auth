@extends('layouts.app')

@section('title', $project->title)

@section('actions')
    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
        Torna alla lista
    </a>
@endsection

@section('content')
    <section class="card">
        <div class="card-body">
            <form method="POST" action="{{route('admin.projects.update', $project)}}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-2 text-end">
                        <label for="title" class="form-label">Titolo</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="title" id="title" class="form-control" value="{{$project->title}}">           
                    </div>
                </div> 
                    
                <div class="row mb-3">
                    <div class="col-md-2 text-end">
                        <label for="image" class="form-label">Immagine</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="image" id="image" class="form-control" value="{{$project->image}}">
                    </div>
                </div>
                    
                <div class="row mb-3">
                    <div class="col-md-2 text-end">
                        <label for="text" class="form-label">Testo</label>
                    </div>
                    <div class="col-md-10">
                        <textarea name="text" id="text" class="form-control" rows="5">
                            {{$project->text}}
                        </textarea>
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