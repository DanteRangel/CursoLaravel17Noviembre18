@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(Session::has('type'))
                    <div class="alert alert-{{Session::get('type')}}" role="alert">
                        <strong>Alerta!! </strong> {{Session::get('message')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pull-right">
                <a href="{{url('product/create')}}" class="btn btn-info" > Agregar producto </a>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-offset-2 col-md-8 ">
                <div class="table">
                    <table class="table-striped" style="width:100%">
                        <thead>
                            <th></th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Marca</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if(count($product->images) > 0)
                                            <img width="30px" src="{{asset('/storage/images/' . $product->images[0]->url)}}" alt="">
                                        @else
                                            <img width="30px" src="{{asset('/
                                            storage/images/img.png')}}" alt="">
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                    <a class="btn btn-info" href="{{route('product.edit',['id' => $product->id])}}">Editar</a>
                                    <form action="{{route('product.destroy', ['id' => $product->id])}}" method="POST">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger">Eliminar</button>
                                    </form> </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        setTimeout(() => {
            $(".alert").hide('slow');
        }, 3000);
    </script>
@endsection