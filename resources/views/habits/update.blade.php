@extends('layouts.main')

@section('title')
Update Habits
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Update Kebiasaan ({{$habit->name}})</div>
            <div class="card-body">
                <form action="{{ route('habits.update', $habit->id) }}" method="put">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $habit->name }}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Opsional"></textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection