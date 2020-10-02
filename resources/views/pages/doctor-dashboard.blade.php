@extends('components.app')
@section('content')
    <div class="doctor-dashboard-style">
        <div class="container-fluid">
            <x-patient-data :name="$userTurn->user->name" :id="$userTurn->user->id" :age="$userTurn->user->patient->age" />
            <x-patient-history :history="$userTurn->user" />
            <x-patient-clinic-history :patient-history="$userTurn->user" />
            <x-patient-form />
            <button type="submit" form="patient-form" class="btn btn-primary mt-5 ml-5">Save</button>
            <form id="patient-form" action="doctor" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $userTurn->user->id }}">
            </form>
        </div>
    </div>
@endsection
