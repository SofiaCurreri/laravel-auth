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

                <div class="col-4">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" id="title" class="form-control"> 
                        </div>
        
                        <div class="col-12 mb-3">
                            <label for="image" class="form-label">Immagine</label>
                            <input type="text" name="image" id="image" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="col-8 mb-3">
                    <label for="text" class="form-label">Testo</label>
                    <textarea name="text" id="text" class="form-control" rows="5"></textarea>
                </div>

                <div class="col-4 mb-3">
                    <input type="submit" class="btn btn-primary mt-4" value="Salva"> 
                </div>
            </form>
            
        </div>
    </section>
@endsection
