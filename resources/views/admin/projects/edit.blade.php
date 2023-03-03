@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2>Modifica nuovo Project</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <form action="{{ route('admin.projects.store', $project->slug) }}" method="POST">
            @csrf
            <div class="form-group my-3">
                <label class="control-label">
                    Titolo
                </label>
                <input type="text" class="form-control" placeholder="Titolo" id="title" name ="title" value="{{ old('title') ?? $project->title }}">
            </div>
            <div class="form-group my-3">
                <label class="control-label">
                    Contenuto
                </label>
                <textarea type="text-area" class="form-control" placeholder="Contenuto" id="content" name ="content">{{ old('content') ?? $project->content }}</textarea>
            </div>
            <div class="form-group my-3">
                <label class="control-label">
                    Tipo
                </label>
                <select class="form-control" id="type_id" name ="type_id">
                    <option value="">
                        Tipo
                    </option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-3">
                <button type="submit" class="btn btn-sm btn-success">Salva Project</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection