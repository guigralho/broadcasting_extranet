@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('add_user', $photo ? $photo : null ) }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="tab-content panel m-t-20">
            <div class="tab-pane slide-left active">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group form-group-default {{ $errors->has('image') ? 'error' : '' }}">
                                <label>Photo</label>
                                <input type="file" name="image" data-ui-file-upload="true" value="{{ data_get($photo, 'image', old('image')) }}">

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        {{--@if ($photo)
                            @if ($photo->imagePath())--}}
                                <div class="col-sm-2 m-b-10">
                                    <img src="{{ asset('img/fakeuser.jpeg') }}" class="img-thumbnail">
                                </div>
                            {{--@endif
                        @endif--}}

                        <div class="col-sm-4">
                            <div class="form-group form-group-default required {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ data_get($photo, 'name', old('name')) }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group form-group-default required {{ $errors->has('code') ? 'error' : '' }}">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Code" value="{{ data_get($photo, 'code', old('code')) }}">

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('code') }}</strong>
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
                            <a href="{{ route('admin.photo') }}" class="btn btn-block btn-default "><span>Voltar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
