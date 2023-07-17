<x-layout>
    {{-- wag ililipat kasi naboboang yung table --}}
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
  
    {{-- MODAL --}}
    <div id="modal-background" class="hidden absolute z-10 top-0 left-0 h-full w-full bg-black bg-opacity-30 items-center justify-center">
        {{-- ARCHIVE MODAL --}}
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
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        {{-- search and add button --}}
        <div class="flex flex-row justify-center items-center mt-12 w-[95%] lg:w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full"> 
                    <form action="{{url('users/search')}}" method="GET" class="relative flex flex-row w-[60%]">
                        <input name="search" value="" class="rounded-l-full focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Enter a first name, last name, or username to search">
                        <button type="submit" class="absolute -right-[50px] text-white ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-full bg-primary hover:text-secondary w-[50px] duration-100">
                            <i class='bx bx-search-alt-2 text-xl'></i>
                        </a>
                    </form>
                </div>
                <div class="flex gap-2">
                    <a href="{{url('users/export')}}" class="flex justify-center items-center bg-primary rounded-full text-white py-2 px-4 gap-1 hover:text-primary hover:bg-white hover:ring-1 hover:ring-primary whitespace-nowrap duration-100">
                        <i class='bx bx-export text-xl'></i>
                        <p class="hidden md:block">Export Users</p>
                    </a>
                    <a href="{{url('users/add')}}" class="flex justify-center items-center bg-primary rounded-full text-white py-2 px-4 gap-1 hover:text-primary hover:bg-white hover:ring-1 hover:ring-primary whitespace-nowrap duration-100">
                        <i class='bx bxs-plus-circle text-xl'></i>
                        <p class="hidden md:block">Add New User</p>
                    </a>
                </div>
                
            </div>
        </div>
          
        {{-- table container--}}
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto lg:w-3/4 w-[95%] px-6 py-4 gap-8">          
            <div class="w-full">
                {{-- table tabs --}}
                <div class="flex items-center w-full border-b border-gray-200 dark:border-gray-700 mb-4">
                    <ul class="flex w-full -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="active-users-tab" data-tabs-target="#active-users" type="button" role="tab" aria-controls="active-users" aria-selected="true">Active Users</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="archived-users-tab" data-tabs-target="#archived-users" type="button" role="tab" aria-controls="archived-users" aria-selected="false">Archived Users</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="pass-reset-request-tab" data-tabs-target="#pass-reset-request" type="button" role="tab" aria-controls="pass-reset-request" aria-selected="false">Password Reset Request</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    {{-- ACTIVE USERS TAB --}}
                    <div class="bg-white -mt-2 rounded-lg dark:bg-gray-800" id="active-users" role="tabpanel" aria-labelledby="active-users-tab">
                        <table class="w-full">
                            <thead>
                                <tr class="border-2 border-transparent border-b-light-gray">
                                    <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">ID</th>
                                    <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Full Name</th>
                                    <th class="text-left px-6 py-3">Username</th>
                                    <th class="text-left px-6 py-3 whitespace-nowrap">Date Created</th>
                                    <th class="text-left px-6 py-3">Role</th>
                                    <th class="text-left px-6 py-3">Status</th>
                                    <th class="text-left px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activeUser as $users)
                                    <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->id}}</td>
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} @if($users->middle_name != null){{substr($users->middle_name, 0, 1). "."}}@endif {{$users->last_name}} </td>
                                        <td class="text-left px-6 py-3">{{$users->username}}</td>
                                        <td class="text-left px-6 py-3">{{$users->created_at}}</td>
                                        <td class="text-left px-6 py-3">{{$users->role}}</td>
                                        <td class="text-left px-6 py-3">{{$users->status}}</td>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- active users - pagination --}}
                        <div class="sticky left-0 px-6 mt-8">
                            {{ $activeUser->links('pagination::tailwind') }}
                        </div>
                    </div>

                    {{-- ARCHIVED USERS TAB --}}
                    <div class="bg-white -mt-2 rounded-lg dark:bg-gray-800 hidden" id="archived-users" role="tabpanel" aria-labelledby="archived-users-tab">
                        <table class="w-full">
                            <thead>
                                <tr class="border-2 border-transparent border-b-light-gray">
                                    <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">ID</th>
                                    <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Full Name</th>
                                    <th class="text-left px-6 py-3">Username</th>
                                    <th class="text-left px-6 py-3 whitespace-nowrap">Date Created</th>
                                    <th class="text-left px-6 py-3">Role</th>
                                    <th class="text-left px-6 py-3">Status</th>
                                    <th class="text-left px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inactiveUser as $users)
                                    <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->id}}</td>
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} @if($users->middle_name != null){{substr($users->middle_name, 0, 1). "."}}@endif {{$users->last_name}} </td>
                                        <td class="text-left px-6 py-3">{{$users->username}}</td>
                                        <td class="text-left px-6 py-3">{{$users->created_at}}</td>
                                        <td class="text-left px-6 py-3">{{$users->role}}</td>
                                        <td class="text-left px-6 py-3">{{$users->status}}</td>
                                        <td class="text-left px-6 py-3">
                                            <div class="flex gap-[6px]">
                                                <form action="{{url("/users/unarchive/$users->id")}}" method="POST" class="flex flex-col">
                                                    @method('put')   
                                                    @csrf
                                                    <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100">Restore</button>
                                                </form>
            
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- archived users - pagination --}}
                        <div class="sticky left-0 px-6 mt-8">
                            {{ $inactiveUser->links('pagination::tailwind') }}
                        </div>
                    </div>

                    {{-- PASSWORD RESET REQUEST TAB --}}
                    <div class="bg-white -mt-2 rounded-lg dark:bg-gray-800 hidden" id="pass-reset-request" role="tabpanel" aria-labelledby="pass-reset-request-tab">
                       
                        <table class="w-full">
                            <thead>
                                <tr class="border-2 border-transparent border-b-light-gray">
                                    <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">ID</th>
                                    <th class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">Full Name</th>
                                    <th class="text-left px-6 py-3">Username</th>
                                    <th class="text-left px-6 py-3 whitespace-nowrap">Date Created</th>
                                    <th class="text-left px-6 py-3">Role</th>
                                    <th class="text-left px-6 py-3">Status</th>
                                    <th class="text-left px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($passwordRequest as $users)
                                    <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->id}}</td>
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} @if($users->middle_name != null){{substr($users->middle_name, 0, 1). "."}}@endif {{$users->last_name}} </td>
                                        <td class="text-left px-6 py-3">{{$users->username}}</td>
                                        <td class="text-left px-6 py-3">{{$users->created_at}}</td>
                                        <td class="text-left px-6 py-3">{{$users->role}}</td>
                                        <td class="text-left px-6 py-3">{{$users->status}}</td>
                                        <td class="text-left px-6 py-3">
                                            <div class="flex gap-[6px]">
                                                {{-- <a href="{{url("/users/view/$users->id")}}">
                                                    <button class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">View</button>
                                                </a>
                                                <a href="{{url("/users/edit/$users->id")}}">
                                                    <button class="text-white bg-secondary px-4 py-2 rounded-full hover:bg-white hover:text-secondary hover:ring-secondary hover:ring-1 duration-100">Edit</button>
                                                </a> --}}
                                                <form action="{{url("/users/reset/$users->id")}}" method="POST" class="flex flex-col">
                                                    @method('put')   
                                                    @csrf
                                                    <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100">Reset Password</button>
                                                </form>
            
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- password reset request - pagination --}}
                        <div class="sticky left-0 px-6 mt-8">
                            {{ $passwordRequest->links('pagination::tailwind') }}
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

@vite('resources/js/modal.js')