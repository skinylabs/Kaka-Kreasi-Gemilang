@extends('pages.information.app')
@section('content')
@section('content')
    <section class="flex flex-col gap-6">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-slate-800">
                TOUR BROMO
            </h1>
            <p class="font-bold text-slate-600">
                SMK MUHAMMADIYAH 1 KLATEN
            </p>
        </div>
        <div class="my-slider">
            @foreach ($images as $image)
                <div class="h-40 object-cover object-center overflow-hidden rounded-lg">
                    <img src="{{ asset($image['src']) }}" alt="{{ $image['alt'] }}" />
                </div>
            @endforeach
        </div>


    </section>


    <style>

    </style>
@endsection
