<x-layout>
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        {{-- table --}}
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto lg:w-3/4 w-[95%] px-6 py-4 gap-8 mt-20">
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
                            <tr class="border border-transparent y-10">
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$history->username}}</td>
                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$history->full_name}}</td>
                                <td class="text-left px-6 py-3">{{$history->action}}</td> 
                                {{-- 
                                    Add new user [username] ------DONE------
                                    Edited a user [username] ------DONE------
                                    Archived a user [username] ------DONE------
                                    Restored an inactive user [username] ------DONE------
                                    Reset a password [username] ------DONE------
                                    Exported users table ------DONE------    

                                    Exported 1st encounter template ------DONE------  
                                    Exported 1st encounter table ------DONE------  
                                    Imported 1st encounter table ------DONE------  
                                --}}
                                <td class="text-left px-6 py-3">{{$history->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- audit log - pagination --}}
                <div class="sticky left-0 px-6 mt-8">
                    {{ $audit->links('pagination::tailwind') }}
                </div>
            </div>
        </div>

    </section>
</x-layout>