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
                        @foreach ($audit as $history)
                            <tr class="border border-transparent y-10"> {{-- {{!($loop->last) ? "border-b-light-gray" : ""}} --}}
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$history->username}}</td>
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$history->full_name}}</td> {{-- first and last name --}}
                                <td class="text-left px-6 py-3">{{$history->action}}</td> 
                                {{-- 
                                    Add new user [username] ------DONE------
                                    Edited a user [username] ------DONE------
                                    Archived a user [username] ------DONE------
                                    Restored an inactive user [username] ------DONE------
                                    Reset a password [username] ------DONE------
                                    Exported users table ------DONE------    

                                    Exported 1st encounter template
                                    Exported 1st encounter table
                                    Imported 1st encounter table
                                --}}
                                <td class="text-left px-6 py-3">{{$history->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- audit log - pagination --}}
                {{-- <div class="sticky left-0 px-6 mt-8">
                    {{ $audit->links('pagination::tailwind') }}
                </div> --}}
            </div>
        </div>

    </section>
</x-layout>