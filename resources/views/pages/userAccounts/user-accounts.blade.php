@php
    $users = [
        '1' => [
            'id' => '1',
            'username' => 'user1',
            'dateCreated' => '05/06/23',
            'role' => 'Super Admin',
        ],
        '2' => [
            'id' => '2',
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
        <div id="archive-modal-body" class="modal hidden bg-white rounded-xl w-[400px] drop-shadow-lg px-10 pt-6 pb-4">
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
        <div id="edit-modal-body" class="modal hidden bg-white rounded-xl w-[600px] min-h-[600px] drop-shadow-lg">
            <div class="relative px-6 py-4">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-[10%] hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>Edit Account Details</strong></h2>
            </div>

            <div class="grid grid- grid-cols-4 border-y p-10 gap-6 items-center">                  
                <label for="first_name" class="col-span-1 whitespace-nowrap">First Name:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="first_name" class="w-full outline-none">
                </div>

                <label for="last_name" class="col-span-1 whitespace-nowrap">Last Name:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="last_name" class="w-full outline-none">
                </div>

                <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="username" class="w-full outline-none">
                </div>

                <label for="role" class="col-span-1 whitespace-nowrap">Role:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="role" class="w-full outline-none">
                </div>

                <label for="position" class="col-span-1 whitespace-nowrap">Position:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="position" class="w-full outline-none">
                </div>

                <label for="birthdate" class="col-span-1 whitespace-nowrap">Birthdate:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="birthdate" class="w-full outline-none">
                </div>

                <label for="contact" class="col-span-1 whitespace-nowrap">Contact No:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="contact" class="w-full outline-none">
                </div>

                <label for="email" class="col-span-1 whitespace-nowrap">Email Address:</label>
                <div class="px-4 py-2 rounded-xl border w-full border-gray-300 col-span-3">
                    <input type="text" name="email" class="w-full outline-none">
                </div>
            </div>
            
            <div class="flex gap-3 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-5 py-1 font-bold">Close</button>
                <button type="button" class="bg-secondary text-white text-sm rounded-full px-5 py-1 font-bold">Save</button>
            </div>
        </div>
    </div>

    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-[84px]">
        <div class="flex flex-row justify-center items-center mt-12 w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex flex-1 flex-row rounded-md">
                    <input class="rounded-l-xl border border-r-secondary border-gray-400 py-1.5 pl-5 pr-2 w-[60%]" type="text" placeholder="Search">
                    <a href="" class="flex justify-center items-center rounded-r-xl bg-secondary w-[40px]">
                        <i class='bx bx-search-alt-2 text-white text-xl'></i>
                    </a>
                </div>
                <a  href="#" class="flex justify-center items-center bg-secondary rounded-xl text-white py-[7px] px-4 gap-1">
                    <i class='bx bxs-plus-circle text-xl'></i>Add New User
                </a>
            </div>
        </div>
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center w-3/4 py-8 px-6 gap-8">
            <table class="w-full">
                <thead>
                    <tr class="border-2 border-transparent border-b-light-gray">
                        <th class="text-center py-2">ID#</th>
                        <th class="text-left py-2">Username</th>
                        <th class="text-left py-2">Date Created</th>
                        <th class="text-left py-2">Role</th>
                        <th class="text-left py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user => $value)
                        <tr class="border border-transparent {{!($loop->last) ? "border-b-light-gray" : ""}}">
                            <td class="text-center py-2">{{$value['id']}}</td>
                            <td class="text-left py-2">{{$value['username']}}</td>
                            <td class="text-left py-2">{{$value['dateCreated']}}</td>
                            <td class="text-left py-2">{{$value['role']}}</td>
                            <td class="text-left py-2 ">
                                <div class="flex gap-[6px]">
                                    <button id="edit" class="text-white bg-secondary px-4 py-1.5 rounded-full">Edit</button>
                                    <button id="archive" class="text-white bg-red px-4 py-1.5 rounded-full">Archive</button>
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