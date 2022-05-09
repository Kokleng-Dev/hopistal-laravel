<!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="delete_modal">លុបទិន្នន័យ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          តើលោក រឺ លោកស្រី​ ចង់លុបទិន្នន័យនេះមែនទេ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ទេ</button>
          <a href="{{route('employee.delete',$info->id)}}" type="button" class="btn btn-primary">បាទ / ចាស</a>
        </div>
      </div>
    </div>
</div>