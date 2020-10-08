<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="doctor-dashboard-style">
    <div class="container-fluid">

        <x-patient-clinic-history-details :illness="$illness"/>

    </div>
    <script>
        document.getElementById('patient-clinic-history-details').style.maxHeight = '100%'
        let rows = document.querySelectorAll('.row')
        for (let i = 0; i < rows.length; i++)
            rows[i].style.marginTop = '50px'
    </script>
</div>
