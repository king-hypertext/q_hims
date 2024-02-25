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
    </style>
    <div class="container mb-4" style="max-width: calc(100% - 300px); float: left">
        <h2>Add Patient Form</h2>
        <form autocomplete="off" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="pid">OPD No:</label>
                <div class="col-md-10">
                    <input required readonly type="text" class="form-control" id="pid" name="pid">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="fname">First Name:</label>
                <div class="col-md-10">
                    <input required autofocus type="text" class="form-control" id="fname" name="fname">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="lname">Last Name:</label>
                <div class="col-md-10">
                    <input required type="text" class="form-control" id="lname" name="lname">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="dob">Date of Birth:</label>
                <div class="col-md-10">
                    <input required type="text" class="form-control date-input" id="dob" name="dob">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="phone">Phone Number:</label>
                <div class="col-md-10">
                    <input required type="tel" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="email">Email:</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="resident_address">Residential Address:</label>
                <div class="col-md-10">
                    <textarea required class="form-control" id="resident_address" name="resident_address" rows="3"></textarea>
                </div>
            </div>
            <div class="divider text-start">
                <div class="divider-text">
                    <h6 class="h6">Emergency Contact</h6>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="em_cont_firstname">First Name:</label>
                <div class="col-md-10">
                    <input required type="text" class="form-control" id="em_cont_firstname" name="em_cont_firstname">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="em_cont_lastname">Last Name:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="em_cont_lastname" name="em_cont_lastname">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="phone">Phone Number:</label>
                <div class="col-md-10">
                    <input required type="tel" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label" for="em_cont_relation">Relationship</label>
                <div class="col-md-8">
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
                <label class="col-md-2 col-form-label" for="em_cont_address">Residential Address:</label>
                <div class="col-md-10">
                    <textarea required class="form-control" id="em_cont_address" name="em_cont_address" rows="3"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-check">
                    <label class="form-check-label text-primary user-select-none" for="is_staff">
                        is Staff Patient?
                    </label>
                    <input class="form-check-input" onchange="showInput(this)" type="checkbox" name="is_staff"
                        value="1" id="is_staff" />
                </div>
            </div>
            <div class="row mb-3" id="row_staff_id" style="display: none">
                <label class="col-md-2 col-form-label" for="em_cont_address">Enter Staff Id:</label>
                <div class="col-md-10">
                    <input required class="form-control" type="text" name="staff_id"
                        onblur="checkStaffId(this.value)" id="input_staff_id"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
        </form>
    </div>
    <script>
        const showInput = (e) => {
            var staff_id_input = $('#row_staff_id');
            e && e.checked ? staff_id_input.show() : staff_id_input.hide();
        }
        const checkStaffId = (e) => {
            // alert('id')
        }
    </script>
@endsection
