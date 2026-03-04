@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Search Product Tests</h1>
    <form method="GET" action="{{ route('search') }}" class="mb-4">
        <input type="text" name="query" placeholder="Search by Zat Aktif" class="border border-gray-300 rounded px-4 py-2 w-full" value="{{ request('query') }}">
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Search</button>
    </form>
    @if($results->count() > 0)
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Zat Aktif</th>
                    <th class="border border-gray-300 px-4 py-2">Jenis Sediaan</th>
                    <th class="border border-gray-300 px-4 py-2">Bentuk Sediaan</th>
                    <th class="border border-gray-300 px-4 py-2">Parameter Uji</th>
                    <th class="border border-gray-300 px-4 py-2">Metode Uji</th>
                    <th class="border border-gray-300 px-4 py-2">Jumlah Minimal</th>
                    <th class="border border-gray-300 px-4 py-2">Satuan</th>
                    <th class="border border-gray-300 px-4 py-2">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->zat_aktif }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->jenis_sediaan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->bentuk_sediaan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->parameter_uji }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->metode_uji }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->jumlah_minimal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $result->satuan }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($result->harga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No results found.</p>
    @endif
</div>
@endsection
