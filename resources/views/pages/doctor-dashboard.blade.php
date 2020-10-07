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
            <button id="ajax-btn" type="button" class="btn btn-primary mt-5 ml-5">Save</button>
            <button id="submit-btn" type="submit" form="patient-form" class="d-none"></button>
            <button id="notification-btn" type="button" class="d-none" data-toggle="modal" data-target="#notification"></button>
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
        function validate() {
            let valid = true
            if ($('#illness').val() === '') {
                $('#illness-validate').css('visibility', 'visible')
                valid = false
            }
            if ($('#illness-diagnose').val() === '') {
                $('#illness-diagnose-validate').css('visibility', 'visible')
                valid = false
            }
            if (!valid)
                return valid
            for (let i = 0; i < numberOfAnalysis.length; i++) {
                let dataName = $('#title-' + numberOfAnalysis[i])
                let dataResult = $('#result-' + numberOfAnalysis[i])
                dataName.addClass('input-place-holder')
                dataResult.addClass('input-place-holder')
                if (dataName.val() === '') {
                    dataName.attr('placeholder', 'Required Or Remove Row')
                    valid = false
                }
                if (dataResult.val() === '') {
                    dataResult.attr('placeholder', 'Required Or Remove Row')
                    valid = false
                }
                if (numberOfAnalysis.length === 1) {
                    if (dataName.val() === '' && dataResult.val() !== '') {
                        dataName.attr('placeholder', 'Required')
                        valid = false
                    }
                    else if (dataResult.val() === '' && dataName.val() !== '') {
                        dataResult.attr('placeholder', 'Required')
                        valid = false
                    }
                    else if (dataName.val() === '' && dataResult.val() === '') {
                        $('#analysises').remove()
                        $('#patient-form').append('<input type="hidden" value="true" name="select-type-no-data" readonly>')
                    }
                }
            }
            //
            // for (let i = 0; i < numberOfDrugs.length; i++) {
            //     let dataName = $('#illness-data-name-' + numberOfDrugs[i])
            //     let dataResult = $('#illness-data-result-' + numberOfDrugs[i])
            //     dataName.addClass('input-place-holder')
            //     dataResult.addClass('input-place-holder')
            //     if (numberOfDrugs.length === 1) {
            //         if (dataName.val() === '' && dataResult.val() !== '')
            //             dataName.attr('placeholder', 'Required Or Remove Row')
            //         else if (dataResult.val() === '' && dataName.val() !== '')
            //             dataResult.attr('placeholder', 'Required Or Remove Row')
            //         // else
            //         //     $('#drugs').remove()
            //     }
            //     if (dataName.val() === '')
            //         dataName.attr('placeholder', 'Required Or Remove Row')
            //     if (dataResult.val() === '')
            //         dataResult.attr('placeholder', 'Required Or Remove Row')
            // }
            return valid
        }
        $('#ajax-btn').on('click', function () {
            // validate()
            if (validate())
                $('#submit-btn').click()
            // askForNextPatient = setInterval(getNextPatient, 500)
        })


    </script>
@endsection
