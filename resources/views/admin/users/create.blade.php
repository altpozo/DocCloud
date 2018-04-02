@extends('admin.layouts.layout')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crear Usuario</h3>
            <a
                    href="{{ route('admin.users.index') }}"
                    class="btn btn-primary pull-right"
            >
                Volver
            </a>
        </div>
        <div class="box-body">
            {!! Form::open(['action' => 'Admin\UsersController@store', 'method' => 'POST']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="">Nombre del usuario</label>
                <input type="text" name="name" class="form-control"

                       placeholder="Escribe el nombre del usuario">
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="">Email del usuario</label>
                <input type="text" name="email" class="form-control"

                       placeholder="Escribe el email del usuario">
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="">Password del usuario</label>
                <input type="password" name="password" class="form-control"

                       placeholder="Escribe el password del usuario">

                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                <label for="">Rol</label>
                <select name="role" class="form-control select2">
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}"
                        >{{ $rol->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('role', '<span class="help-block">:message</span>') !!}
            </div>
            {{ Form::bsSubmit('Crear', ['class'=>'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection