@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('event') }}
@endsection

@section('content')
    <div class="container-fluid">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
            <div class="panel-body">
                <form action="">
                    <div class="row">

                        <div class="col-md-3 m-t-20">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
                        </div>

                        <div class="col-md-1 m-t-20">
                            <button id="limparCampos" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12 m-t-15">
                        <div class="table-responsive">
                            <table class="table table-striped" id="lista">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($listEvents as $event )
                                        <tr>
                                            <td>{{ $event->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:" onclick="verConfirm('{{ route('admin.event.delete', $event->id) }}');" rel="tooltip" title="Excluir" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">No records found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="pull-left">
                            {{ $listEvents->total() }} registro(s)
                        </div>
                        <div class="pull-right">
                            {{ $listEvents->links() }}
                        </div>

                        <div class="col-xs-1 col-xs-offset-11">
                            <div class="form-group">
                                <a href="{{ route('admin.event.add') }}" class="btn btn-complete btn-novo" style="color: #fff;border-radius: 100%;padding: 10px 15px;position: fixed;bottom: 10px;right: 10px;z-index: 999;">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
