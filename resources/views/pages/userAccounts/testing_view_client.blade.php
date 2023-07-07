<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{dd($Client->social_history)}} --}}
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
    {{-- @foreach ($Client->neuro_exam as $answer)
        <p>{{ $answer->ONE_PN_NEURO }}</p>
    @endforeach --}}

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



    

    @foreach ($Client->pmh_operation as $pmh)
   
    <p>ONE_EF_PSH: {{ $pmh->ONE_EF_PSH }}</p>
    <p>ONE_EF_DPSO: {{ $pmh->ONE_EF_DPSO }}</p>
    <p>ONE_EF_PSO: {{ $pmh->ONE_EF_PSO }}</p>

    @endforeach


    @foreach ($Client->family_medical_history as $fmh)
   
    <p>ONE_EF_PSH: {{ $fmh->ONE_FM_PMH }}</p>
   
    @endforeach

    
    {{-- Example if madaming one-to-one --}}

    @if (!empty($Client->family_medical_spec->ONE_EF_FHALLERGY) || 
    !empty($Client->family_medical_spec->ONE_EF_FHORGANCANCER) ||
    !empty($Client->family_medical_spec->ONE_EF_FHHEPATYPE) ||
    !empty($Client->family_medical_spec->ONE_EF_FHHIGH) ||
    !empty($Client->family_medical_spec->ONE_EF_FHHIGHESTSYSTOLIC) ||
    !empty($Client->family_medical_spec->ONE_EF_FHHIGHESTDIASTOLIC) ||
    !empty($Client->family_medical_spec->ONE_EF_FHPULTUB) ||
    !empty($Client->family_medical_spec->ONE_EF_FHEXPULTUB) ||
    !empty($Client->family_medical_spec->ONE_EF_FHOTHERS))

    <p>Allergy: {{ $Client->family_medical_spec->ONE_EF_FHALLERGY }}</p>
    <p>Cancer: {{ $Client->family_medical_spec->ONE_EF_FHORGANCANCER }}</p>
    <p>Hepatype: {{ $Client->family_medical_spec->ONE_EF_FHHEPATYPE }}</p>
    <p>HighBlood: {{ $Client->family_medical_spec->ONE_EF_FHHIGH }}</p>
    <p>HighBlood: {{ $Client->family_medical_spec->ONE_EF_FHHIGHESTSYSTOLIC }}</p>
    <p>HighBlood: {{ $Client->family_medical_spec->ONE_EF_FHHIGHESTDIASTOLIC }}</p>
    <p>Cancer: {{ $Client->family_medical_spec->ONE_EF_FHPULTUB }}</p>
    <p>Cancer: {{ $Client->family_medical_spec->ONE_EF_FHEXPULTUB }}</p>
    <p>Cancer: {{ $Client->family_medical_spec->ONE_EF_FHOTHERS }}</p>

@endif

@foreach ($Client->Immu_Children as $child)

<p>Child Immunization: {{ $child->ONE_IC_IMMCHILD }}</p>

@endforeach

@foreach ($Client->immu_adult as $adult)

<p>Adult Immunization: {{ $adult->ONE_IA_IMMADULT }}</p>

@endforeach

{{-- @foreach ($Client->social_history as $social)

<p>SMOKE: {{ $social->ONE_EF_SMOKE }}</p>
<p>PACKS: {{ $social->ONE_EF_PACKS }}</p>

@endforeach --}}

<p>SMOKE: {{ $Client->social_history->ONE_EF_SMOKE }}</p>

@foreach ($Client->immu_preg as $preg)

<p>Immu_Pregnant: {{ $preg->ONE_IP_IMMPREG }}</p>

@endforeach

@foreach ($Client->immu_eld as $eld)

<p>Immu_Pregnant: {{ $eld->ONE_IE_IMMELD }}</p>

@endforeach

@if (!empty($Client->immothers->ONE_EF_IMMCHILDOTH))
    <p>IMMELD: {{ $Client->immothers->ONE_EF_IMMCHILDOTH }}</p>
@endif

@if (!empty($Client->fam_plan->ONE_EF_FPC))
    <p>Fam Plan: {{ $Client->fam_plan->ONE_EF_FPC }}</p>
@endif

@if (!empty($Client->mens_history->ONE_EF_MENARCHE))
    <p>Mens History: {{ $Client->mens_history->ONE_EF_MENARCHE }}</p>
@endif

@if (!empty($Client->birth_method->ONE_BC_BCM))
    <p>Birth Method: {{ $Client->birth_method->ONE_BC_BCM }}</p>
@endif

@if (!empty($Client->preg_history->ONE_EF_LIVCHILD))
    <p>Live Children: {{ $Client->preg_history->ONE_EF_LIVCHILD }}</p>
@endif


{{-- @foreach ($Client->dig_rec_exam as $dig)

<p>Dig_Rec_exam: {{ $dig->ONE_PD_RECTAL }}</p>

@endforeach --}}


                      
</body>
</html>
