@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Edit Customer</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('customers.update',$customer->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Customer</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $customer->nama }}"
                       required>
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ $customer->no_hp }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $customer->email }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3"
                          required>{{ $customer->alamat }}</textarea>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection