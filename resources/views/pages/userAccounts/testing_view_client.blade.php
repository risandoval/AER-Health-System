<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{dd($Client->cbl)}} --}}
                    
    <p><strong>Client ID: </strong> {{ $Client->id}}</p>
    <p><strong>Client Name: </strong>{{ $Client->ONE_EF_LASTNAME }}</p>


    <strong>Past Medical History:</strong>
    @foreach ($Client->past_medical_history as $onePm)
        <p>{{ $onePm->ONE_PM_PMH }}</p>
    @endforeach

    <strong>Past Medical Spec:</strong>
    <p>
        &emsp;<strong>Allergy: </strong>
        @if (!empty($Client->past_medical_spec->ONE_EF_ALLERGY))
            <p>&emsp;&emsp;{{ $Client->past_medical_spec->ONE_EF_ALLERGY }}</p>
        @else
            <p>&emsp;&emsp;None</p>
        @endif
    </p>
    <p>
        &emsp;<strong>Cancer: </strong>
        @if (!empty($Client->past_medical_spec->ONE_EF_ORGANCANCER))
            <p>&emsp;&emsp;{{ $Client->past_medical_spec->ONE_EF_ORGANCANCER }}</p>
        @else
            <p>&emsp;&emsp;None</p>
        @endif
    </p>


    


    {{-- <p>ONE_PM_PMH: {{$Client->one_pm->id }}</p> --}}
                      
</body>
</html>
