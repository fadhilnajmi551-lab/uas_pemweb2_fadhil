@extends('layouts.app')

@section('content')

<h2 class="mb-3">Data Customer</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('customers.create') }}" class="btn btn-success">
        + Tambah Customer
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Alamat</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($customers as $customer)

    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $customer->nama }}</td>
        <td>{{ $customer->no_hp }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->alamat }}</td>

        <td>

            <a href="{{ route('customers.edit', $customer->id) }}"
                class="btn btn-warning btn-sm">
                Edit
            </a>

            <form action="{{ route('customers.destroy', $customer->id) }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Yakin ingin menghapus customer ini?')"
                    class="btn btn-danger btn-sm">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="6" class="text-center">
            Belum ada data customer.
        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection