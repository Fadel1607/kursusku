@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')
<div class="container py-4" style="max-width: 760px">
    <h1 class="h3 mb-3">Tambah Kursus</h1>

    {{-- novalidate: matikan validasi browser supaya yang bekerja validasi server (Laravel) --}}
    <form method="POST" action="{{ route('courses.store') }}" class="card card-body" novalidate>
        @csrf

        <div class="mb-3">
            <label for="code" class="form-label">Kode Kursus</label>
            <input type="text" id="code" name="code"
                   value="{{ old('code') }}"
                   class="form-control @error('code') is-invalid @enderror">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kursus</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" rows="3"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fee" class="form-label">Biaya</label>
                <input type="number" id="fee" name="fee" min="0"
                       value="{{ old('fee', 0) }}"
                       class="form-control @error('fee') is-invalid @enderror">
                @error('fee')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="quota" class="form-label">Kuota</label>
                <input type="number" id="quota" name="quota" min="1" max="500"
                       value="{{ old('quota', 20) }}"
                       class="form-control @error('quota') is-invalid @enderror">
                @error('quota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date"
                       value="{{ old('start_date') }}"
                       class="form-control @error('start_date') is-invalid @enderror">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status"
                        class="form-select @error('status') is-invalid @enderror">
                    @foreach (['draft' => 'Draft', 'open' => 'Open', 'closed' => 'Closed'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('status', 'draft') === $value)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary" type="submit">Simpan Kursus</button>
            <a class="btn btn-outline-secondary" href="{{ route('courses.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection
