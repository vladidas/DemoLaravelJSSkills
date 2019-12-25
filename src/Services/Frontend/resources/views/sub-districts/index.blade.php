@extends('frontend::layouts.app')

@section('content')
    <div class="d-flex">
        <div class="sub-districts-form">
            <div class="row h-100">
                <div class="col-8 mx-auto col-sm-8 my-auto">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 mx-auto my-auto p-0">
                            {!! Form::open() !!}
                                <div class="form-group">

                                    {!! Form::label('name', __('app.label.search_sub_districts')) !!}

                                    <div class="col-lg-10 col-md-10 col-sm-10 mx-auto my-auto p-0">
                                        {!! Form::text('sub-district-name', null, [
                                           'id'           => 'name',
                                           'class'        => 'form-control shadow p-3 bg-white rounded pl-4',
                                           'placeholder'  => __('app.field.enter_name'),
                                           'autocomplete' => 'off'
                                       ]) !!}

                                        <div id="dropdown-menu"
                                             class="dropdown-menu float-none position-relative"
                                        ></div>
                                    </div>

                                </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
