<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        {{-- search and buttons --}}
        <x-messages />
        <div class="flex flex-row justify-center items-center mt-12 w-[95%] lg:w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full"> 
                    <form action="#" method="GET" class="relative flex flex-row w-[60%]">
                        <input name="search" value="" class="rounded-l-full focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Enter a name or action to search">
                        <button type="submit" class="absolute -right-[50px] text-white ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-full bg-primary hover:text-secondary w-[50px] duration-100">
                            <i class='bx bx-search-alt-2 text-xl'></i>
                        </a>
                    </form>
                </div>
            </div>
            <div class="flex gap-2">
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
                            <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Username</th>
                            <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Full Name</th>
                            <th class="text-left px-6 py-3">Action</th>
                            <th class="text-left px-6 py-3 whitespace-nowrap">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($audits as $audit) --}}
                            <tr class="border border-transparent y-10"> {{-- {{!($loop->last) ? "border-b-light-gray" : ""}} --}}
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">H0001</td>
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> Emilia Herrera </td> {{-- first and last name --}}
                                <td class="text-left px-6 py-3">Added new user</td>
                                {{-- 
                                    Add new user [username]
                                    Edited a user [username]
                                    Archived a user [username]
                                    Restored an inactive user [username]
                                    Reset a password [username]
                                    Exported users table

                                    Exported 1st encounter template
                                    Exported 1st encounter table
                                    Imported 1st encounter table
                                --}}
                                <td class="text-left px-6 py-3">2023-07-12 4:29 PM</td>
                            </tr>
                            <tr class="border border-transparent y-10"> {{-- {{!($loop->last) ? "border-b-light-gray" : ""}} --}}
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">M0025</td>
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> Rian Manuel </td>
                                <td class="text-left px-6 py-3">Archived a user</td>
                                <td class="text-left px-6 py-3">2023-07-12 2:15 PM</td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>

                {{-- audit log - pagination --}}
                {{-- <div class="sticky left-0 px-6 mt-8">
                    {{ $audits->links('pagination::tailwind') }}
                </div> --}}
            </div>
        </div>

    </section>
</x-layout>