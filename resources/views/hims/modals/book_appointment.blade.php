<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<!-- The Modal -->
<div class="modal fade" id="book_appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" style="">
    <div class="modal-dialog modal-dialog-scrollable  modal-lg">
        <div class="modal-content" style="min-height: 500px">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase ">book appointment</h4>
                <button type="button" title="exit" type="button" data-bs-toggle="button" class="btn btn-outline-danger"
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
                                    <input type="text" onfocus="this.select()" name="p_opd_no" id="p_opd_no"
                                        class="form-control" />
                                    <label for="p_opd_no" class="form-label">OPD Number</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="searchPatientByOPDNumber()"
                                    class="btn btn-outline-secondary py-2" title="Search Patient"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                        {{-- search patient by name --}}
                        <div class="row mb-3 ">
                            <div class="col-sm-10">
                                <div class="form-outline">
                                    <input type="text" onfocus="this.select()" name="p_name" id="p_name"
                                        class="form-control" />
                                    <label for="p_name" class="form-label">Patient Name</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="searchByPatientName()"
                                    class="btn btn-outline-secondary py-2" title="Search Patient"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                        {{-- search patient by phone --}}
                        <div class="row mb-3 ">
                            <div class="col-sm-10">
                                <div class="form-outline">
                                    <input type="text" onfocus="this.select()" name="p_phone" id="p_phone"
                                        class="form-control" />
                                    <label for="p_phone" class="form-label">Patient Phone Number</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="searchPatientByPhone()"
                                    class="btn btn-outline-secondary py-2" title="Search Patient"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <h6 class="h6">Search Results</h6>
                            <div class="card border-0" style="max-height: 220px;">
                                <div class="card-body py-0 overflow-y-auto">
                                    <!-- Some borders are removed -->
                                    <ul id="searched-list" class="nav list-group list-group-flush user-select-none ">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row mb-2">
                            <h5 class="h5">Patient Appointment Info.</h5>
                        </div>
                        <form id="appointment-form" method="post">
                            @csrf
                            Patient OPD_no: <input readonly type="text" name="opd_number" id="opd_number">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="f_name">first name(s):</label>
                                    <input readonly type="text" name="f_name" id="f_name" />
                                    <label for="age">Age:</label>
                                    <input readonly type="number" name="age" id="age" />
                                    <label for="visit_no">Visit No</label>
                                    <input readonly type="number" name="visit_no" id="visit_no" value="" />
                                </div>
                                <div class="col-sm-6">
                                    <label for="l_name">last name(s):</label>
                                    <input readonly type="text" name="l_name" id="l_name" />
                                    <label for="time">Time:</label>
                                    <input type="text" class="timepicker" value="{{ Date('H:i') }}" name="time"
                                        id="time" />
                                    <label for="date">Date</label>
                                    <input type="text" name="date" class="datepicker" id="date"
                                        value="{{ Date('Y-m-d') }}" />
                                </div>
                            </div>
                            {{-- <button class="btn btn-primary">Add New Visit</button> --}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-toggle="button" id="book-appointment" class="btn btn-primary disabled "
                    title="Book appointment for this patient">Add New Visit</button>
                <a href="{{ route('add_patient') }}" target="_blank" rel="noopener noreferrer" type="button"
                    class="btn btn-warning " title="Add new patient">Add New Patient</a>
                <button type="button" data-bs-toggle="button" type="button" class="btn btn-danger"
                    data-bs-dismiss="modal" aria-label="Close Modal" title="Close appointment">Discard</button>
            </div>
        </div>
    </div>
</div>
<style>
    input:read-only {
        cursor: default;
        background-color: rgb(242, 242, 242);
        border: 1px solid #878686;
    }
</style>
<script>
    function searchPatientByOPDNumber() {
        var input = $('#p_opd_no');
        $('ul#searched-list').empty();
        $('#book-appointment').addClass('disabled');
        if (!input.val()) {
            input.focus();
        } else {
            $.ajax({
                url: "/patient/" + input.val().toString().toUpperCase(),
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function (data) {
                    var li;
                    if (!data.failed) {
                        data.data.forEach(d => {
                            console.log(d);
                            li = `<li class="list-group-item p-0">` +
                                `<a type="button" onclick="fillApp(event)" class="nav-link p-0" data-opd_no="${d.opd_no}">` +
                                d.first_name + " " + d.last_name +
                                `</a>` +
                                `</li>`;
                            console.log(li);
                            $('ul#searched-list').append(li);
                        });
                    }
                    if (data.failed) {
                        $('ul#searched-list').append($('<div class="text-center text-dark">Empty results</div>'))
                    }
                    console.log(data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    }

    function searchByPatientName() {
        var input = $('#p_name');
        $('ul#searched-list').empty();
        $('#book-appointment').addClass('disabled');
        if (!input.val()) {
            input.focus();
        } else {
            $.ajax({
                url: "/search-patient/name/" + input.val().toString().toLowerCase(),
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function (data) {
                    var li;
                    if (!data.failed) {
                        data.data.forEach(d => {
                            console.log(d);
                            li = `<li class="list-group-item p-0">` +
                                `<a type="button" onclick="fillApp(event)" class="nav-link p-0" data-opd_no="${d.opd_no}">` +
                                d.first_name + " " + d.last_name +
                                `</a>` +
                                `</li>`;
                            console.log(li);
                            $('ul#searched-list').append(li);
                        });
                    }
                    if (data.failed) {
                        $('ul#searched-list').append($('<div class="text-center text-dark">Empty results</div>'))
                    }
                },
                error: function (err) {

                }
            });
        }
    }

    function searchPatientByPhone() {
        var input = $('#p_phone');
        $('ul#searched-list').empty();
        $('#book-appointment').addClass('disabled');
        if (!input.val()) {
            input.focus();
        } else {
            $.ajax({
                url: "/search-patient/phone/" + input.val(),
                data: {
                    _token: "{{ csrf_token() }}",

                },
                success: function (data) {
                    var li;
                    if (!data.failed) {
                        data.data.forEach(d => {
                            console.log(d);
                            li = `<li class="list-group-item p-0">` +
                                `<a type="button" onclick="fillApp(event)" class="nav-link p-0" data-opd_no="${d.opd_no}">` +
                                d.first_name + " " + d.last_name +
                                `</a>` +
                                `</li>`;
                            console.log(li);
                            $('ul#searched-list').append(li);
                        });
                    }
                    if (data.failed) {
                        $('ul#searched-list').append($('<div class="text-center text-dark">Empty results</div>'))
                    }
                },
                error: function (err) {

                }
            });
        }
    }

    $(document).ready(function () {
        $("#p_name").keypress(function (e) {
            if (!isNaN(String.fromCharCode(e.which))) {
                e.preventDefault();
            }
        });
        $("#p_phone").keypress(function (e) {
            if (isNaN(String.fromCharCode(e.which))) {
                e.preventDefault();
            }
        });

        $('input.timepicker').timepicker({
            currentTime: moment(),
            timeFormat: 'h:mm',
            interval: 30,
        });
    });
    function fillApp(target) {
        var $uuid = target.target.dataset.opd_no;
        $('#book-appointment').removeClass('disabled');
        $.ajax({
            url: "/patient/" + $uuid,
            type: 'GET',
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data);
                $('input[name="f_name"]').val(data.data[0].first_name);
                $('input[name="l_name"]').val(data.data[0].last_name);
                $('input[name="visit_no"]').val(1);
                $('input[name="opd_number"]').val(data.data[0].opd_no);
                $('input[name="age"]').val(calculateAge(data.data[0].date_of_birth));
            }
        });
    }

    $('#book-appointment').on('click', function () {
        var form = $('form#appointment-form').serialize();
        $.ajax({
            url: "/book_appointment",
            type: 'POST',
            data: form,
            success: function (data) {
                if (data.success) {
                    console.log(data);
                    window.open(data.url, '_self');
                }
            },
            cache: false,
            error: function (err) {
                console.log(err, err.responseJSON.message);
                // $('.error-msg').text(error.responseJSON.message);
                // $('.error-msg').show();
                // setTimeout(() => {
                //     $('.error-msg').hide();
                // }, 3000);
            }
        });
    });
    // });

    function calculateAge(birthdate) {
        var today = new Date();
        var birthDate = new Date(birthdate);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
</script>