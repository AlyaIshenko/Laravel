@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <h3 class="text-center">{{__($product->title)}}</h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        @if(Storage::has($product->thumbnail))
        <img src="{{ Storage::url($product->thumbnail) }}" class="card-img-top" style="width: 200px; height: 300px; margin: 0 auto; display: block;">
        @endif
    </div>
    <div class="col-md-6">
        <p>Price: {{$product->getPrice()}}</p>
        <p>SKU: {{$product->SKU}}</p>
        <p>In-Stock: {{$product->in_stock}}</p>
        <hr>
        <div>
            <p>Product Category: <b>{{$product->category->name }}</b> </p>
        </div>

        @auth

        @endauth
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <h4>Description: </h4>
        <p>{{$product->description}}</p>
    </div>
</div>
</div>
<script>
    $(function() {
        $('#addStar').change('.star', function(e) {
            $(this).submit();
        });
    });
</script>
@endsection