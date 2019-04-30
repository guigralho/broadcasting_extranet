@extends('Admin.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('add_photo', $photo ? $photo : null ) }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="tab-content panel m-t-20">
            <div class="tab-pane slide-left active">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        {{--@if ($photo)
                            @if ($photo->imagePath())--}}
                                <div class="col-sm-2 m-b-10">
                                    <img src="{{ asset('img/fakeuser.png') }}" class="img-thumbnail">
                                </div>
                            {{--@endif
                        @endif--}}

                        <div class="col-sm-2">
                            <div class="form-group form-group-default {{ $errors->has('code') ? 'error' : '' }}">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Code" value="{{ data_get($photo, 'code', old('code')) }}">

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group form-group-default {{ $errors->has('event_id') ? 'error' : '' }}">
                                <label>Event</label>
                                <input type="text" name="event_id" class="form-control" placeholder="Event" value="Congresso Internacional 2019 - São Paulo">

                                @if ($errors->has('event_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('event_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-group-default {{ $errors->has('photographer') ? 'error' : '' }}">
                                <label>Photographer</label>
                                <input type="text" name="photographer" class="form-control" placeholder="Photographer" value="João Silva">

                                @if ($errors->has('photographer'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photographer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group form-group-default {{ $errors->has('name') ? 'error' : '' }}">
                                <label>Model</label>
                                <input type="text" name="name" class="form-control" placeholder="Model" value="{{ data_get($photo, 'name', old('name')) }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{--<div class="col-sm-2">
                            <button class="btn btn-block btn-success js-salvar" type="submit" data-loading-text="Aguarde...">Salvar</button>
                        </div>--}}
                        <div class="col-sm-2">
                            <a href="{{ route('admin.photo') }}" class="btn btn-block btn-default "><span>Voltar</span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
