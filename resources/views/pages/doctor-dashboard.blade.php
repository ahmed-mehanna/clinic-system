@extends('components.app')
@section('content')
    <div class="doctor-dashboard-style">
        <div class="container-fluid">
            <x-patient-data :name="$userTurn->user->name" :id="$userTurn->user->id" :age="$userTurn->user->patient->age" />
            <x-patient-history :history="$userTurn->user" />
            <x-patient-clinic-history :patient-history="$userTurn->user" />
            <x-patient-form />
            <form id="patient-form" action="doctor" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $userTurn->user->id }}">
            </form>
            <button id="ajax-btn" type="button" class="btn btn-primary mt-5 ml-5" data-toggle="modal" data-target="#notification">Save</button>
            <button id="submit-btn" type="submit" form="patient-form" class="d-none"></button>
        </div>
    </div>
    @include('components.doctor-dashboard.notification')
    <script>
        let askForNextPatient = null, emptyTable = false;
        function getNextPatient() {
            $.ajax({
                url: '/next-patient/' + emptyTable,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                    emptyTable = true;
                    if (response === true) {
                        clearInterval(askForNextPatient)
                        $('#submit-btn').click()
                    }
                }
            })
        }

        $('#ajax-btn').on('click', function () {
            askForNextPatient = setInterval(getNextPatient, 500)
        })


    </script>
@endsection
