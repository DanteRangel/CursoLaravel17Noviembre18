@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form action="{{url('product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control {{$errors->has('name')?' is-invalid':''}}">
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" value="{{old('description')}}" id="description" class="form-control {{$errors->has('description') ? 'is-invalid': '' }}">
                     @if($errors->has('description'))
                        @foreach($errors->get('description') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" name="price" value="{{old('price')}}" id="price" class="form-control {{$errors->has('price') ? 'is-invalid': '' }}">
                     @if($errors->has('price'))
                        @foreach($errors->get('price') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" value="{{old('stock')}}" id="stock" class="form-control {{$errors->has('stock') ? 'is-invalid': '' }}">
                     @if($errors->has('stock'))
                        @foreach($errors->get('stock') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="stock">Marca</label>
                    <select class="form-control {{$errors->has('id_brand') ? 'is-invalid': '' }}" name="id_brand" value="{{old('id_brand')}}" id="id_brand">
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_brand'))
                        @foreach($errors->get('id_brand') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="stock">Categoria</label>
                    <select class="form-control {{$errors->has('id_category') ? 'is-invalid': '' }}" name="id_category" value="{{old('id_category')}}" id="id_category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_category'))
                        @foreach($errors->get('id_category') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="file">Imagen</label>
                    <input class="form-control {{$errors->has('image') ? 'is-invalid': '' }}" type="file" name="image" id="image" accept="image/*">
                    @if($errors->has('image'))
                        @foreach($errors->get('image') as $message)
                            <span class="invalid-feedback">{{$message}}</span>
                        @endforeach
                    @endif

                </div>
                <button class="btn btn-info" type="submit">Guardar</button>
            </form>
        </div>
    </div>
@endsection