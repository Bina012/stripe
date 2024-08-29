<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Stripe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4 mt-4">Laravel Stripe</h1>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://dummyimage.com/250/ffffff/000000" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Paltinum</div>
                        <p class="card-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, vitae fugit! Perspiciatis, a? Beatae neque cumque dolorum id deserunt ut doloribus, cum rerum excepturi qui voluptate labore, ratione eos accusamus.
                        </p>
                        <a href="{{ route('stripe.checkout',['price'=>10,'product'=>'platinum']) }}">Make payment</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://dummyimage.com/250/ffffff/000000" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Silver</div>
                        <p class="card-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, vitae fugit! Perspiciatis, a? Beatae neque cumque dolorum id deserunt ut doloribus, cum rerum excepturi qui voluptate labore, ratione eos accusamus.
                        </p>
                        <a href="{{ route('stripe.checkout',['price'=>100,'product'=>'silver']) }}">Make payment</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://dummyimage.com/250/ffffff/000000" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">Gold</div>
                        <p class="card-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, vitae fugit! Perspiciatis, a? Beatae neque cumque dolorum id deserunt ut doloribus, cum rerum excepturi qui voluptate labore, ratione eos accusamus.
                        </p>
                        <a href="{{ route('stripe.checkout',['price'=>1000,'product'=>'gold']) }}">Make payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
