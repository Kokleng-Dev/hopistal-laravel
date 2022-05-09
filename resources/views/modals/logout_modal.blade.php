<!-- Modal -->
<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="logout_modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logout_modal">ចាកចេញ</h5>
          <button id="btnQuite" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            តើលោក រឺ លោកស្រី​ ចង់ចាកចេញមែនទេ?
        </div>
        <div class="modal-footer">
          <button id="btnLogout" type="button" class="btn btn-danger" data-bs-dismiss="modal">ទេ</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                បាទ / ចាស
                            </a>
        </div>
      </div>
    </div>
</div>