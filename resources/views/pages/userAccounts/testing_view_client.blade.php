<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

                    
    <p>Client Name: {{ $Client->ONE_EF_LASTNAME }}</p>


    @foreach ($Client->past_medical_history as $onePm)
   
    <p>ONE_PM_PMH: {{ $onePm->ONE_PM_PMH }}</p>

    @endforeach

    @if (!empty($Client->past_medical_spec->ONE_EF_ALLERGY))
    <p>Allergy: {{ $Client->past_medical_spec->ONE_EF_ALLERGY }}</p>
    <p>Cancer: {{ $Client->past_medical_spec->ONE_EF_ORGANCANCER }}</p>
    @endif


    {{-- <p>ONE_PM_PMH: {{$Client->one_pm->id }}</p> --}}
                      
</body>
</html>
