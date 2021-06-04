@extends('layout.master')
@section('content')
<div class="content">
    <div class="row dashboard">
        <div class="col-md-3">
            <div class="box bg-warning" onclick="location.replace('/products')" onmouseover="this.style.cursor='pointer'">
                <div class="box-icon bg-warning-light">
                    <i class="fab fa-product-hunt"></i>
                </div>
                <div class="box-number">
                    {{$data['products']}}
                </div>
                <div class="box-text">
                    Products
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box bg-success">
                <div class="box-icon bg-success-light">
                    <i class="fas fa-users"></i>
                </div>
                <div class="box-number">
                    {{$data['users']}}
                </div>
                <div class="box-text">
                    Users
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box bg-info">
                <div class="box-icon bg-info-light">
                    <i class="far fa-check-square"></i>
                </div>
                <div class="box-number">
                    {{$data['totalSales']['total']}}
                </div>
                <div class="box-text">
                    Total Sale
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box bg-danger">
                <div class="box-icon bg-danger-light">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
                <div class="box-number">
                    {{$data['orders']}}
                </div>
                <div class="box-text">
                    Orders
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additionalScript')
<script>    
            @php
            $date_name="";
            $sale="";
            @endphp
            @foreach($data['chartData'] as $dt)
            @php
            $date_name=$date_name.$dt->order_date.', ';
            $sale=$sale.$dt->total_sale.', ';
            @endphp
            @endforeach
            Highcharts.chart('container', {
                title: {
                    text: 'Date wise amount of sale'
                },
                subtitle: {
                    text: null
                },
                yAxis: {
                    title: {
                        text: 'Amount of Sale'
                    }
                },
                xAxis: {
                    categories: [
                        {{$date_name}}
                    ]
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                        name: 'Sale',
                        data: [{{$sale}}]
                    }],
            });
        </script>
@endsection