@extends('layouts.app')

@section('title', 'Crea un nuovo progetto')

@section('actions')
    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">
        Torna alla lista
    </a>
@endsection

@section('content')
    <section class="card">
        <div class="card-body">

            <form method="POST" action="{{route('admin.projects.store')}}" class="row">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-2 text-end">
                        <label for="title" class="form-label">Titolo</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="title" id="title" class="form-control">           
                    </div>
                </div> 
                    
                <div class="row mb-3">
                    <div class="col-md-2 text-end">
                        <label for="image" class="form-label">Immagine</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="image" id="image" class="form-control">
                    </div>
                </div>
                    
                <div class="row mb-3">
                    <div class="col-md-2 text-end">
                        <label for="text" class="form-label">Testo</label>
                    </div>
                    <div class="col-md-10">
                        <textarea name="text" id="text" class="form-control" rows="5"></textarea>
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
