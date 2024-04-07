@extends('Dashboard.layouts.master')
@section('title')
    {{trans('main-sidebar_trans.Doctors')}}
@stop
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection


@section('page-header')
<style>
    .img{
        border-radius: 50%;
    }
</style>
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Doctors.Doctors')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('Doctors.view all')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.message_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                        <a href="{{route('Doctors.create')}}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('Doctors.add_doctor')}}</a>
                        <button type="button" class="btn btn-danger" id="btn_delete_all">{{trans('Doctors.delete_select')}}</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><input name="select_all"  id="example-select-all"  type="checkbox"/></th>
                                <th >{{trans('Doctors.photo')}}</th>
                                <th >{{trans('Doctors.name')}}</th>
                                <th >{{trans('Doctors.email')}}</th>
                                <th>{{trans('Doctors.section')}}</th>
                                <th >{{trans('Doctors.phone')}}</th>
                                <th >{{trans('Doctors.status')}}</th>
                                <th >{{trans('Doctors.appointments')}}</th>
                                <th>{{trans('Doctors.date')}}</th>
                                <th>{{trans('Doctors.processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                          @foreach($doctors as $doctor)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td><input type="checkbox" name="delete_select" value="{{$doctor->id}}" class="delete_select"></td>
                                  <td>
                                      @if ($doctor->image)
                                      
                                      <img class="img" src="{{Url::asset('Dashboard/img/doctors/'.$doctor->image->filename)}}" height="50px" width="50px"  alt="">
                                      
                                      @else
                                      
                                        <img src="{{Url::asset('Dashboard/img/doctor_default.jfif')}}"  height="50px" width="50px" alt="" >
                                      
                                          
                                      @endif
                                  </td>
                                  <td>{{ $doctor->name }}</td>
                                  <td>{{ $doctor->email }}</td>
                                  <td>{{ $doctor->section->name}}</td>
                                  <td>{{ $doctor->phone}}</td>
                                  <td>
                                      <div class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
                                      {{$doctor->status == 1 ? trans('Doctors.Enabled'):trans('Doctors.Not_enabled')}}
                                  </td>
                                  <td>
                                      @foreach ($doctor->doctorAppointments as $appointments)
                                      {{ $appointments->name }}
                                          
                                      @endforeach


                                  </td>

                                  <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                  <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('Doctors.processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('Doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;{{trans('Doctors.update data')}} </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;{{trans('Doctors.update password')}}  </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;{{trans('Doctors.update status')}} </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp; {{trans('Doctors.delete')}} </a>

                                        </div>
                                    </div>
                                  </td>
                              </tr>
                              @include('Dashboard.Doctors.delete')
                              @include('Dashboard.Doctors.delete_select')
                              @include('Dashboard.Doctors.update_status')
                              @include('Dashboard.Doctors.update_password')

                          @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
      <script>
            $(function() {
                jQuery("[name=select_all]").click(function(source) {
                    checkboxes = jQuery("[name=delete_select]");
                    for(var i in checkboxes){
                        checkboxes[i].checked = source.target.checked;
                    }
                });
            })
        </script>
           <script type="text/javascript">
            $(function () {
                $("#btn_delete_all").click(function () {
                    var selected = [];
                    $("#example input[name=delete_select]:checked").each(function () {
                        selected.push(this.value);
                    });
    
                    if (selected.length > 0) {
                        $('#delete_select').modal('show')
                        $('input[id="delete_select_id"]').val(selected);
                    }
                });
            });
        </script>
@endsection