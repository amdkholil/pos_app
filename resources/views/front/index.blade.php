<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majoo Teknologi Indonesia</title>
</head>
<link rel="stylesheet" href="{{ asset('assets/css/tailwind.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.min.css') }}">

<body class="bg-gray-50">

    <div class="">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                Majoo Teknologi Indonesia
            </a>
        </nav>

        <div class="container py-2">
            <h2 class="my-3">
                Product
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-6">
                @foreach ($products as $prod)
                    <div class="border border-black rounded-md bg-white shadow-md w-full p-3 relative">
                        <div>
                            <img src="{{ asset($prod->photo) }}" class="" alt="">
                        </div>
                        <div class="text-center font-bold">
                            {{ $prod->name }}
                        </div>
                        <div class="text-center my-2">
                            <span class="align-top text-sm">Rp</span>
                            <span class="text-2xl font-bold">
                                {{ number_format($prod->price,0,',','.') }}
                            </span>
                        </div>
                        <div class="text-justify mb-12 text-sm">
                            {!! $prod->description !!}
                        </div>
                        <div class="flex left-0 w-100 absolute bottom-4">
                            <button class="btn btn-md btn-dark mx-auto">
                                Beli
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="fixed-bottom py-2 text-center border bg-gray-300">
            2022 &copy; PT Majoo Teknologi Indonesia
        </div>
    </div>
    <script src="{{ asset('assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
</body>

</html>
