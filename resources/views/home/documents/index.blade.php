@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    @php(\Jenssegers\Date\Date::setLocale('es'))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mis Documentos</h4>
                    <h6 class="card-subtitle">Puedes exportar esta a lista a los siguientes formatos:</h6>
                    <a href="{{ url('subscribe/paypal') }}"><img src="/images/paypal-btn.png"></a>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                    <tr>

                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                        <th>Fecha de creacion</th>
                        <th>Editar</th>
                        <th>Descargar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documents as $document)
                    <tr>

                        <td><a href="{{route('showFile', $document->id)}}">{{$document->name}}</a></td>
                        <td>{{substr($document->description,0,100)}}@if(strlen($document->description) > 100)...@endif</td>
                        <td>{{isset($document->category->name) ? $document->category->name : ''}}</td>
                        <td><span class="badge badge-warning">{{isset($document->extension->name) ? $document->extension->name : ''}}</span></td>
                        <td>{{Jenssegers\Date\Date::make($document->created_at)->format(' d\ F Y H:i')}}</td>
                        <td><a href="{{route('documents.edit', $document)}}"><img src="/images/if_edit_3218.png" style="margin: 25%;"></a></td>
                        <td class="align-content-md-around"><a class="" href="{{route('downloadFile', $document)}}"><img style="height: 37px; width: 37px; margin: 15%; margin-right: 33%;" src="/ElaAdmin/icons/down.svg"></a></td>

                    </tr>
                    @endforeach


                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

    <script src="/ElaAdmin/js/lib/datatables/datatables.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="/ElaAdmin/js/lib/datatables/datatables-init.js"></script>

@endpush
