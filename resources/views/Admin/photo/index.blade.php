@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('photo') }}
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
                                        <th>Photo</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($listPhotos as $photo )
                                        <tr>
                                            <td>
                                                <img src="{{ asset('img/fakeuser.jpeg') }}" style="width: 80px;">
                                            </td>
                                            <td>{{ $photo->code }}</td>
                                            <td>{{ $photo->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.photo.edit', $photo->id) }}" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:" onclick="verConfirm('{{ route('admin.photo.delete', $photo->id) }}');" rel="tooltip" title="Excluir" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No records found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="pull-left">
                            {{ $listPhotos->total() }} registro(s)
                        </div>
                        <div class="pull-right">
                            {{ $listPhotos->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
