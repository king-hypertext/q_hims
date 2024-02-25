<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
<aside class="app-navigation">
    <h5 class="text-center mt-2 fw-medium text-uppercase">{{ env('APP_NAME') }}</h5>
    <ul class="nav flex-column">
        <li class="nav-item text-capitalize d-inline">
            <a class="nav-link {{ Request::segment(1) === '' ? 'active' : '' }}" href="#">dashboard
                <i class="float-end my-1 fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === '' ? 'active' : '' }}" href="#">Link
                <i class="float-end my-1 fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === 'appointments' ? 'active' : '' }}" href="{{ url('/appointments') }}">View
                Appointments
                <i class="float-end my-1 fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === '' ? 'active' : '' }}" href="#" data-bs-toggle="modal"
                data-bs-target="#book_appointment">Book
                Appointment
                <i class="float-end my-1 fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</aside>
