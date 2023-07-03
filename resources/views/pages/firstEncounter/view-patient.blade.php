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
                            <input type="text" value="{{$patient->ONE_EF_LASTNAME}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">First Name</p>
                            <input type="text" value="{{$patient->ONE_EF_FIRSTNAME}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Middle Name</p>
                            <input type="text" value="{{$patient->ONE_EF_MIDDLENAME}}" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
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
                        <div class="flex flex-wrap justify-around gap-4">
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Allergy</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Asthma</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cancer</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cerebrovascular Disease</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cerebrovascular</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cerebrovascular</p>
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
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Hepatitis</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Pulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- 2nd column --}}
                            <div class="sm:flex-col lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Specific organ(s) with Cancer</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Highest Blood Pressure</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Extrapulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- others --}}
                            <div class="sm:flex-col lg:px-4 w-full">
                                <p class="w-full font-semibold">Others</p>
                                <textarea class="w-[100%] patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                            </div>
                            {{-- past surgical history --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Past Surgical History</span>
                            </div>
                            <div class="lg:px-4 w-full lg:w-3/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Operation</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            <div class="sm:flex-col lg:px-4 w-full lg:w-2/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Date</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
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
                {{-- PERSONAL/SOCIAL DETAILS --}}
                <div class="w-full lg:w-2/5 order-2 lg:order-1 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Personal/Social Details</h3>
                    <div class="px-1">
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Smoking</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">No. of packs/year</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Alcohol</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">No. bottles/day</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Illicit Drugs</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Sexual History Screening</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                        <div class="flex flex-col md:flex-row justify-around mb-6">
                            <p class="w-full md:w-[30%] font-semibold">Immunocompromised</p>
                            <input type="text" value="Patient Data" class="w-full md:w-[60%] h-fit self-center patient-form-input -mb-3 md:mb-0" readonly>
                        </div>
                    </div>
                    
                </div>
                    
                {{-- FAMILY MEDICAL HISTORY --}}
                <div class="w-full lg:w-3/5 order-1 lg:order-2 bg-white rounded-xl drop-shadow-lg p-4">
                    <h3 class="text-xl font-bold text-primary border-b pb-2 mb-6">Family Medical History</h3>
                    <div class="px-2">
                        <div class="flex flex-wrap justify-around gap-4">
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Allergy</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Asthma</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cancer</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cerebrovascular Disease</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cerebrovascular</p>
                            <p class="bg-disabled-bg rounded-full w-fit px-3 py-1">Cerebrovascular</p>
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
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Hepatitis</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Pulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- 2nd column --}}
                            <div class="sm:flex-col lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Specific organ(s) with Cancer</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Highest Blood Pressure</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Extrapulmonary Tuberculosis Category</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- others --}}
                            <div class="sm:flex-col lg:px-4 w-full">
                                <p class="w-full font-semibold">Others</p>
                                <textarea class="w-[100%] patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                            </div>
                            {{-- past surgical history --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Family Surgical History</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-3/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Operation</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            <div class="sm:flex-col lg:px-4 w-full lg:w-2/5">
                                <div class="flex flex-col justify-around mb-3">
                                    <p class="w-full font-semibold">Date</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
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
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Children</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- 2nd column - adult --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 mt-3 lg:mt-0 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Adult</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- 3rd column - pregnant woman --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 mt-3 lg:mt-0 pb-2 border-b lg:border-none">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Pregnant Women</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                            </div>
                            {{-- 4th column - elderly and immunocompromised  --}}
                            <div class="px-2 lg:px-4 w-full lg:w-1/4 mt-3 lg:mt-0 pb-2">
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">For Elderly and Immunocompromised</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
                                </div>
                                <div class="flex flex-col justify-around mb-2">
                                    <p class="w-full font-semibold">Others</p>
                                    <textarea class="w-full patient-form-input bg-disabled-bg" rows="2" readonly>Patient Data</textarea>
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
                                <input type="text" value="Patient Data" class="w-full md:w-[30%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                        </div>
                        {{-- menstrual history --}}
                        <div class="px-2 lg:px-4 w-full mb-4 lg:mb-0">
                            <p class="w-full text-primary font-semibold">Menstrual History</p>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Menarche</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Onset of sexual intercourse</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Menopause</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-0">
                                <p class="w-full md:w-[40%] font-semibold">Menopause Age</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>

                            <div class="inline-flex items-center justify-center w-full">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Last Menstrual Period</span>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Period Duration</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Interval Cycle</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-5 lg:mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. pads/day during menstruation</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input -mb-3 md:mb-0" readonly>
                            </div>

                        </div>
                        {{-- prenancy history --}}
                        <div class="px-2 lg:px-4 w-full mt-2 mb-4 lg:mb-0">
                            <p class="w-full text-primary font-semibold">Pregnancy History</p>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Gravidity (no. of pregnancy)</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Parity (no. of delivery)</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">Type of Delivery</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of full term</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of premature</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of abortion</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around mb-3">
                                <p class="w-full md:w-[40%] font-semibold">No. of living children</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around ">
                                <p class="w-full md:w-[40%] font-semibold">Pregnancy-included hypertension (Pre-eclampsia)</p>
                                <input type="text" value="Patient Data" class="w-full md:w-[50%] patient-form-input" readonly>
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
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Weight</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Height</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">BMI</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- 2nd column --}}
                            <div class="sm:flex-col lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Respiratory Rate</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Visual Acuity</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Temperature</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Heart Rate</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
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
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Thickness</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Head Circumference</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
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
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Hip</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Limbs</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Middle and Upper Arm Circumference</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- Pediatric Client aged 0-60 months --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Pediatric Client aged 0-60 months</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Z-score</p>
                                    <input type="text" value="Patient Data" class="w-fit patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            {{-- blood type --}}
                            <div class="inline-flex items-center justify-center w-full -mb-3">
                                <hr class="w-4/5 h-px my-8 bg-gray-200 border-0">
                                <span class="absolute px-3 font-medium text-primary -translate-x-1/2 bg-white left-1/2">Blood Type</span>
                            </div>
                            <div class="px-2 lg:px-4 w-full">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Blood Type</p>
                                    <input type="text" value="Patient Data" class="w-fit patient-form-input -mb-3 md:mb-0" readonly>
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
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>
                            <div class="px-2 lg:px-4 w-full lg:w-1/2">
                                <div class="flex flex-col justify-around mb-5 lg:mb-3">
                                    <p class="w-full font-semibold">Altered Sensorium</p>
                                    <input type="text" value="Patient Data" class="w-full patient-form-input -mb-3 md:mb-0" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

    </section>
</x-layout>