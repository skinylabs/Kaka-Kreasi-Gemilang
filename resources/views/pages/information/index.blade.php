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
            <div class="h-40 object-cover object-center overflow-hidden rounded-lg">
                <img src="images/carousel/bromo1.webp" alt="Image 1" />
            </div>
            <div class="h-40 object-cover object-center overflow-hidden rounded-lg">
                <img src="images/carousel/bromo2.webp" alt="Image 2" />
            </div>
            <div class="h-40 object-cover object-center overflow-hidden rounded-lg">
                <img src="images/carousel/bromo3.webp" alt="Image 3" />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 ">
            <a href="/transportation" class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/bus.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Transportasi
                </h1>
            </a>
            <a href="/halaman-transportasi" class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/rundown.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Rundown
                </h1>
            </a>
            <a href="/halaman-transportasi" class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/hotel.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Hotel
                </h1>
            </a>
            <a href="/halaman-transportasi" class="block relative w-full h-32 overflow-hidden rounded-xl">
                <img src="{{ asset('images/barcode/tatib.webp') }}" alt="" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <h1
                    class="absolute inset-0 flex items-center justify-center text-white font-bold text-xl uppercase text-center">
                    Tata Tertib
                </h1>
            </a>
        </div>
    </section>


    <style>

    </style>
@endsection
