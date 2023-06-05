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
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Cancel</button>
                <button type="button" class="bg-red text-white text-sm rounded-full px-4 py-2 font-bold hover:bg-white hover:text-red hover:ring-red hover:ring-1">Archive </button>
            </div>
        </div>

        {{-- EDIT MODAL
        <div id="edit-modal-body" class="modal hidden fixed top-[15%] bg-white rounded-xl w-[600px] min-h-[600px] drop-shadow-lg overflow-hidden">
            <div class="relative px-6 py-4">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-[10%] hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>Edit Account Details</strong></h2>
            </div>

            <div class="grid grid-cols-4 border-y p-10 gap-6 items-center">                  
                <label for="first_name" class="col-span-1 whitespace-nowrap">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="middle_name" class="col-span-1 whitespace-nowrap">Middle Name:</label>
                <input type="text" name="middle_name" id="middle_name" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="last_name" class="col-span-1 whitespace-nowrap">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                <input type="text" name="username" id="username" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="role" class="col-span-1 whitespace-nowrap">Role:</label>
                <select name="role" id="role" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">
                    <option value="Admin" selected="selected">Admin</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Barangay Health Workers">Barangay Health Workers (BHW)</option>
                </select>

                <label for="specialization" class="col-span-1 whitespace-nowrap">Specialization:</label>
                <select name="specialization" id="specialization" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">
                    <option value="N/A">N/A</option>
                    <option value="Pediatrician">Pediatrician</option>
                    <option value="Psychiatrist">Psychiatrist</option>
                    <option value="Physician">Physician</option>
                </select>

                <label for="birthdate" class="col-span-1 whitespace-nowrap">Birthdate:</label>
                <input type="date" name="birthdate" id="birthdate" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3" max="9999-12-31">

                <label for="contact" class="col-span-1 whitespace-nowrap">Contact No:</label>
                <input type="number" name="contact" id="contact" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3" max="99999999999">

                <label for="email" class="col-span-1 whitespace-nowrap">Email Address:</label>
                <input type="text" name="email" id="email" class="rounded-xl border outline-[0.5px] w-full focus:ring-0 border-gray-300 col-span-3">
            </div>
            
            <div class="flex gap-2 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-5 py-2 hover:bg-black hover:text-white">Cancel</button>
                <button type="button" class="bg-secondary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-secondary hover:ring-secondary hover:ring-1">Save</button>
            </div>
        </div> --}}

        {{-- VIEW MODAL --}}
        {{-- <div id="view-modal-body" class="modal hidden fixed top-[15%] bg-white rounded-xl w-[600px] min-h-[600px] drop-shadow-lg overflow-hidden">
            <div class="relative px-6 py-4">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-[10%] hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>View Account Details</strong></h2>
            </div>
    
            <div class="grid grid-cols-4 border-y p-10 pt-6 gap-6 items-center">
                <div class="col-span-4">
                    <img class="w-40 h-40 border-4 border-primary rounded-full mx-auto" src="https://i.pinimg.com/564x/81/79/8d/81798d8b882d04f4ab59ba9c39fc5244.jpg" alt="Profile picture">
                </div>                  
                <label for="first_name" class="col-span-1 whitespace-nowrap">First Name:</label>
                <input type="text" name="first_name" value="Hello" class="rounded-xl border w-full focus:ring-0 focus:ring-secondary border-gray-300 col-span-3">

                <label for="last_name" class="col-span-1 whitespace-nowrap">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg" disabled value="Dela Cruz">
    
                <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                <input type="text" name="username" id="username" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg" disabled value="J001">
    
                <label for="role" class="col-span-1 whitespace-nowrap">Role:</label>
                <select name="role" id="role" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-black bg-disabled-bg" disabled>
                    <option value="Admin" selected="selected">Admin</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Barangay Health Workers">Barangay Health Workers (BHW)</option>
                </select>
    
                <label for="specialization" class="col-span-1 whitespace-nowrap">Specialization:</label>
                <select name="specialization" id="specialization" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 bg-disabled-bg" disabled>
                    <option value="N/A" selected="selected">N/A</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Barangay Health Workers">Barangay Health Workers (BHW)</option>
                </select>
    
                <label for="birthdate" class="col-span-1 whitespace-nowrap">Birthdate:</label>
                <input type="date" name="birthdate" id="birthdate" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg" max="9999-12-31" disabled value="2000-04-02">
    
                <label for="contact" class="col-span-1 whitespace-nowrap">Contact No:</label>
                <input type="number" name="contact" id="contact" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg" max="99999999999" disabled value="09927418581">
    
                <label for="email" class="col-span-1 whitespace-nowrap">Email Address:</label>
                <input type="text" name="email" id="email" class="rounded-xl border outline-[0.5px] w-full focus:ring-0 border-gray-300 col-span-3 text-disabled-text bg-disabled-bg" disabled value="admin@gmail.com">
            </div>
  
            
            <div class="flex gap-2 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-5 py-2 hover:bg-black hover:text-white">Close</button>
            </div>
        </div> --}}
    </div>
    
    {{-- MAIN CONTAINER --}}
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        {{-- search and add button --}}
        <div class="flex flex-row justify-center items-center mt-12 w-[95%] lg:w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full"> 
                    <div class="relative flex flex-row w-[60%]">
                        <input class="rounded-l-full focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Search">
                        <a href="" class="absolute -right-[50px] text-white ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-full bg-primary hover:text-secondary w-[50px] duration-100">
                            <i class='bx bx-search-alt-2 text-xl'></i>
                        </a>
                    </div>
                </div>
                <a href="{{url('users/add')}}" class="flex justify-center items-center bg-primary rounded-full text-white py-[7px] px-4 gap-1 hover:text-primary hover:bg-white hover:ring-1 hover:ring-primary">
                    <i class='bx bxs-plus-circle text-xl'></i><p class="whitespace-nowrap hidden md:inline-block duration-100">Add New User</p>
                </a>
            </div>
        </div>
          
        {{-- table container--}}
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto lg:w-3/4 w-[95%] px-6 py-4 gap-8">          
            <div class="w-full">
                {{-- table tabs --}}
                <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                    <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
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
                    <div class="bg-gray-50 -mt-2 rounded-lg dark:bg-gray-800" id="active-users" role="tabpanel" aria-labelledby="active-users-tab">
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
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} {{substr($users->middle_name, 0, 1)}}. {{$users->last_name}} </td>
                                        <td class="text-left px-6 py-3">{{$users->username}}</td>
                                        <td class="text-left px-6 py-3">{{$users->created_at}}</td>
                                        <td class="text-left px-6 py-3">{{$users->role}}</td>
                                        <td class="text-left px-6 py-3">{{$users->status}}</td>
                                        <td class="text-left px-6 py-3">
                                            <div class="flex gap-[6px]">
                                                <a href="{{url("/users/view/$users->id")}}">
                                                    <button class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">View</button>
                                                </a>
                                                <a href="{{url("/users/edit/$users->id")}}">
                                                    <button class="text-white bg-secondary px-4 py-2 rounded-full hover:bg-white hover:text-secondary hover:ring-secondary hover:ring-1 duration-100">Edit</button>
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
                        <div class="sticky left-0 px-6 mt-3">
                            <p>Showing <strong>{{$users->count()}}</strong> out of <strong>{{$users->count()}}</strong> entries</p>
                        </div>
                    </div>

                    {{-- ARCHIVED USERS TAB --}}
                    <div class="bg-gray-50 -mt-2 rounded-lg dark:bg-gray-800 hidden" id="archived-users" role="tabpanel" aria-labelledby="archived-users-tab">
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
                                        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} {{substr($users->middle_name, 0, 1)}}. {{$users->last_name}} </td>
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
                        <div class="sticky left-0 px-6 mt-3">
                            <p>Showing <strong>{{$users->count()}}</strong> out of <strong>{{$users->count()}}</strong> entries</p>
                        </div>
                    </div>

                    {{-- PASSWORD RESET REQUEST TAB --}}
                    <div class="bg-gray-50 -mt-2 rounded-lg dark:bg-gray-800 hidden" id="pass-reset-request" role="tabpanel" aria-labelledby="pass-reset-request-tab">
                        <p class="text-gray-500 dark:text-gray-400 text-sm">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">pass-reset-request tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

@vite('resources/js/modal.js')