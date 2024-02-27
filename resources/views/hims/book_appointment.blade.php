<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
</div>
@php
use Carbon\Carbon;
@endphp
@extends('app-layout.index')
@section('content')
{{ request()->visit_no }}
<br>
{{ $patient }}
<div class="container-fluid">
    <ul class="nav nav-pills bg-dark-subtle " id="myTabs">
        <li class="nav-item">
            <a role="button" class="text-capitalize m-0 border-0 rounded-0 nav-link active " href="#tab1"
                data-toggle="tab">basic information</a>
        </li>
        <li class="nav-item">
            <a role="button" class="text-capitalize m-0 border-0 rounded-0 nav-link" href="#tab2"
                data-toggle="tab">contact
            </a>
        </li>
        <li class="nav-item">
            <a role="button" class="text-capitalize m-0 border-0 rounded-0 nav-link" href="#tab3" data-toggle="tab">
                edit patient
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <div class="row">
                <div class="col-sm-3">
                    <table class="table-borderless mt-2">
                        <tr>
                            <th>Patient OPD No:</th>
                        </tr>
                        <tr>
                            <th>Name:</th>
                        </tr>
                        <tr>
                            <th>Date of Birth: </th>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-9">
                    <table class="table-borderless mt-2">
                        <tr>
                            <td>{{ $patient->opd_no }}</td>
                        </tr>
                        <tr>
                            <td class="text-capitalize">{{ $patient->first_name . ' ' . $patient->last_name }}</td>
                        </tr>
                        <tr>
                            <td>{{ Carbon::parse($patient->date_of_birth)->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            </table>
        </div>
        <div class="tab-pane" id="tab2">
            <h4>Tab 2 Content</h4>
            <p>This is the content for Tab 2.</p>
        </div>
        <div class="tab-pane" id="tab3">
            <h4>Tab 3 Content</h4>
            <p>This is the content for Tab 3.</p>
        </div>
    </div>
</div>
<div class="container-fluid mt-3">
    <h5 class="h6 bg-dark-subtle p-2">
        Appointment Details
    </h5>
    <div class="row">
        <div class="col-sm-6">
            <div class="d-flex mb-3">
                <label for="inputEmail3" style="min-width: 100px" class="col-form-label fw-semibold text-black">Visit
                    No</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail3" value="{{ request()->visit_no }}">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="d-flex mb-3">
                <label for="inputEmail3" style="min-width: 100px" class="col-form-label fw-semibold text-black">Visit
                    Duration</label>
                <div class="col-sm-8">
                    <select name="app_duration" id="app_duration" class="form-control">
                        <option value="20">20 Minutes</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="d-flex mb-3">
                <label for="inputEmail3" style="min-width: 100px"
                    class="col-form-label fw-semibold text-black">Date</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" id="" value="{{ request()->app_date }}">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="d-flex mb-3">
                <label for="inputEmail3" style="min-width: 100px"
                    class="col-form-label fw-semibold text-black">Time</label>
                <div class="col-sm-8">
                    <input name="app_time" id="app_time" class="form-control timepicker"
                        value="{{ request()->app_time }}" />
                </div>
            </div>
        </div>
    </div>
    <form action="#" method="post">
        <div class="container">
            <h5 class="h6 bg-dark-subtle p-2">
                <div class="row">
                    <div class="col-4">Modality</div>
                    <div class="col-4">Study</div>
                    <div class="col-4">Doctor/Team</div>
                </div>
            </h5>
            @php
            $modality = [
            'data' => 'value1',
            'data' => 'value2',
            'data' => 'value3',
            ];
            @endphp
            <div class="row">
                <div class="modality-row">
                    <div class="row">
                        <div class="col-md-4">
                            <select id="modality" class="form-control" name="modality">
                                <option value="">Select Any</option>
                                {{-- @foreach ($modality as $data)
                                <option value="{{ $data->data }}">{{ $data->data }}</option>
                                @endforeach --}}
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="study" class="form-control" name="study">
                                <!-- Options for the second select input will be populated dynamically -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="doctor" class="form-control">
                                <option value="">Select doctor</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h5 class="h6 bg-dark-subtle p-2 mt-3">Miscellaneous</h5>
                <div class="d-flex justify-content-between ">
                    <div class="d-flex justify-content-between ">
                        <div class="mx-2">
                            <label for="form-label d-block">Misc</label>
                            <input type="text" class="form-control" style="max-width: 260px" name="misc" id="misc"
                                autocomplete placeholder="eg. Card + Folder" />
                        </div>
                        <div class="mx-2">
                            <label for="form-label d-block">Amount</label>
                            <input type="number" step="0.01" onfocus="this.select()" class="form-control"
                                style="max-width: 260px" name="misc_amount" id="misc_amount" value="0.00" />
                        </div>
                    </div>
                    <div class="service_charge">
                        <label for="charge">Total Charge: </label>
                        <input readonly type="number" class="form-control" name="charge" id="charge" value="0.00" />
                    </div>
                </div>
            </div>
            <hr class="hr">
            <div class="d-flex justify-content-between mt-2 mb-2">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</div>
{{-- @endsection --}}
{{-- @section('script') --}}
<script>
    var total = document.getElementById('charge');
    var modality_charge = 0;
    $(document).ready(function () {
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
        $('select#modality, select#study, select#doctor, select#app_duration').select2();
    });
    $('#misc_amount').on('keyup', function () {
        var misc_amt = $(this).val();
        total.value = + Number.parseInt(misc_amt);
        if (isNaN(total.value) || total.value == '') {
            total.value = "0.00";
        }
    });
    $('#modality').change(function () {
        var selectedValue = $(this).val();
        console.log($(this));
        // $.ajax({
        //     url: '/charges',
        //     type: 'POST',
        //     data: {
        //         _token: "{{ csrf_token() }}",
        //         modality: selectedValue
        //     },
        //     success: function (data) {
        //         total.val = +data.data[0].charge;
        //         console.log(data);
        //         var secondSelect = $('select#study');
        //         secondSelect.empty();
        //         $.each(data, function (key, value) {
        //             secondSelect.append('<option value="' + key + '">' + value +
        //                 '</option>');
        //         });
        //     }
        // });
    });
</script>
@endsection