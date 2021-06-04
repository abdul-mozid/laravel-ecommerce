<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('fontawesome/css/all.css')}}">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <title>E Commerce Website</title>
        <style>
            /*For HighChart*/
            .highcharts-figure, .highcharts-data-table table {
                min-width: 360px; 
                width: 100%;
                margin: 1em auto;
            }

            .highcharts-data-table table {
                font-family: Verdana, sans-serif;
                border-collapse: collapse;
                border: 1px solid #EBEBEB;
                margin: 10px auto;
                text-align: center;
                width: 100%;
                max-width: 500px;
            }
            .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
            }
            .highcharts-data-table th {
                font-weight: 600;
                padding: 0.5em;
            }
            .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
                padding: 0.5em;
            }
            .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
            }
            .highcharts-data-table tr:hover {
                background: #f1f7ff;
            }
            /*End HighChart*/
            .content{
                min-height: 510px;
            }
            .slider-height{
                height: 300px;
            }

            .carousel-caption {
                position: absolute;
                right: 15%;
                bottom: 20px;
                left: 15%;
                z-index: 10;
                padding-top: 20px;
                padding-bottom: 20px;
                color: #fff;
                text-align: center;
                text-shadow: 0 1px 2px rgb(0 0 0 / 60%);
                background-color: rgb(0 0 0 / 50%);
            }
            .trending-product-item{
                float:left;
                margin:5px;
            }
            .trending-product-item img{
                height:100px;
                width:120px;
            }
            .footer{
                background-color: #F8F8F8; 
                font-weight: bold;
                line-height: 30px;
            }
            .product-details img{
                height:300px;
                width: 300px;
                float:left;
                margin:5px;
            }
            .product-name{
                font-size: 15px;
                text-align: center;
            }
            .search-box{
                width:350px !important;
            }
            .search-page img{
                height:80px;
                width:100px;
            }
            .media{
                color: #337ab7;
            }
            .media:hover{
                color: #92c4f0;
            }
            .dashboard .bg-success{
                background-color: #008548;
            }
            .dashboard .bg-success-light{
                background-color: #00A65A;
            }
            .dashboard .bg-info{
                background-color: #2A6384;
            }
            .dashboard .bg-info-light{
                background-color: #357CA5;
            }
            .dashboard .bg-warning{
                background-color: #C27D0E;
            }
            .dashboard .bg-warning-light{
                background-color: #F39C12;
            }
            .dashboard .bg-danger{
                background-color: #AD164D;
            }
            .dashboard .bg-danger-light{
                background-color: #D81B60;
            }
            .box{
                width: 100%;
                min-height: 90px;
                color: white;
                border-radius: 5px;
            }
            .box:hover{
                color:black;
            }
            .box-icon{
                width: 90px;
                min-height: 90px;
                font-size: 55px;
                text-align: center;
                float:left;
                line-height: 90px;
                border-radius: 5px 0 0 5px;
            }
            .box-number{
                font-size: 32px;
                font-weight: bold;
                text-align: center;
            }
            .box-text{
                font-size: 23px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{View::make('layout.header')}}
                    @yield('content')
                    {{View::make('layout.footer')}}
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{url('bootstrap/js/bootstrap.js')}}"></script>
        <script>
$("#btn").click(function () {
    alert('button clicked');
});
        </script>
        @yield('additionalScript')
    </body>
</html>