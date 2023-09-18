{{-- individual view of FE  --}}
<x-layout class="bg-light">
    <section class="flex flex-col justify-center w-full pt-navbar pb-10">
        <h2 class="text-2xl md:text-3xl text-center font-bold py-4 pt-6 md:py-8">Individual Health Information</h2>

        {{-- 1st row --}}
        <div class="self-center w-[95%] lg:w-[80%] mx-2 p-2">
            <div class="flex flex-col lg:flex-row gap-4">
                {{-- CLIENT DETAILS --}}
                <div class="w-full lg:w-2/5 order-1 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Client Details</h3>
                    <div class="px-1">
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Last Name</p>
                            <input type="text" value="{{str_replace('�', 'ñ', $patient->ONE_EF_LASTNAME)}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">First Name</p>
                            <input type="text" value="{{str_replace('�', 'ñ', $patient->ONE_EF_FIRSTNAME)}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Middle Name</p>
                            <input type="text" value="{{$patient->ONE_EF_MIDDLENAME ? str_replace('�', 'ñ', $patient->ONE_EF_MIDDLENAME) : 'N/A'}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Extension Name</p>
                            <input type="text" value="{{$patient->ONE_EF_EXTENSIONNAME ? $patient->ONE_EF_EXTENSIONNAME : 'N/A'}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Sex</p>
                            <input type="text" value="{{$patient->ONE_EF_SEX}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Barangay</p>
                            <input type="text" value="{{str_replace('�','ñ', $patient->ONE_EF_BRGY)}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Birthday</p>
                            <input type="text" value="{{$patient->ONE_EF_BDAY}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Health Screening & Assessment Date</p>
                            <input type="text" value="{{$patient->ONE_EF_HSAD}}" class="w-full md:w-[60%] h-fit self-center patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Authorization Transaction Code (ATC)</p>
                            <input type="text" value="{{$patient->ONE_EF_ATC}}" class="w-full md:w-[60%] h-fit self-center patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around">
                            <p class="w-full md:w-[30%] font-semibold">Philhealth ID</p>
                            <input type="text" value="{{$patient->ONE_EF_PIN}}" class="w-full md:w-[60%] h-fit self-center patient-form-input" readonly>
                        </div>
                    </div>
                    
                </div>
                    
                {{-- PAST MEDICAL HISTORY --}}
                <div class="w-full lg:w-3/5 order-2 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Past Medical History</h3>
                    <div class="px-2">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($patient->past_medical_history as $onePm)
                                @if($onePm->ONE_PM_PMH != null)
                                    <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">@foreach (explode("_", $onePm->ONE_PM_PMH) as $word) {{$word}} @endforeach </p>
                                @endif
                            @endforeach
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Specifications</span>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            {{-- 1st column --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Allergy</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->past_medical_spec)->ONE_EF_ALLERGY ? $patient->past_medical_spec->ONE_EF_ALLERGY : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Hepatitis</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->past_medical_spec)->ONE_EF_HEPATYPE ? $patient->past_medical_spec->ONE_EF_HEPATYPE : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Pulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->past_medical_spec)->ONE_EF_PULTUB ? $patient->past_medical_spec->ONE_EF_PULTUB : 'N/A'}}</textarea>
                                </div>
                            </div>
                            {{-- 2nd column --}}
                            <div class="sm:flex-col lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Specific organ(s) with Cancer</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->past_medical_spec)->ONE_EF_ORGANCANCER ? $patient->past_medical_spec->ONE_EF_ORGANCANCER : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Highest Blood Pressure</p>
                                                                                                            {{-- {{ optional($patient->ppef)->ONE_EF_BPSYSTOLIC && optional($patient->ppef)->ONE_EF_BPDIASTOLIC ? $patient->ppef->ONE_EF_BPSYSTOLIC. '/' .$patient->ppef->ONE_EF_BPDIASTOLIC : 'N/A'}} --}}
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{ optional($patient->past_medical_spec)->ONE_EF_HIGHESTSYSTOLIC && optional($patient->past_medical_spec)->ONE_EF_HIGHESTDIASTOLIC ? optional($patient->past_medical_spec)->ONE_EF_HIGHESTSYSTOLIC. '/' .$patient->past_medical_spec->ONE_EF_HIGHESTDIASTOLIC : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Extrapulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->past_medical_spec)->ONE_EF_EXPULTUB ? $patient->past_medical_spec->ONE_EF_EXPULTUB : 'N/A'}}</textarea>
                                </div>
                            </div>
                            {{-- others --}}
                            <div class="sm:flex-col lg:px-4 w-full">
                                <p class="w-full font-semibold">Others</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->past_medical_spec)->ONE_EF_PMOTHERS ? $patient->past_medical_spec->ONE_EF_PMOTHERS : 'N/A'}}</textarea>
                            </div>
                            {{-- past surgical history --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Past Surgical History</span>
                            </div>
                            <div class="lg:px-4 w-full lg:w-3/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Operation</p>
                                    @if (!$patient->pmh_operation->isEmpty())
                                        @foreach ($patient->pmh_operation as $one_po)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_po->ONE_EF_PSO ? $one_po->ONE_EF_PSO : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                            </div>
                            <div class="sm:flex-col lg:px-4 w-full lg:w-2/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Date</p>
                                    @if (!$patient->pmh_operation->isEmpty())
                                        @foreach ($patient->pmh_operation as $one_po)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_po->ONE_EF_DPSO ? $one_po->ONE_EF_DPSO : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

        {{-- 2nd row --}}
        <div class="self-center w-[95%] lg:w-[80%] mx-2 p-2">
            <div class="flex flex-col lg:flex-row gap-4">
                {{-- PERSONAL/SOCIAL HISTORY --}}
                <div class="w-full lg:w-2/5 order-2 lg:order-1 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Personal/Social History</h3>
                    <div class="px-1">
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Smoking</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_SMOKE ? $patient->social_history->ONE_EF_SMOKE : 'N/A' }}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">No. of packs/year</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_PACKS ? $patient->social_history->ONE_EF_PACKS : 'N/A' }}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Alcohol</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_ALC ? $patient->social_history->ONE_EF_ALC : 'N/A' }}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">No. bottles/day</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_BOT ? $patient->social_history->ONE_EF_BOT : 'N/A' }}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Illicit Drugs</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_DRUGS ? $patient->social_history->ONE_EF_DRUGS : 'N/A' }}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Sexual History Screening</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_SEXACTIVE ? $patient->social_history->ONE_EF_SEXACTIVE : 'N/A' }}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Immunocompromised</p>
                            <input type="text" value="{{ optional($patient->social_history)->ONE_EF_IMMUNO ? $patient->social_history->ONE_EF_IMMUNO : 'N/A' }}" class="w-full md:w-[60%] h-fit self-center patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                    </div>
                    
                </div>
                    
                {{-- FAMILY MEDICAL HISTORY --}}
                <div class="w-full lg:w-3/5 order-2 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Family Medical History</h3>
                    <div class="px-2">
                        <div class="flex flex-wrap gap-2">
                            @foreach ($patient->family_medical_history as $oneFm)
                                @if($oneFm->ONE_FM_PMH != null)
                                    <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">@foreach (explode("_", $oneFm->ONE_FM_PMH) as $word) {{$word}} @endforeach </p>
                                @endif
                            @endforeach
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Specifications</span>
                        </div>
                        <div class="flex flex-wrap justify-center">
                            {{-- 1st column --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Allergy</p>              
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHALLERGY ? $patient->family_medical_spec->ONE_EF_FHALLERGY : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Hepatitis</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHHEPATYPE ? $patient->family_medical_spec->ONE_EF_FHHEPATYPE : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Pulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHPULTUB ? $patient->family_medical_spec->ONE_EF_FHPULTUB : 'N/A'}}</textarea>
                                </div>
                            </div>
                            {{-- 2nd column --}}
                            <div class="sm:flex-col lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Specific organ(s) with Cancer</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHORGANCANCER ? $patient->family_medical_spec->ONE_EF_FHORGANCANCER : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Highest Blood Pressure</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHHIGHESTDIASTOLIC ? $patient->family_medical_spec->ONE_EF_FHHIGHESTDIASTOLIC : 'N/A'}}</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Extrapulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHEXPULTUB ? $patient->family_medical_spec->ONE_EF_FHEXPULTUB : 'N/A'}}</textarea>
                                </div>
                            </div>
                            {{-- others --}}
                            <div class="sm:flex-col lg:px-4 w-full">
                                <p class="w-full font-semibold">Others</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{optional($patient->family_medical_spec)->ONE_EF_FHOTHERS ? $patient->family_medical_spec->ONE_EF_FHOTHERS : 'N/A'}}</textarea>
                            </div>
                            {{-- past surgical history --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Past Surgical History</span>
                            </div>
                            <div class="lg:px-4 w-full lg:w-3/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Operation</p>
                                    @if (!$patient->fmh_operation->isEmpty())
                                        @foreach ($patient->fmh_operation as $one_fo)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_fo->ONE_FO_FSO ? $one_fo->ONE_FO_FSO : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                            </div>
                            <div class="sm:flex-col lg:px-4 w-full lg:w-2/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Date</p>
                                    @if (!$patient->fmh_operation->isEmpty())
                                        @foreach ($patient->fmh_operation as $one_fo)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_fo->ONE_FO_DFSO ? $one_fo->ONE_FO_DFSO : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
        
        {{-- 3rd row --}}
        <div class="self-center w-[95%] lg:w-[80%] mx-2 p-2">
            <div class="flex flex-col lg:flex-row gap-4">
                {{-- IMMUNIZATIONS --}}
                <div class="w-full order-1 lg:order-2 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Immunizations</h3>
                    <div class="px-2">
                        <div class="flex flex-wrap justify-center">
                            {{-- 1st column - children --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Children</p>
                                    @if (!$patient->immu_children->isEmpty())
                                        @foreach ($patient->immu_children as $one_ic)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_ic->ONE_IC_IMMCHILD ? $one_ic->ONE_IC_IMMCHILD : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{ optional($patient->immothers)->ONE_EF_IMMCHILDOTH ? $patient->immothers->ONE_EF_IMMCHILDOTH : 'N/A' }}</textarea>
                                </div>
                            </div>
                            {{-- 2nd column - adult --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 mt-3 lg:mt-0 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Adult</p>
                                    @if (!$patient->immu_adult->isEmpty())
                                        @foreach ($patient->immu_adult as $one_ia)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_ia->ONE_IA_IMMADULT ? $one_ia->ONE_IA_IMMADULT : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{ optional($patient->immothers)->ONE_EF_IMMADULTOTH ? $patient->immothers->ONE_EF_IMMADULTOTH : 'N/A' }}</textarea>
                                </div>
                            </div>
                            {{-- 3rd column - pregnant woman --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 mt-3 lg:mt-0 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Pregnant Women</p>
                                    @if (!$patient->immu_preg->isEmpty())
                                        @foreach ($patient->immu_preg as $one_ip)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_ip->ONE_IP_IMMPREG ? $one_ip->ONE_IP_IMMPREG : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{ optional($patient->immothers)->ONE_EF_IMMPREGOTH ? $patient->immothers->ONE_EF_IMMPREGOTH : 'N/A' }}</textarea>
                                </div>
                            </div>
                            {{-- 4th column - elderly and immunocompromised  --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 mt-3 lg:mt-0 pb-2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Elderly and Immunocompromised</p>
                                    @if (!$patient->immu_eld->isEmpty())
                                        @foreach ($patient->immu_eld as $one_ie)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>{{$one_ie->ONE_IE_IMMELD ? $one_ie->ONE_IE_IMMELD : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="2" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>{{ optional($patient->immothers)->ONE_EF_IMMELDOTH ? $patient->immothers->ONE_EF_IMMELDOTH : 'N/A' }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

        {{-- 4th row --}}
        <div class="self-center w-[95%] lg:w-[80%] mx-2 p-2">
            <div class="flex flex-col lg:flex-row gap-4">
                {{-- OB-GYNE HISTORY --}}
                <div class="w-full lg:w-1/2 order-2 lg:order-1 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-3">Ob-Gyne History</h3>
                    <div class="flex flex-wrap justify-center">
                        {{-- family planning --}}
                        <div class="px-2 lg:px-4 w-full mb-4 lg:mb-0">
                            <p class="w-full text-primary font-semibold">Family Planning</p>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[60%] font-semibold">With access to family planning counseling?</p>
                                <input type="text" value="{{ optional($patient->fam_plan)->ONE_EF_FPC ? $patient->fam_plan->ONE_EF_FPC : 'N/A' }}" class="w-full md:w-[30%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                        </div>
                        {{-- menstrual history --}}
                        <div class="px-2 lg:px-4 w-full mb-4 lg:mb-0">
                            <p class="w-full text-primary font-semibold">Menstrual History</p>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Menarche</p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_MENARCHE ? $patient->mens_history->ONE_EF_MENARCHE : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Menarche Age</p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_MENARCHEAGE ? $patient->mens_history->ONE_EF_MENARCHEAGE : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Onset of sexual intercourse</p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_ONSETSEX ? $patient->mens_history->ONE_EF_ONSETSEX : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Menopause</p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_MENOP ? $patient->mens_history->ONE_EF_MENOP : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-0">
                                <p class="w-full md:w-[40%] font-semibold">Menopause Age <span class="text-sm font-medium italic">(if yes)</span></p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_MENOPAGE ? $patient->mens_history->ONE_EF_MENOPAGE : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>

                            <div class="inline-flex items-center justify-center w-full">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Last Menstrual Period</span>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Period Duration</p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_MENSDAYS ? $patient->mens_history->ONE_EF_MENSDAYS : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. pads/day during menstruation</p>
                                <input type="text" value="{{ optional($patient->mens_history)->ONE_EF_PADS ? $patient->mens_history->ONE_EF_PADS : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>

                            <div class="inline-flex items-center justify-center w-full">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Birth Control Method</span>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Birth Control Method</p>
                                <input type="text" value="{{ optional($patient->birth_method)->ONE_BC_BCM ? $patient->birth_method->ONE_BC_BCM : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Interval Cycle</p>
                                <input type="text" value="{{ optional($patient->birth_method)->ONE_BC_CYCLE ? $patient->birth_method->ONE_BC_CYCLE : 'N/A'}}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>

                        </div>
                        {{-- prenancy history --}}
                        <div class="px-2 lg:px-4 w-full mt-2 mb-4 lg:mb-0">
                            <p class="w-full text-primary font-semibold">Pregnancy History</p>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Gravidity (no. of pregnancy)</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_GRAV ? $patient->preg_history->ONE_EF_GRAV : 'N/A' }}" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Parity (no. of delivery)</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_PARI ? $patient->preg_history->ONE_EF_PARI : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Type of Delivery</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_DELIVERYTYPE ? $patient->preg_history->ONE_EF_DELIVERYTYPE : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of full term</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_FULLTERM ? $patient->preg_history->ONE_EF_FULLTERM : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of premature</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_PREMATURE ? $patient->preg_history->ONE_EF_PREMATURE : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of abortion</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_ABORT ? $patient->preg_history->ONE_EF_ABORT : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of living children</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_LIVCHILD ? $patient->preg_history->ONE_EF_LIVCHILD : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around ">
                                <p class="w-full md:w-[40%] font-semibold">Pregnancy-included hypertension (Pre-eclampsia)</p>
                                <input type="text" value="{{ optional($patient->preg_history)->ONE_EF_ECLAMPSIA ? $patient->preg_history->ONE_EF_ECLAMPSIA : 'N/A' }}" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>

                        </div>

                    </div>
                    
                </div>

                {{-- PERTINENT PHYSICAL EXAMINATION FINDINGS --}}
                <div class="w-full lg:w-1/2 order-2 lg:order-1 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Pertinent Physical Examination Findings</h3>
                    <div class="px-1">
                        <div class="flex flex-wrap justify-center">
                            {{-- 1st column --}}
                            <div class="w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Blood Pressure</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_BPSYSTOLIC && optional($patient->ppef)->ONE_EF_BPDIASTOLIC ? $patient->ppef->ONE_EF_BPSYSTOLIC. '/' .$patient->ppef->ONE_EF_BPDIASTOLIC : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Weight</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_WEIGHT ? $patient->ppef->ONE_EF_WEIGHT : 'N/A' }}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Height</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_HEIGHT ? $patient->ppef->ONE_EF_HEIGHT : 'N/A' }}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">BMI</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_BMI ? $patient->ppef->ONE_EF_BMI : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- 2nd column --}}
                            <div class="sm:flex-col lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Respiratory Rate</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_RESPRATE ? $patient->ppef->ONE_EF_RESPRATE : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Visual Acuity</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_VAL && optional($patient->ppef)->ONE_EF_VAR ? $patient->ppef->ONE_EF_VAL. '/' .$patient->ppef->ONE_EF_VAR : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Temperature</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_TEMP ? $patient->ppef->ONE_EF_TEMP : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- Piadtric Client aged 0-24 months --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Piadtric Client aged 0-24 months</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Length</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_LENGTH ? $patient->ppef->ONE_EF_LENGTH : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Thickness</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_SKINFOLD ? $patient->ppef->ONE_EF_SKINFOLD : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Head Circumference</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_HCIRCUM ? $patient->ppef->ONE_EF_HCIRCUM : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- body circumference --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Body Circumference</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Waist</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_WAIST ? $patient->ppef->ONE_EF_WAIST : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Hip</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_HIP ? $patient->ppef->ONE_EF_HIP : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Limbs</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_LIMBS ? $patient->ppef->ONE_EF_LIMBS : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Middle and Upper Arm Circumference</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_MAUACIRCUM ? $patient->ppef->ONE_EF_MAUACIRCUM : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- Pediatric Client aged 0-60 months --}}
                            {{-- <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Pediatric Client aged 0-60 months</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Z-score</p>
                                    <input type="text" value="Patient Data" class="w-fit patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div> --}}
                            
                            {{-- blood type --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Blood Type</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Blood Type</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_BLOODTYPE ? $patient->ppef->ONE_EF_BLOODTYPE : 'N/A'}}" class="w-fit patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- General Survery --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">General Survey</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Awake and Alert</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_AAA ? $patient->ppef->ONE_EF_AAA : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Altered Sensorium</p>
                                    <input type="text" value="{{ optional($patient->ppef)->ONE_EF_AS ? $patient->ppef->ONE_EF_AS : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

        {{-- 5th row --}}
        <div class="self-center w-[95%] lg:w-[80%] mx-2 p-2">
            <div class="flex flex-col lg:flex-row gap-4">
                {{-- Pertinent Findings Per System --}}
                <div class="w-full order-1 lg:order-2 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Pertinent Findings Per System</h3>
                    <div class="px-2">
                        <div class="flex flex-col lg:flex-row gap-4 lg:border-b">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">HEENT</p>
                                    @if (!$patient->heent->isEmpty())
                                        @foreach ($patient->heent as $one_heent)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_heent->ONE_HE_HEENT ? $one_heent->ONE_HE_HEENT : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - HEENT</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_EF_HEENTOTH ? $patient->pfps_oth->ONE_EF_HEENTOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Chest/Breast/Lungs</p>
                                    @if (!$patient->cbl->isEmpty())
                                        @foreach ($patient->cbl as $one_cbl)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_cbl->ONE_PC_CBL ? $one_cbl->ONE_PC_CBL : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - CBL</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PC_CBLOTH ? $patient->pfps_oth->ONE_PC_CBLOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Heart</p>
                                    @if (!$patient->heart->isEmpty())
                                        @foreach ($patient->heart as $one_heart)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_heart->ONE_PH_HEART ? $one_heart->ONE_PH_HEART : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - Heart</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PH_HEARTOTH ? $patient->pfps_oth->ONE_PH_HEARTOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Abdomen</p>
                                    @if (!$patient->abdomen->isEmpty())
                                        @foreach ($patient->abdomen as $one_adb)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_adb->ONE_PA_ABDOMEN ? $one_adb->ONE_PA_ABDOMEN : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - Heart</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PA_ABDOMENOTH ? $patient->pfps_oth->ONE_PA_ABDOMENOTH : 'N/A'}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-col lg:flex-row gap-4">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2 mt-4">
                                    <p class="w-full font-semibold">Genitourinary</p>
                                    @if (!$patient->genitourinary->isEmpty())
                                        @foreach ($patient->genitourinary as $one_genit)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_genit->ONE_PG_GENIT ? $one_genit->ONE_PG_GENIT : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - Genitourinary</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PG_GENITOTH ? $patient->pfps_oth->ONE_PG_GENITOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2 mt-4">
                                    <p class="w-full font-semibold">Digital Rectal Examination</p>
                                    @if (!$patient->dre->isEmpty())
                                        @foreach ($patient->dre as $one_dra)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_dra->ONE_PD_RECTAL ? $one_dra->ONE_PD_RECTAL : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - DRE</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PD_RECTALOTH ? $patient->pfps_oth->ONE_PD_RECTALOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-r lg:border-b-0">
                                <div class="flex flex-col justify-around mb-2 mt-4">
                                    <p class="w-full font-semibold">Skin/Extremities</p>
                                    @if (!$patient->skin->isEmpty())
                                        @foreach ($patient->skin as $one_skin)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_skin->ONE_PS_SKIN ? $one_skin->ONE_PS_SKIN : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - Skin/Extremities</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PS_SKINOTH ? $patient->pfps_oth->ONE_PS_SKINOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2 mt-4">
                                    <p class="w-full font-semibold">Neurological Examination</p>
                                    @if (!$patient->neuro_exam->isEmpty())
                                        @foreach ($patient->neuro_exam as $one_ne)
                                            <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{$one_ne->ONE_PN_NEURO ? $one_ne->ONE_PN_NEURO : 'N/A'}}</textarea>
                                        @endforeach
                                    @else
                                        <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>N/A</textarea>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others - NE</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg mb-2" rows="1" readonly>{{ optional($patient->pfps_oth)->ONE_PN_NEUROOTH ? $patient->pfps_oth->ONE_PN_NEUROOTH : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

        {{-- 6th row --}}
        <div class="self-center w-[95%] lg:w-[80%] mx-2 p-2">
            <div class="flex flex-col lg:flex-row gap-4 ">
                {{-- Pertinent Findings Per System --}}
                <div class="w-full order-1 lg:order-2 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2">NCD High Risk Assessment (for 25 years old and above)</h3>
                    <div class="px-2 lg:px-6">
                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">High Fat/Salt Food Intake</span>
                        </div>
                        <div class="px-2 lg:px-4 w-full">
                            <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                <p class="w-full font-semibold">Eats processed/fast foods (e.g. instant noodles, hamburgers, fries, fried chicken skin, etc.) and ihaw-ihaw (e.g. isaw, adidas, etc.)</span></p>
                                <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_FATFOOD ? $patient->ncd_hra->ONE_EF_FATFOOD : 'N/A'}}" class="w-full lg:w-fit patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Dietary Fiber Intake</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-0 lg:gap-4">
                            <div class="px-2 lg:px-4 w-full lg:w-1/2 mb-4 lg:mb-2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">3 servings of vegetables daily</p>
                                    <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_VEG ? $patient->ncd_hra->ONE_EF_VEG : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2 pb-2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">2-3 servings of fruits daily</p>
                                    <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_FRUIT ? $patient->ncd_hra->ONE_EF_FRUIT : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Physical Activities</span>
                        </div>
                        <div class="px-2 lg:px-4 w-full">
                            <div class="flex flex-col justify-around mb-5 lg:mb-2">
                                <p class="w-full font-semibold">Does at least 2.5 hours a week of moderate-intensity physical activity</p>
                                <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_PHYACTIV ? $patient->ncd_hra->ONE_EF_PHYACTIV : 'N/A'}}" class="w-full lg:w-fit patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Presence or absence of Diabetes</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-0 lg:gap-4 mb-5 lg:mb-0">
                            <div class="px-2 lg:px-4 w-full lg:w-1/2 mb-5 lg:mb-2">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Was patient diagnosed as having diabetes?</p>
                                    <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_DIABETES ? $patient->ncd_hra->ONE_EF_DIABETES : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Medication <span class="text-sm font-medium italic">(if yes)</span></p>
                                    <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_DIABETESYES ? $patient->ncd_hra->ONE_EF_DIABETESYES : 'N/A'}}" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="px-2 lg:px-4 w-full lg:w-1/2">
                            <div class="flex flex-col justify-around">
                                <p class="w-full font-semibold">Diabetes Symptoms <span class="text-sm font-medium italic">(if no)</span></p>
                                <div class="flex flex-col md:flex-row justify-between">
                                    <input type="text" value="{{ optional($patient->ncd_hra)->ONE_EF_SYMPTOMS ? $patient->ncd_hra->ONE_EF_SYMPTOMS : 'N/A'}}" class="w-full lg:w-[30%] patient-form-input mb-2 lg:mb-0" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Raised Blood Glucose</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-4 mb-2">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Raised Blood Glucose</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_RBG ? $patient->ncd_hra->ONE_EF_RBG : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">FBS/RBS</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_FBSRBS ? $patient->ncd_hra->ONE_EF_FBSRBS : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Raised Blood Glucose Level</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_RBGL ? $patient->ncd_hra->ONE_EF_RBGL : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Date Taken</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_RBGDATE ? $patient->ncd_hra->ONE_EF_RBGDATE : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Raised Blood Lipids</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-4 mb-2">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Raised Blood Lipids</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_RBL ? $patient->ncd_hra->ONE_EF_RBL : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Total Cholesterol</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_CHOLESTEROL ? $patient->ncd_hra->ONE_EF_CHOLESTEROL : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around ">
                                    <p class="w-full font-semibold">Date Taken</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_RBLDATE ? $patient->ncd_hra->ONE_EF_RBLDATE : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Presence of Urine Ketones</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-4 mb-2">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Presence of Urine Ketones</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_KETONESPRES ? $patient->ncd_hra->ONE_EF_KETONESPRES : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Urine Ketones</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_KETONES ? $patient->ncd_hra->ONE_EF_KETONES : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Date Taken</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_KETONESDATE ? $patient->ncd_hra->ONE_EF_KETONESDATE : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mb-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Presence of Urine Protein</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-4 mb-2">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Presence of Urine Protein</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_PROTEINPRES ? $patient->ncd_hra->ONE_EF_PROTEINPRES : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Urine Protein</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_PROTEIN ? $patient->ncd_hra->ONE_EF_PROTEIN : 'N/A'}}</textarea>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around ">
                                    <p class="w-full font-semibold">Date Taken</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_PROTEINDATE ? $patient->ncd_hra->ONE_EF_PROTEINDATE : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full my-6 lg:my-0 lg:-mx-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Determine Probable Angina, Heart Attack, Stroke or Transient Ischemic Attack</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-4 mb-2">
                            <div class="px-2 lg:px-4 w-full lg:w-1/4">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Angina or Heart Attack</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_AHA ? $patient->ncd_hra->ONE_EF_AHA : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4 mb-2 lg:mb-3">
                            <div class="flex flex-col w-full lg:w-1/2">
                                <p class="w-full font-semibold">1. Have you had any pain or discomfort or any pressure or heaviness in your chest? <span class="text-sm font-medium italic">(if no, go to no. 8)</span></p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_CHESTPAIN ? $patient->ncd_hra->ONE_EF_CHESTPAIN : 'N/A'}}</textarea>
                            </div>
                            <div class="flex flex-col w-full lg:w-1/2">
                                <p class="w-full font-semibold">2. Have you had any pain or discomfort or any pressure or heaviness in your chest? <span class="text-sm font-medium italic">(if no, go to no. 8)</span></p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_CENTERPAIN ? $patient->ncd_hra->ONE_EF_CENTERPAIN : 'N/A'}}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4 mb-2 lg:mb-3">
                            <div class="flex flex-col w-full lg:w-1/2">
                                <p class="w-full font-semibold">3. Do you get it when you walk uphill or hurry?</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_UPHILL ? $patient->ncd_hra->ONE_EF_UPHILL : 'N/A'}}</textarea>
                            </div>
                            <div class="flex flex-col w-full lg:w-1/2">
                                <p class="w-full font-semibold">4. Do you slowdown if you get the pain while walking?</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_WALKING ? $patient->ncd_hra->ONE_EF_WALKING : 'N/A'}}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4 mb-2 lg:mb-3">
                            <div class="flex flex-col w-full lg:w-1/2">
                                <p class="w-full font-semibold">5. Does the pain go away if you stand still or if you take a tablet under the tongue?</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_TONGUE ? $patient->ncd_hra->ONE_EF_TONGUE : 'N/A'}}</textarea>
                            </div>
                            <div class="flex flex-col w-full lg:w-1/2">
                                <p class="w-full font-semibold">6. Does the pain away in less than 10 minutes?</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_10M ? $patient->ncd_hra->ONE_EF_10M : 'N/A'}}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4 mb-6 lg:mb-3">
                            <div class="flex flex-col w-full">
                                <p class="w-full font-semibold">7. Have you ever had a severe chest pain across the front of your chest lasting for half an hour or more?</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_CHESTFRONT ? $patient->ncd_hra->ONE_EF_CHESTFRONT : 'N/A'}}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4">
                            <div class="flex flex-col w-full">
                                <p class="w-full font-medium italic">Note: If the answer to question 3 or 4 or 5 or 6 or 7 is Yes, patient have angina or heart attack and needs to see the doctor</p>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full -mx-3">
                            <hr class="w-3/5 h-px my-8 bg-gray-200 border-0">
                        </div>
                        <div class="px-2 lg:px-4 w-full lg:w-[26%] mb-2">
                            <div class="flex flex-col justify-around">
                                <p class="w-full font-semibold">Stroke and TIA (Transient Ischemic Attack)</p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_SATIA ? $patient->ncd_hra->ONE_EF_SATIA : 'N/A'}}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4 mb-2 lg:mb-3">
                            <div class="flex flex-col w-full">
                                <p class="w-full font-semibold">8. Have you ever had any of the following: difficulty in talking, weakness of arm and/or leg </p>
                                <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_DIFF ? $patient->ncd_hra->ONE_EF_DIFF : 'N/A'}}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-3 lg:gap-8 justify-between px-2 lg:px-4">
                            <div class="flex flex-col w-full">
                                <p class="w-full font-medium italic">Note: If the answer to question 8 is Yes, the patient may have had a TIA or stroke and needs to see the doctor.</p>
                            </div>
                        </div>

                        <div class="inline-flex items-center justify-center w-full my-6 lg:my-0 lg:-mx-3">
                            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                            <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Risk Level</span>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-4 mb-2">
                            <div class="px-2 lg:px-4 w-full lg:w-1/5">
                                <div class="flex flex-col justify-around">
                                    <p class="w-full font-semibold">Risk Level</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="1" readonly>{{ optional($patient->ncd_hra)->ONE_EF_RISK ? $patient->ncd_hra->ONE_EF_RISK : 'N/A'}}</textarea>
                                </div>
                            </div>
                        </div>


                        
                    </div>
                    
                </div>
            </div>

        </div>

    </section>
</x-layout>