@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h3>Search List</h3>
        </div>
        <div class="col-md-12 search-page">
                @forelse($products as $product)
                <div class="media" onClick="window.location.href = '{{url('productDetails/'.$product['id'])}}'" onMouseOver="this.style.cursor='pointer'">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="{{$product['gallery']}}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{$product['name']}}</h4>
                        {{$product['description']}}
                    </div>
                </div>
                @empty
                <h3 class='text-danger'>Data Not Found</h3>
                @endforelse
        </div>
    </div>
</div>
@endsection