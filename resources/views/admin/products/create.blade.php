@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <h3 class="text-center">{{__('Create product')}}</h3>
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
            <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-lable text-md-right">{{__('Title')}}</label>
                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')}}" autocomplete="title" autofocus>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="SKU" class="col-md-4 col-form-lable text-md-right">{{__('SKU')}}</label>
                    <div class="col-md-6">
                        <input id="SKU" type="text" class="form-control @error('SKU') is-invalid @enderror" name="SKU" value="{{ old('SKU')}}" autocomplete="SKU" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-lable text-md-right">{{__('Price')}}</label>
                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')}}" autocomplete="price" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="discount" class="col-md-4 col-form-lable text-md-right">{{__('Discount')}}</label>
                    <div class="col-md-6">
                        <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount')}}" autocomplete="discount" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="in_stock" class="col-md-4 col-form-lable text-md-right">{{__('In Stock (Quantity)')}}</label>
                    <div class="col-md-6">
                        <input id="in_stock" type="text" class="form-control @error('in_stock') is-invalid @enderror" name="in_stock" value="{{ old('in_stock')}}" autocomplete="in_stock" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-lable text-md-right">{{__('Description')}}</label>
                    <div class="col-md-6">
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="short_description" class="col-md-4 col-form-lable text-md-right">{{__('Short_description')}}</label>
                    <div class="col-md-6">
                        <textarea name="short_description" id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" cols="30" rows="10">{{ old('short_description')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categories" class="col-md-4 col-form-lable text-md-right">{{__('Categories')}}</label>
                    <div class="col-md-6">
                        <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" multiple>
                            @foreach($categories as $category)
                            <option value="{{$category['id']}}"> {{$category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="thumbnail" class="col-md-4 col-form-lable text-md-right">{{__('Thumbnail')}}</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="#" alt="" id="thumbnail-preview">
                            </div>
                            <div class="col-md-12">
                                <input type="file" name="thumbnail" id="thumbnail">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="images" class="col-md-4 col-form-lable text-md-right">{{__('Images')}}</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row images-wrapper"></div>
                            </div>
                            <div class="col-md-12">
                                <input type="file" name="images[]" id="images" onChange="readMultiFiles" multiple>
                            </div>
                        </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    if (window.FileReader) {
        document.getElementById("images").onchange = function() {
            let counter = -1,
                file;
            $('.images-wrapper').html('');
            let template = `<div class="col-sm-12 d-flex justify-content-center align-items-center">
                                  <img src="__url__" class="card-img-top" style="max-width: 80%; margin: 0 auto; display: block;">
                                </div>`;
            while (file = this.files[++counter]) {
                let reader = new FileReader();
                reader.onloadend = (function() {
                    return function() {
                        let img = template.replace('__url__', this.result);
                        $('.images-wrapper').append(img)
                    }
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }
    $(document).ready(function(e) {
        $('#thumbnail').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#thumbnail-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection