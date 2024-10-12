<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Password Tour</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container w-full h-screen flex flex-col gap-4 items-center justify-center bg-white">
        <div class="">
            <img src="{{ asset('images/logo/kakatour.webp') }}" alt="" class="h-8 ">
        </div>
        <div class="flex flex-col gap-4 w-full px-4">

            <h1 class="text-slate-800 text-2xl font-bold text-center">Masukkan Kode</h1>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 rounded-md">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('tour.checkPassword') }}" method="POST">
                @csrf
                <div class="mb-4">

                    <input type="password" name="password" id="password" required
                        class=" block w-full p-2 border border-gray-300 rounded-md" />
                </div>


                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md  w-full">Masuk</button>
            </form>
        </div>
    </div>
</body>

</html>
