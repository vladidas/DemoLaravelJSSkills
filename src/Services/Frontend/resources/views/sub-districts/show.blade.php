@extends('frontend::layouts.app')

@section('content')
    <?php /** @var \App\Data\Models\SubDistrict $item */ ?>

    <div class="d-flex show-page-section">
        <div class="sub-district-block">
            <div class="row h-100">
                <div class="container">

                    <div class="col-12 mx-auto col-sm-12 my-auto pb-4">
                        <h1 class="long-topic">{{ __('app.label.detail_sub_districts') }}</h1>
                    </div>

                    <div class="col-lg-6 col-md-12 col-lg-12 mx-auto my-auto shadow-sm p-0">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 mx-auto my-auto">
                                <div class="p-lg-5 bg-light">
                                    <table class="table table-borderless m-0 rounded">
                                        <tbody>
                                            @if($item->getMayorName())
                                                <tr>
                                                    <th>{{ __('app.item.mayor_name') }}</th>
                                                    <td>{{ $item->getMayorName() }}</td>
                                                </tr>
                                            @endif

                                            @if($item->getAddress())
                                                <tr>
                                                    <th>{{ __('app.item.address') }}</th>
                                                    <td>{{ $item->getAddress() }}</td>
                                                </tr>
                                            @endif

                                            @if($item->getPhone())
                                                <tr>
                                                    <th>{{ __('app.item.phone') }}</th>
                                                    <td>{{ $item->getPhone() }}</td>
                                                </tr>
                                            @endif

                                            @if($item->getFax())
                                                <tr>
                                                    <th>{{ __('app.item.fax') }}</th>
                                                    <td>{{ $item->getFax() }}</td>
                                                </tr>
                                            @endif

                                            @if($item->getEmail())
                                                <tr>
                                                    <th>{{ __('app.item.email') }}</th>
                                                    <td>{{ $item->getEmail() }}</td>
                                                </tr>
                                            @endif

                                            @if($item->getWebAddress())
                                                <tr>
                                                    <th>{{ __('app.item.web_address') }}</th>
                                                    <td>{{ $item->getWebAddress() }}</td>
                                                </tr>
                                            @endif

                                            @if($item->getLatLng())
                                                <tr>
                                                    <th>{{ __('app.item.coordinates') }}</th>
                                                    <td>{{ $item->getLatLng() }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mx-auto my-auto p-5">
                                <div class="row h-100 text-center">
                                    <div class="col-12 mx-auto col-sm-12 my-auto">
                                        <img src="{{ $item->getFirstImageThumbUrl() }}"
                                             class="logo-detail">
                                    </div>

                                    <div class="col-12 mx-auto col-sm-12 my-auto">
                                        <h2 class="name-detail pt-4">{{ $item->getName() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
