@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('add_event', $event ? $event : null ) }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="tab-content panel m-t-20">
            <div class="tab-pane slide-left active">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-group-default required {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ data_get($event, 'name', old('name')) }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <button class="btn btn-block btn-success js-salvar" type="submit" data-loading-text="Aguarde...">Salvar</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('admin.event') }}" class="btn btn-block btn-default "><span>Voltar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
