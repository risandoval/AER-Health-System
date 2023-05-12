@php
    $users = [
        '1' => [
            'id' => '1',
            'fullName' => 'Juan Carlo M. dela Cruz III',
            'username' => 'J001',
            'dateCreated' => '05/06/23',
            'role' => 'Admin',
        ],
        '2' => [
            'id' => '12',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Physician',
        ],
        '3' => [
            'id' => '112',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'BHW',
        ],
        '4' => [
            'id' => '1112',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Nurse',
        ],
        '5' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '6' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '7' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '8' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '9' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '10' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '11' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
        '12' => [
            'id' => '2',
            'fullName' => 'Jane Doe',
            'username' => 'user2',
            'dateCreated' => '05/07/23',
            'role' => 'Admin',
        ],
    ];
@endphp

<x-layout>
    
    {{-- MODAL --}}
    <div id="modal-background" class="hidden absolute z-10 top-0 left-0 h-full w-full bg-black bg-opacity-30 items-center justify-center">
        {{-- ARCHIVE MODAL --}}
        <div id="archive-modal-body" class="modal hidden fixed top-[40%] bg-white rounded-xl w-[400px] drop-shadow-lg px-10 pt-6 pb-4">
            <div class="flex flex-col">
                <h2><strong>Confirm Action</strong></h2>
                <p>Are you sure you want to archive this account?</p>
            </div>
            <div class="flex gap-3 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-5 py-1 font-bold">Cancel</button>
                <button type="button" class="bg-red text-white text-sm rounded-full px-5 py-1 font-bold">Archive</button>
            </div>
        </div>

        {{-- EDIT MODAL --}}
        <div id="edit-modal-body" class="modal hidden fixed top-[15%] bg-white rounded-xl w-[600px] min-h-[600px] drop-shadow-lg overflow-hidden">
            <div class="relative px-6 py-4">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-[10%] hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>Edit Account Details</strong></h2>
            </div>

            <div class="grid grid-cols-4 border-y p-10 gap-6 items-center">                  
                <label for="first_name" class="col-span-1 whitespace-nowrap">First Name:</label>
                <input type="text" name="first_name" class="rounded-xl border w-full focus:ring-0 focus:ring-secondary border-gray-300 col-span-3">

                <label for="last_name" class="col-span-1 whitespace-nowrap">Last Name:</label>
                <input type="text" name="last_name" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                <input type="text" name="username" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="role" class="col-span-1 whitespace-nowrap">Role:</label>
                <input type="text" name="role" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="position" class="col-span-1 whitespace-nowrap">Position:</label>
                <select name="position" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">
                    <option value="Admin">Admin</option>
                    <option value="Admin">Doctor</option>
                    <option value="Admin">Barangay Health Workers (BHW)</option>
                </select>

                <label for="birthdate" class="col-span-1 whitespace-nowrap">Birthdate:</label>
                <input type="date" name="birthdate" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3" max="9999-12-31">

                <label for="contact" class="col-span-1 whitespace-nowrap">Contact No:</label>
                <input type="text" name="contact" class="rounded-xl border w-full focus:ring-0 border-gray-300 col-span-3">

                <label for="email" class="col-span-1 whitespace-nowrap">Email Address:</label>
                <input type="text" name="email" class="rounded-xl border outline-[0.5px] w-full focus:ring-0 border-gray-300 col-span-3">
            </div>
            
            <div class="flex gap-3 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-5 py-1 font-bold">Close</button>
                <button type="button" class="bg-secondary text-white text-sm rounded-full px-5 py-1 font-bold">Save</button>
            </div>
        </div>
    </div>

    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        <div class="flex flex-row justify-center items-center mt-12 w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full">
                    <div class="relative flex flex-row w-[60%]">
                        <input class="rounded-l-xl focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Search">
                        <a href="" class="absolute -right-[50px] ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-xl bg-secondary w-[50px]">
                            <i class='bx bx-search-alt-2 text-white text-xl'></i>
                        </a>
                    </div>
                </div>
                <a href="{{url('users/add')}}" class="flex justify-center items-center bg-secondary rounded-xl text-white py-[7px] px-4 gap-1">
                    <i class='bx bxs-plus-circle text-xl'></i><p class="whitespace-nowrap hidden md:inline-block">Add New User</p>
                </a>
            </div>
        </div>
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto w-3/4 py-8 px-6 gap-8">
            <table class="w-full">
                <thead>
                    <tr class="border-2 border-transparent border-b-light-gray">
                        <th class="text-left px-6 py-3">ID</th>
                        <th class="text-left lg:px-6 py-3">Full Name</th>
                        <th class="text-left px-6 py-3">Username</th>
                        <th class="text-left px-6 py-3">Date Created</th>
                        <th class="text-left px-6 py-3">Role</th>
                        <th class="text-left px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user => $value)
                        <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
                            <td class="text-left px-6 py-3">{{$value['id']}}</td>
                            <td class="text-left lg:px-6 py-3">{{$value['fullName']}}</td>
                            <td class="text-left px-6 py-3">{{$value['username']}}</td>
                            <td class="text-left px-6 py-3">{{$value['dateCreated']}}</td>
                            <td class="text-left px-6 py-3">{{$value['role']}}</td>
                            <td class="text-left px-6 py-3">
                                <div class="flex gap-[6px]">
                                    <button id="view" class="text-white bg-primary px-4 py-2 rounded-full">View</button>
                                    <button id="edit" class="text-white bg-secondary px-4 py-2 rounded-full">Edit</button>
                                    <button id="archive" class="text-white bg-red px-4 py-2 rounded-full">Archive</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p>Showing <strong>8</strong> out of <strong>50</strong> entries</p>
            </div>
        </div>
    </section>

</x-layout>

@vite('resources/js/modal.js')