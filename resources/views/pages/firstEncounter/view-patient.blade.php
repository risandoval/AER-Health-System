<x-layout class="bg-light">
    <section class="flex justify-center w-full pt-navbar pb-10">
        <div class="flex flex-col bg-white min-w-[400px] md:w-3/5 min-h-[600px] rounded-xl drop-shadow-lg mt-12 mx-4 p-8">
            <div class="text-center border-b mb-3 pb-2">
                <h2 class="text-2xl md:text-3xl font-bold">Individual Health Information</h2>
            </div>
            
            {{-- CLIENT DETAILS --}}
            <div class="grid grid-cols-12 gap-4">
                <h3 class="col-span-12 text-xl font-bold -mb-2">Client Details</h3>
                <div class="col-span-12 lg:col-span-3 text-sm -mb-2"> {{-- first row --}}
                    <p class="font-semibold">Last Name</p>
                    <input type="text" value="{{$patient->ONE_EF_LASTNAME}}" class="patient-form-input" readonly>
                </div>
                <div class="col-span-12 lg:col-span-3 text-sm -mb-2">
                    <p class="font-semibold">First Name</p>
                    <input type="text" value="{{$patient->ONE_EF_FIRSTNAME}}" class="patient-form-input" readonly>
                </div>
                <div class="col-span-12 lg:col-span-3 text-sm -mb-2">
                    <p class="font-semibold">Middle Name</p>
                    <input type="text" value="{{$patient->ONE_EF_MIDDLENAME}}" class="patient-form-input" readonly>
                </div>
                <div class="col-span-12 lg:col-span-3 text-sm -mb-2">
                    <p class="font-semibold">Extension Name</p>
                    <input type="text" value="{{$patient->ONE_EF_EXTENSIONNAME}}" class="patient-form-input" readonly>
                </div>

                <div class="col-span-12 lg:col-span-4 text-sm -mb-2"> {{-- second row --}}
                    <p class="font-semibold">Barangay</p>
                    <input type="text" value="{{$patient->ONE_EF_BRGY}}" class="patient-form-input" readonly>
                </div>
                <div class="col-span-12 lg:col-span-4 text-sm -mb-2">
                    <p class="font-semibold">Sex</p>
                    <input type="text" value="{{$patient->ONE_EF_SEX}}" class="patient-form-input" readonly>
                </div>
                <div class="col-span-12 lg:col-span-4 text-sm -mb-2">
                    <p class="font-semibold">Health Screening & Assessment Date</p>
                    <input type="text" value="{{$patient->ONE_EF_HSAD}}" class="patient-form-input" readonly>
                </div>

                <div class="col-span-12 lg:col-span-6 text-sm -mb-2"> {{-- third row --}}
                    <p class="font-semibold">Authorization Transaction Code (ATC)</p>
                    <input type="text" value="{{$patient->ONE_EF_ATC}}" class="patient-form-input" readonly>
                </div>
                <div class="col-span-12 lg:col-span-6 text-sm -mb-2">
                    <p class="font-semibold">Philhealth Identification Number</p>
                    <input type="text" value="{{$patient->ONE_EF_PIN}}" class="patient-form-input" readonly>
                </div>

            </div>

        </div>
    </section>
</x-layout>