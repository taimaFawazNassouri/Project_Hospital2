<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/section.add_section')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('Sections.store')}}" method="post" autocomplete="off">
          @csrf
         <div class="modal-body">
         <label for="exmpleInputPssword1">{{trans('Dashboard/section.name')}}</label>
         <input type="text" name="name"  class="form-control" autocomplete="off">
         </div>
         <div class="modal-body">
          <label for="exmpleInputPssword1">{{trans('Dashboard/section.description')}}</label>
          <input type="text" name="description"  class="form-control" autocomplete="off">
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/section.close')}}</button>
        <button type="submit" class="btn btn-primary">{{trans('Dashboard/section.save')}}</button>
      </div>
      </form>
    </div>
  </div>
</div>