<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <ul aria-expanded="false">
                @if(auth()->user()->user_type==1)
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('patients.index')}}">Patient</a></li>
                <li><a href="{{route('doctors.index')}}">Doctor</a></li>
                <li><a href="{{route('generate.labReport')}}">Generate Lab Report</a></li>
                <li><a href="{{route('room.index')}}">Rooms</a></li>
                <li><a href="{{route('bed.index')}}">Beds</a></li>
                <li><a href="{{route('bed.booking')}}">Bed Booking</a></li>
                <li><a href="{{route('bed.reservations')}}">User Reservations</a></li>
                <li><a href="{{route('event.index')}}">Events</a></li>
                @elseif(auth()->user()->user_type==2)
                <li><a href="{{route('patients.index')}}">Patient</a></li>
                @else
                <li><a href="{{route('bed.booking')}}">Book a Bed</a></li>
                @endif
            </ul>
    </div>

</div>
