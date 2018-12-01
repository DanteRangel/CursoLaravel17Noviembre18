@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form action="{{url('product')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control">
                </div>
                <div class="form-group">
                    <label for="stock">Marca</label>
                    <select class="form-control" name="id_brand" id="id_brand">
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Categoria</label>
                    <select class="form-control" name="id_category" id="id_category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            </form>
        </div>
    </div>
@endsection