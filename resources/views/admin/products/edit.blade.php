@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <h3 class="text-center">{{__($product->title)}}</h3>
            <hr>
        </div>
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-md-12">
            <form action="{{route('admin.products.update', $product)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-lable text-md-right">{{__('Title')}}</label>
                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" autocomplete="title" autofocus>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="SKU" class="col-md-4 col-form-lable text-md-right">{{__('SKU')}}</label>
                    <div class="col-md-6">
                        <input id="SKU" type="text" class="form-control @error('SKU') is-invalid @enderror" name="SKU" value="" autocomplete="SKU" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-lable text-md-right">{{__('Price')}}</label>
                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="" autocomplete="price" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="discount" class="col-md-4 col-form-lable text-md-right">{{__('Discount')}}</label>
                    <div class="col-md-6">
                        <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="0" autocomplete="discount" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="in_stock" class="col-md-4 col-form-lable text-md-right">{{__('In Stock (Quantity)')}}</label>
                    <div class="col-md-6">
                        <input id="in_stock" type="text" class="form-control @error('in_stock') is-invalid @enderror" name="in_stock" value="" autocomplete="in_stock" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-lable text-md-right">{{__('Description')}}</label>
                    <div class="col-md-6">
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="short_description" class="col-md-4 col-form-lable text-md-right">{{__('Short_description')}}</label>
                    <div class="col-md-6">
                        <textarea name="short_description" id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-md-4 col-form-lable text-md-right">{{__('Categories')}}</label>
                    <div class="col-md-6">
                        <select id="categories" class="form-control @error('categories') is-invalid @enderror" name="categories" multiple>
                            @foreach($categories as $category)
                            <option value="{{$category['id']}}"> {{$category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 text-righr">
                        <input type="submit" class="btn btn-info" value="Update Product">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection