<!-- Modal -->
<div class="modal fade" id="import_excel_file" tabindex="-1" aria-labelledby="import_Ex" aria-hidden="true">
    <div class="modal-dialog">
    <form  action="{{route('employee.import')}}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="import_Ex">បញ្ចូលទិន្នន័យតាម File Excel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                        <a href="{{asset('assets/example.xlsx')}}" download>ទាញយកគំរូ</a>
                    
                </div>
                <div class="col-lg-12 col-md-12 mb-3">
                    <label for="import_excel" class="form-label">Import Excel</label>
                    <input id="import_excel" type="file" class="form-control" name="import_excel" required >
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
    </form>
    </div>
</div>