@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-ofsset-md-2">
                <div class="table">
                    <table class="table-responsive">
                        <thead>
                            <th></th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if(count($product->images) > 0)
                                        {{$product->images[0]->url}}
                                            <img width="30px" src="{{asset('storage/images/' . $product->images[0]->url)}}" alt="">
                                        @else
                                            <img width="30px" src="{{asset('storage/images/img.png')}}" alt="">
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection