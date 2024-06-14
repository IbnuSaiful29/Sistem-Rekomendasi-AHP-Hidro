@extends('front.layouts.main')

@section('contents')
<section style="padding:50px 50px; background-color:#f1f1f1;">
    <div class="main-container container">
        <div class="row row-sm">
            <center>
                <h4 class="card-title" style="color: #000000">Hasil Rekomendasi</h4>
                <p>Berdasarkan nilai terbaik yang Anda masukkan, berikut adalah rekomendasi penanganan yang paling sesuai:</p>
                <br>
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($rankedAlternativesAll as $alternative)
                            <div class="card mb-3">
                                <div class="card-body" style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
                                    <h5 class="card-title">{{ $alternative['nama_alternatif'] }}</h5>
                                    <p class="card-text">Bobot: {{ round($alternative['weight'], 3) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</section>
@endsection
