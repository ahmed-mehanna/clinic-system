<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="doctor-dashboard-style">
    <div class="container-fluid">
        <?php
            $user = [
                'Drug_Medical_History' => [],
                'analysis_medical_history'  =>  [],
                'rumour_medical_history'    =>  []
            ]
        ?>
        <x-patient-clinic-history :patient-history="$user" />
    </div>
    <script>
        document.getElementById('patient-clinic-history').style.maxHeight = '100%'
        let rows = document.querySelectorAll('.row')
        for (let i = 0; i < rows.length; i++)
            rows[i].style.marginTop = '50px'
    </script>
</div>
