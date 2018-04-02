@extends('admin.layouts.layout')


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Usuarios</h3>
            <a
                    href="{{route('admin.users.create')}}"
                    class="btn btn-primary pull-right"
            >
                Crear Usuario
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="users-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->getRoleNames()[0]}}</td>


                        <td>
                            <a href="" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>



                            <form action="{{route('admin.users.destroy', $user->id)}}"
                                  method="POST" style="display: inline">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button class="btn btn-xs btn-danger"
                                        onclick="return confirm('Seguro que quieres eliminar al usuario?')"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#users-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endpush