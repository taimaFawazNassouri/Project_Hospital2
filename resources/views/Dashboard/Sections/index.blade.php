@extends('Dashboard.layouts.master')
<title>hello</title>
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/section.sections')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">{{trans('Dashboard/main-sidebar_trans.view all')}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.message_alert')
				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
								</div>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									{{ trans('Dashboard/section.add_section') }}
								</button>


							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
											<th class="wd-15p border-bottom-0">{{trans('Dashboard/section.number')}}</th>
												<th class="wd-15p border-bottom-0">{{trans('Dashboard/section.name')}}</th>
												<th class="wd-15p border-bottom-0">{{trans('Sections.description')}}</th>
												<th class="wd-20p border-bottom-0">{{trans('Dashboard/section.date')}}</th>
												<th class="wd-15p border-bottom-0"> {{trans('Dashboard/section.operations')}}</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($sections as $section )
											
											<tr>
											        <td>{{$loop->iteration}}</td>
										     	    <td><a href="{{route('Sections.show',$section->id)}}">{{$section->name}}</a></td>		
													<td>

														{{ \Str::limit($section->description, 50) }}
													</td>											
													<td>{{$section->created_at->diffForHumans()}}</td>
													<td>
															<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$section->id}}"><i class="las la-pen"></i></a>
															<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$section->id}}"><i class="las la-trash"></i></a>
													</td>
												</tr>
												@include('Dashboard.Sections.edit')
												@include('Dashboard.Sections.delete')
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
				@include('Dashboard.Sections.create')
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<!--Internal  Notify js -->
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}">
</script> <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection