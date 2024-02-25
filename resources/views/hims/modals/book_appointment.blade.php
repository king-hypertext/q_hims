<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<!-- The Modal -->
<div class="modal fade" id="book_appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable  modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase ">book appointment</h4>
                <button title="exit" type="button" data-bs-toggle="button" class="btn btn-outline-danger"
                    data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        col
                    </div>
                    <div class="col-sm-6">
                        col
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-bs-toggle="button" type="button" class="btn btn-primary disabled "
                    title="Book appointment for this patient">Add New Visit</button>
                <a href="{{ route('add_patient') }}" target="_blank" rel="noopener noreferrer" type="button"
                    class="btn btn-warning " title="Add new patient">Add New Patient</a>
                <button data-bs-toggle="button" type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close Modal" title="Close appointment">Discard</button>
            </div>

        </div>
    </div>
</div>
