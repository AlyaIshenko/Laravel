@extends('layouts.app')
@section('content')
<!-- <p>All Orders</p> -->


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center">{{__('All Orders')}}</h3>
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
                        <th class="text-center" scope="col">surname</th>
                        <th class="text-center" scope="col">phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="text-center" scope="col">{{$order->id}}</td>
                        <td class="text-center" scope="col">{{$order->name }}</td>
                        <td class="text-center" scope="col">{{$order->surname}}</td>
                        <td class="text-center" scope="col">{{$order->phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-8 m-auto">
                {{$orders->links()}}
            </div>
        </div>
    </div>
</div>
@endsection