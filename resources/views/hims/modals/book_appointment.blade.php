<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<!-- The Modal -->
<div class="modal show fade" id="book_appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" style="display: block">
    <div class="modal-dialog modal-dialog-scrollable  modal-lg">
        <div class="modal-content "style="min-height: 500px">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase ">book appointment</h4>
                <button title="exit" type="button" data-bs-toggle="button" class="btn btn-outline-danger"
                    data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row mb-2">
                            <h5 class="h5">Search Patient</h5>
                        </div>
                        {{-- search patient by opd_no --}}
                        <div class="row mb-3 ">
                            <div class="col-sm-10">
                                <div class="form-outline">
                                    <input type="text" name="p_opd_no" value="{{ @old('p_opd_no') }}" id="p_opd_no"
                                        class="form-control" />
                                    <label for="p_opd_no" class="form-label">Enter OPD Number</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-outline-secondary py-2" title="Search Patient"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                        {{-- search patient by name --}}
                        <div class="row mb-3 ">
                            <div class="col-sm-10">
                                <div class="form-outline">
                                    <input type="text" name="p_name" value="{{ @old('p_name') }}" id="p_name"
                                        class="form-control" />
                                    <label for="p_name" class="form-label">Enter Patient Name</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-outline-secondary py-2" title="Search Patient"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                        {{-- search patient by phone --}}
                        <div class="row mb-3 ">
                            <div class="col-sm-10">
                                <div class="form-outline">
                                    <input type="text" name="p_phone" value="{{ @old('p_phone') }}" id="p_phone"
                                        class="form-control" />
                                    <label for="p_phone" class="form-label">Enter Patient Phone Number</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-outline-secondary py-2" title="Search Patient"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row mb-2">
                            <h5 class="h5">Patient</h5>
                        </div>
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
<script>
    // $.ajax({
    //             url: "/patient/"+1,
    //             data: {
    //                 _token: "{{ csrf_token() }} "
    //             },
    //             success: function(data) {
    //                 if (data && data.success) {
    //                     console.log(data);
    //                     $('#pid').val(data.data);
    //                 }
    //             }
    //         });
</script>
