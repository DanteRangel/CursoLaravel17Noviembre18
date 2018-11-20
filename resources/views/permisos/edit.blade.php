@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form action="{{url('permisos/'.$permiso->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group ">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control {{$errors->has('name')?' is-invalid':''}}" value="{{old('name', $permiso->name)}}">
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $message)
                        <span class="invalid-feedback">{{$message}}</span>
                    @endforeach
                @endif
            </div>
            <input type="submit" class="btn btn-success" value="Enviar">
        </form>
    </div>
</div>
@endsection