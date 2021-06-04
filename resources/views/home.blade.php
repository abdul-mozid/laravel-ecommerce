@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @php
                    $i=0
                    @endphp
                    @foreach($data as $row)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="<?php
                    if ($i == 0) {
                        echo 'active';
                    }
                    $i++;
                    ?>"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @php
                    $j=1
                    @endphp
                    @foreach($data as $row)
                    <div class="item <?php
                    if ($j == 1) {
                        echo 'active';
                    }
                    $j++;
                    ?>">
                        <img src="{{$row['gallery']}}" alt="{{$row['name']}}" style="height:430px;width:100%;">
                        <div class="carousel-caption">
                            <h4>{{$row['name']}}</h4>
                            <p>{{$row['description']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Trending Products</h3>
            <div class="trending-wrapper">
                @foreach($data as $row)
                <a href="{{url('productDetails/'.$row['id'])}}">
                    <div class="trending-product-item">
                        <img src="{{$row['gallery']}}" alt="{{$row['name']}}">
                        <div class="product-name">{{$row['name']}}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection