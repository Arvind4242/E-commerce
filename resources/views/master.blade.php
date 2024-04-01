<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce project</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('header')
      @yield('content')
      @include('footer')
</body>
<style>
    .custom-login{
        height: 500px;
        padding-top: 100px;
    }
    .custom-product{
        padding-right: 100px;
        padding-left: 100px;
    }
    .img-slider{
        height: 800px !important;
    }
    .trending-img{
        height: 300px;
        width: 400px;
    }
    .trending-item{
        float: left;
        width: 25%;
    }
    .trending-wrapper{
        margin: 20px;
    }
    .detail-img{
        height: 400px;
        width: 600px;
    }
    .rounded-circle{
        height: 40px;
        width: 40px;
    }
    .card-list-divider{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
</style>
</html>
