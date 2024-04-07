@extends('Dashboard.layouts.master')
@section('title')
    {{trans('main-sidebar_trans.Single_service')}}
@stop
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Services.services')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Services.single_service')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.message_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{trans('Services.add_service')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> {{trans('Services.name')}}</th>
                                <th> {{trans('Services.price')}}</th>
                                <th> {{trans('Services.status')}}</th>
                                <th> {{trans('Services.description')}}</th>
                                <th>{{trans('Services.created_at')}}</th>
                                <th>{{trans('Services.operations')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->price}}</td>
                                    <td>
                                        <div
                                            class="dot-label bg-{{$service->status == 1 ? 'success':'danger'}} ml-1"></div>
                                        {{$service->status == 1 ? trans('doctors.Enabled'):trans('doctors.Not_enabled')}}
                                    </td>
                                    <td> {{ Str::limit($service->description, 50) }}</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-toggle="modal" href="#edit{{$service->id}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-toggle="modal" href="#delete{{$service->id}}"><i
                                                class="las la-trash"></i></a>
                                    </td>
                                </tr>

                                @include('Dashboard.Services.Single_Service.edit')
                                @include('Dashboard.Services.Single_Service.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.Services.Single_Service.create')
    <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
   
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection