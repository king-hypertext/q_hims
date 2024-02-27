<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div>
@extends('app-layout.index')
@section('content')
<style>
    input,
    select,
    textarea {
        max-width: 400px !important;
    }

    @media (max-width: 768px) {

        input,
        select,
        textarea {
            min-width: 100% !important;
        }
    }
</style>
<div class="container mb-4" style="float: left">
    <h2>Add Patient Form</h2>
    <form id="add_patient" autocomplete="off" method="post" action="/add_patient">
        @csrf
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="pid">OPD No:</label>
            <div class="col-md-10 col-sm-8">
                <input required readonly type="text" value="{{ generatePatientID() }}" class="form-control" id="pid"
                    name="pid">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="fname">First Name:</label>
            <div class="col-md-10 col-sm-8">
                <input required autofocus type="text" class="form-control" id="fname" name="fname">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="lname">Last Name:</label>
            <div class="col-md-10 col-sm-8">
                <input required type="text" class="form-control" id="lname" name="lname">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="dob">Date of Birth:</label>
            <div class="col-md-10 col-sm-8">
                <input required type="text" class="form-control date-input" id="dob" name="dob">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="phone">Phone Number:</label>
            <div class="col-md-10 col-sm-8">
                <input required type="tel" onpaste="return false" pattern="\d*" title="Please enter only numbers [0-9]"
                    class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="email">Email:</label>
            <div class="col-md-10 col-sm-8">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="resident_address">Residential Address:</label>
            <div class="col-md-10 col-sm-8">
                <textarea required class="form-control" id="resident_address" name="resident_address"
                    rows="3"></textarea>
            </div>
        </div>
        <div class="divider text-start">
            <div class="divider-text">
                <h6 class="h6">Emergency Contact</h6>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="em_cont_firstname">First Name:</label>
            <div class="col-md-10 col-sm-8">
                <input required type="text" class="form-control" id="em_cont_firstname" name="em_cont_firstname">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="em_cont_lastname">Last Name:</label>
            <div class="col-md-10 col-sm-8">
                <input type="text" class="form-control" id="em_cont_lastname" name="em_cont_lastname">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="phone">Phone Number:</label>
            <div class="col-md-10 col-sm-8">
                <input required type="tel" onpaste="return false" pattern="\d*" maxlength="12"
                    title="Please enter only numbers [0-9]" class="form-control" id="em_cont_phone"
                    name="em_cont_phone">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="em_cont_relation">Relationship</label>
            <div class="col-md-10">
                <select required name="em_cont_relation" id="em_cont_relation" class="form-select text-capitalize ">
                    <option value="" selected>select</option>
                    <option value="father">father</option>
                    <option value="mother">mother</option>
                    <option value="son">son</option>
                    <option value="daughter">daughter</option>
                    <option value="sister">sister</option>
                    <option value="brother">brother</option>
                    <option value="friend">friend</option>
                    <option value="other">other</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-2 col-sm-4 col-form-label" for="em_cont_address">Residential Address:</label>
            <div class="col-md-10 col-sm-8">
                <textarea required class="form-control" id="em_cont_address" name="em_cont_address" rows="3"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-check">
                <label class="form-check-label text-primary user-select-none" for="is_staff">
                    is Staff Patient?
                </label>
                <input class="form-check-input" onchange="showInput(this)" type="checkbox" name="is_staff"
                    id="is_staff" />
            </div>
        </div>
        <div class="row mb-3" id="row_staff_id" style="display: none">
            <label class="col-md-2 col-sm-4 col-form-label" for="em_cont_address">Enter Staff Id:</label>
            <div class="col-md-10 col-sm-8">
                <input class="form-control" type="text" name="staff_id" id="input_staff_id" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
    </form>
</div>
<script>
    $(document).ready(function () {
        const showInput = (e) => {
            var staff_id_input = $('#row_staff_id');
            e && e.checked ? staff_id_input.show() : staff_id_input.hide();
        }
        const checkStaffId = (e) => {
            // alert('id')
        }
        $.each($('input,select'), function (index, target) {
            target.value.toString().toUpperCase();
        });
        $('form#add_patient').on('submit', function () {
            $.each($('input,select'), function (index, target) {
                target.value.toString().toUpperCase();
            });
            return true;
        })
    })
</script>
@endsection