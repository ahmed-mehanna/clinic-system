<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="doctor-dashboard-style">
    <div class="container-fluid">
        <x-patient-data :name="$user->name" :id="$user->id" :age="$user->patient->age" />
        <x-patient-history-without-edit :history="$user" />
        <x-patient-clinic-history :patient-history="$user" />
    </div>
</div>
