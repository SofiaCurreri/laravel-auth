@extends('layouts.app')

@section('title', $project->title)

@section('content')
<section class="card clearfix">
    <div class="card-body d-flex justify-content-between">
        <p class="">{{$project->text}}</p>
        <figure class="float-end ms-5 mb-3">
            <img src="{{$project->image}}" alt="" width="300px">
            <figcaption class="text-muted text-secondary m-0">
                {{$project->slug}}
            </figcaption>
        </figure>
    </div>
    
</section>
<a href="{{route('admin.projects.index')}}" class="btn btn-primary float-start my-5">Torna alla lista</a>
@endsection