@extends('layout')

@section('title', 'New Courses')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h4 mb-4">Nieuwe course toevoegen</h1>

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <form action="{{ route('storecourse') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Titel</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                >
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Beschrijving</label>
                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    name="description"
                                    rows="4"
                                >{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="is_active" class="form-label">Status</label>
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('is_active') is-invalid @enderror"
                                        type="checkbox"
                                        value="1"
                                        id="is_active"
                                        name="is_active"
                                        {{ old('is_active', '0') == '1' ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="is_active">Actief</label>
                                    @error('is_active')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                                <a href="{{ route('courses') }}" class="btn btn-outline-secondary">Annuleren</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection