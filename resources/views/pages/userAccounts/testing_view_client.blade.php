<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{dd($Client->pfps_oth->ONE_EF_HEENTOTH)}} --}}
    {{-- {{dd($Client->past_medical_spec->ONE_EF_ALLERGY)}} --}}
      
    {{-- one to one --}}
    <p><strong>Client ID: </strong> {{ $Client->id}}</p>
    <p><strong>Client Name: </strong>{{ $Client->ONE_EF_LASTNAME }}</p>

    {{-- one to many --}}
    <strong>Past Medical History:</strong>
    @foreach ($Client->past_medical_history as $onePm)
        <p>{{ $onePm->ONE_PM_PMH }}</p>
    @endforeach

    {{-- one to one (has null value) --}}
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

    {{-- one to many --}}
    <strong>DRE:</strong>
    @foreach ($Client->neuro_exam as $answer)
        <p>{{ $answer->ONE_PN_NEURO }}</p>
    @endforeach

    <strong>Others:</strong>
    <p>
        &emsp;<strong>HEENT: </strong>
        @if (!empty($Client->pfps_oth->ONE_EF_HEENTOTH))
            <p>&emsp;&emsp;{{ $Client->pfps_oth->ONE_EF_HEENTOTH }}</p>
        @else
            <p>&emsp;&emsp;None</p>
        @endif
    </p>
    <p>
        &emsp;<strong>CBL: </strong>
        @if (!empty($Client->pfps_oth->ONE_PC_CBLOTH))
            <p>&emsp;&emsp;{{ $Client->pfps_oth->ONE_PC_CBLOTH }}</p>
        @else
            <p>&emsp;&emsp;None</p>
        @endif
    </p>

    <strong>NCD HRA:</strong>
    <p>
        &emsp;<strong>Fat Food: </strong>
        @if (!empty( $Client->ncd_hra->ONE_EF_FATFOOD ))
            <p>&emsp;&emsp;{{ $Client->ncd_hra->ONE_EF_FATFOOD }}</p>
        @else
            <p>&emsp;&emsp;None</p>
        @endif
    </p>
    <p>
        &emsp;<strong>Symptoms: </strong>
        @if (!empty( $Client->ncd_hra->ONE_EF_SYMPTOMS ))
            <p>&emsp;&emsp;{{ $Client->ncd_hra->ONE_EF_SYMPTOMS }}</p>
        @else
            <p>&emsp;&emsp;None</p>
        @endif
    </p>



    


    {{-- <p>ONE_PM_PMH: {{$Client->one_pm->id }}</p> --}}
                      
</body>
</html>
