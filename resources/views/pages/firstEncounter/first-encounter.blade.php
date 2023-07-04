<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        {{-- search and buttons --}}
        <div class="flex flex-row justify-center items-center mt-12 w-[95%] lg:w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full"> 
                    <form action="#" method="GET" class="relative flex flex-row w-[60%]">
                        <input name="search" value="" class="rounded-l-full focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Enter a first or last name to search">
                        <button type="submit" class="absolute -right-[50px] text-white ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-full bg-primary hover:text-secondary w-[50px] duration-100">
                            <i class='bx bx-search-alt-2 text-xl'></i>
                        </a>
                    </form>
                </div>
            </div>
            <div class="flex gap-2">
                    <button class="flex justify-center items-center bg-primary rounded-full text-white py-2 px-4 gap-1 hover:text-primary hover:bg-white hover:ring-1 hover:ring-primary whitespace-nowrap cursor-pointer duration-100">
                        
                    </button>
                    <!--default html file upload button-->
                    <input type="file" id="actual-btn" hidden/>
                    <!--our custom file upload button-->
                    <label for="actual-btn" >
                        <i class='bx bx-import text-xl'></i>
                        <p class="hidden md:block">Import Patients</p>
                    </label>  
                <a href="#" class="flex justify-center items-center bg-primary rounded-full text-white py-2 px-4 gap-1 hover:text-primary hover:bg-white hover:ring-1 hover:ring-primary whitespace-nowrap duration-100">
                    <i class='bx bx-export text-xl'></i>
                    <p class="hidden md:block">Export Patients</p>
                </a>
            </div>
        </div>

        {{-- table --}}
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto lg:w-3/4 w-[95%] px-6 py-4 gap-8">
            <div class="bg-white -mt-2 rounded-lg">
                <table class="w-full">
                    <thead>
                        <tr class="border-2 border-transparent border-b-light-gray">
                            <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">ID</th>
                            <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Full Name</th>
                            <th class="text-left px-6 py-3">Sex</th>
                            <th class="text-left px-6 py-3 whitespace-nowrap">Barangay</th>
                            <th class="text-left px-6 py-3">PhilHealth ID</th>
                            <th class="text-left px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr class="border border-transparent y-10"> {{-- {{!($loop->last) ? "border-b-light-gray" : ""}} --}}
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">1</td>
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$patient->ONE_EF_FIRSTNAME}} {{substr($patient->ONE_EF_MIDDLENAME, 0, 1)}}. {{$patient->ONE_EF_LASTNAME}} {{$patient->ONE_EF_EXTENSIONNAME}} </td>
                                <td class="text-left px-6 py-3">{{$patient->ONE_EF_SEX}}</td>
                                <td class="text-left px-6 py-3">{{$patient->ONE_EF_BRGY}}</td>
                                <td class="text-left px-6 py-3">{{$patient->ONE_EF_PIN}}</td>
                                <td class="text-left px-6 py-3">
                                    <div class="flex gap-[6px]">
                                        <a href="{{url("first-encounter/view/$patient->id")}}">
                                            <button class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">View</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- patients - pagination --}}
                {{-- <div class="sticky left-0 px-6 mt-8">
                    {{ $patients->links('pagination::tailwind') }}
                </div> --}}
            </div>
        </div>

    </section>
</x-layout>