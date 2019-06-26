<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Data Barang</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css")}}">
    <style>
        .center{
            margin-left: auto;
            margin-right: auto;
        }
        .navbar{
            margin-bottom: 70px;
        }
        .form-control{
            border-radius: 12px !important;
        }
        .keterangan{
            margin-left: 10px;
            font-style: italic;
        }
        .red{
            color: red !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a href="{{ route('barang.index') }}" class="navbar-brand center">KELOLA DATA BARANG</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>