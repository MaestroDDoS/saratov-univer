<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="shop-cookie" cookie-name="{{ config('saratov.shopcart_cookie.name') }}", max-age="{{ config('saratov.shopcart_cookie.max-age') }}">
<meta name="shop-min-weight" content="{{ config('saratov.min_weight') }}">
<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
