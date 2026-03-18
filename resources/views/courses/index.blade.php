@extends('layout')

@section('title', 'All Courses')

@section('content')
	<div class="container mt-4">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 mb-0">Cursussen</h1>
			<a href="{{ route('createcourse') }}" class="btn btn-primary">Nieuwe cursus</a>
		</div>

		@if (session('success'))
			<div class="alert alert-success" role="alert">
				{{ session('success') }}
			</div>
		@endif

		@if ($courses->isEmpty())
			<div class="alert alert-info" role="alert">
				Er zijn nog geen cursussen toegevoegd.
			</div>
		@else
			<div class="row g-3">
				@foreach ($courses as $course)
					<div class="col-12">
						<div class="card shadow-sm">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
									<div>
										<h2 class="h5 mb-1">{{ $course->title }}</h2>
										<p class="text-muted mb-2">Aangemaakt op {{ $course->created_at->format('d/m/Y H:i') }}</p>
										<p class="mb-0">{{ $course->description }}</p>
									</div>

									<form action="{{ route('editcourse', $course->id) }}" method="POST" class="ms-auto">
										@csrf
										<input type="hidden" name="is_active" value="0">
										<div class="form-check form-switch">
											<input
												class="form-check-input"
												type="checkbox"
												id="is_active_{{ $course->id }}"
												name="is_active"
												value="1"
												onchange="this.form.submit()"
												{{ $course->is_active ? 'checked' : '' }}
											>
											<label class="form-check-label" for="is_active_{{ $course->id }}">
												{{ $course->is_active ? 'Actief' : 'Niet actief' }}
											</label>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>

@endsection