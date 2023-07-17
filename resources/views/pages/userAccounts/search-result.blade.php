<x-layout>
    {{-- wag ililipat kasi naboboang yung table --}}
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
  
    {{-- MODAL --}}
    <div id="modal-background" class="hidden absolute z-10 top-0 left-0 h-full w-full bg-black bg-opacity-30 items-center justify-center">
        <div id="archive-modal-body" class="modal hidden fixed top-[40%] bg-white rounded-xl w-[400px] drop-shadow-lg px-10 pt-6 pb-4">
            <div class="flex flex-col">
                <h2><strong>Confirm Action</strong></h2>
                <p>Are you sure you want to archive this account?</p>
            </div>
            <div class="flex gap-2 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white duration-100">Cancel</button>
                <button type="button" class="bg-red text-white text-sm rounded-full px-4 py-2 font-bold hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100 ease-in-out">Archive </button>
            </div>
        </div>
    </div>
    
    {{-- MAIN CONTAINER --}}
    <section class="flex flex-col gap-10 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        {{-- search and add button --}}
        <div class="flex flex-row justify-center items-center mt-12 w-[95%] lg:w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full">
                    <form action="{{url('users/search')}}" method="GET" class="relative flex flex-row w-[60%]">
                        <input id="searchInput" name="search" value="" class="rounded-l-full focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Search by name or username">
                        <button id="searchButton" type="submit" class="absolute -right-[50px] text-white ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-full bg-primary hover:text-secondary w-[50px] duration-100">
                            <i class='bx bx-search-alt-2 text-xl'></i>
                        </button>
                    </form>
                </div>
                <a href="{{url('users/add')}}" class="flex justify-center items-center bg-primary rounded-full text-white py-[7px] px-4 gap-1 hover:text-primary hover:bg-white hover:ring-1 hover:ring-primary">
                    <i class='bx bxs-plus-circle text-xl'></i><p class="whitespace-nowrap hidden md:inline-block duration-100">Add New User</p>
                </a>
            </div>
        </div>
        
          
        {{-- table container--}}
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto lg:w-3/4 w-[95%] px-6 py-4 gap-8">          
            <div class="w-full">
                <div id="myTabContent">
                    <div class="bg-white -mt-2 rounded-lg dark:bg-gray-800 " id="search-results" role="tabpanel" aria-labelledby="search-results-tab">
                        <div class="grid grid-cols-3 dark:border-gray-700 py-4">
                            <a href="{{url('/users')}}" class="close-btn flex items-center self-center bg-primary text-light text-sm rounded-full hover:bg-black hover:text-white px-3 py-1 w-[75px]">← Back</a>
                            @if ($search)
                                @if ($allUser->isEmpty())
                                    <p id="resultsMessage" class="text-center">No matches found for "<b>{{$search}}</b>"</p>
                                @else
                                    <p id="resultsMessage" class="text-center"> Results for "<b>{{$search}}</b>"</p>
                                @endif
                            @else
                                <p id="resultsMessage" class="text-center">{{$noResult}}</p>
                            @endif
                        </div>
                        
                        @if ($search)
                            @if ($allUser->isEmpty())
                                <p></p>
                            @else
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-t border-gray-200">
                                        <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">ID</th>
                                        <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Full Name</th>
                                        <th class="text-left px-6 py-3">Username</th>
                                        <th class="text-left px-6 py-3 whitespace-nowrap">Date Created</th>
                                        <th class="text-left px-6 py-3">Role</th>
                                        <th class="text-left px-6 py-3">Status</th>
                                        <th class="text-left px-6 py-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-results-body">
                                        @foreach ($allUser as $users)
                                            <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
                                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->id}}</td>
                                                <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} {{substr($users->middle_name, 0, 1)}}. {{$users->last_name}} </td>
                                                <td class="text-left px-6 py-3">{{$users->username}}</td>
                                                <td class="text-left px-6 py-3">{{$users->created_at}}</td>
                                                <td class="text-left px-6 py-3">{{$users->role}}</td>
                                                <td class="text-left px-6 py-4">{{$users->status}}</td>
                                                @if ($users->status == 'Active' && $users->password_request == 'No') 
                                                    <td class="text-left px-6 py-3">
                                                        <div class="flex gap-[6px]">
                                                            <a href="{{url("/users/view/$users->id")}}">
                                                                <button class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">View</button>
                                                            </a>
                                                            <form action="{{url("/users/archive/$users->id")}}" method="POST" class="flex flex-col">
                                                                @method('put')   
                                                                @csrf
                                                                <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100">Archive</button>
                                                            </form>
                        
                                                        </div>
                                                    </td>
                                                @elseif ($users->status == 'Inactive') 
                                                    <td class="text-left px-6 py-3">
                                                        <div class="flex gap-[6px]">
                                                            <form action="{{url("/users/unarchive/$users->id")}}" method="POST" class="flex flex-col">
                                                                @method('put')   
                                                                @csrf
                                                                <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100">Restore</button>
                                                            </form>
                        
                                                        </div>
                                                    </td>
                                                @else 
                                                    <td class="text-left px-6 py-3">
                                                        <div class="flex gap-[6px]">
                                                            <form action="{{url("/users/reset/$users->id")}}" method="POST" class="flex flex-col">
                                                                @method('put')   
                                                                @csrf
                                                                <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100">Reset Password</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- search results - pagination --}}
                                <div class="sticky left-0 px-6 mt-8">
                                    {{ $allUser->links('pagination::tailwind') }}
                                </div>
                            @endif
                       
                        @else
                            {{-- <p></p> --}}
                        @endif
                        
                    </div>

                    
                </div>
            </div>
        </div>
    </section>

</x-layout>
