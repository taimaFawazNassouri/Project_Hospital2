@extends('Dashboard.layouts.master')
@section('css')
@livewireStyles
@endsection
@section('title')
{{trans('Invoices.invoice_groupService')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{trans('Invoices.invoices')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">{{trans('Invoices.invoice_groupService')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <livewire:group-invoices /> 

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@livewireScripts
@endsection