@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center">{{__('All Categories')}}</h3>
        </div>

        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status')}}
            </div>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table align-self-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">name</th>
                        <th class="text-center" scope="col">description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="text-center" scope="col">{{$category->id}}</td>
                        <td class="text-center" scope="col">{{$category->name }}</td>
                        <td class="text-center" scope="col">{{$category->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection