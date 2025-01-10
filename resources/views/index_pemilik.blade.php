@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Dashboard Pemilik</h1>

    <!-- Summary Cards -->
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kos</h5>
                    <p class="card-text display-4">{{ $totalKos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kamar Kos</h5>
                    <p class="card-text display-4">{{ $totalKamar }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Penghasilan Bulanan</h5>
                    <p class="card-text display-4">Rp {{ number_format($penghasilanBulanan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
