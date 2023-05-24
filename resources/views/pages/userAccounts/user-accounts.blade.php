{{-- @php
    $users = [
        '1' => [
            'id' => '1',
            'fullName' => 'Juan Carlo M. Dela Cruz III',
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
    ];
@endphp --}}

<x-layout>
    
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

        {{-- EDIT MODAL --}}
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
        </div>

        {{-- VIEW MODAL --}}
        <div id="view-modal-body" class="modal hidden fixed top-[15%] bg-white rounded-xl w-[600px] min-h-[600px] drop-shadow-lg overflow-hidden">
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
        </div>
    </div>
    
    {{-- MAIN CONTAINER --}}
    <section class="flex flex-col gap-12 bg-light w-full min-h-screen items-center pt-navbar pb-10">
        <div class="flex flex-row justify-center items-center mt-12 w-[95%] lg:w-3/4">
            <div class="flex flex-row rounded-lg items-center text-right w-full">
                <div class="flex w-full">
                    <div class="relative flex flex-row w-[60%]">
                        <input class="rounded-l-xl focus:ring-0 border border-gray-400 pl-4 pr-2 w-full" type="text" placeholder="Search">
                        <a href="" class="absolute -right-[50px] ring-0 ring-gray-400 h-full flex justify-center items-center rounded-r-xl bg-secondary w-[50px]">
                            <i class='bx bx-search-alt-2 text-white text-xl'></i>
                        </a>
                    </div>
                </div>
                <a href="{{url('users/add')}}" class="flex justify-center items-center bg-secondary rounded-xl text-white py-[7px] px-4 gap-1 hover:text-secondary hover:bg-white hover:ring-1 hover:ring-secondary">
                    <i class='bx bxs-plus-circle text-xl'></i><p class="whitespace-nowrap hidden md:inline-block">Add New User</p>
                </a>
            </div>
        </div>
        <div class="bg-white flex flex-col h-fit rounded-xl drop-shadow-lg justify-center overflow-x-auto lg:w-3/4 w-[95%] px-6 py-8 gap-8">
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
                    @foreach ($user as $users)
                        <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
                            <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->id}}</td>
                            <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap"> {{$users->first_name}} {{substr($users->middle_name, 0, 1)}}. {{$users->last_name}} </td>
                            <td class="text-left px-6 py-3">{{$users->username}}</td>
                            <td class="text-left px-6 py-3">{{$users->created_at}}</td>
                            <td class="text-left px-6 py-3">{{$users->role}}</td>
                            <td class="text-left px-6 py-3">{{$users->status}}</td>
                            <td class="text-left px-6 py-3">
                                <div class="flex gap-[6px]">
                                    <a href="/user/view/{{$users->id}}">
                                        <button class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1">View</button>
                                    </a>
                                    <a href="/user/edit/{{$users->id}}">
                                        <button class="text-white bg-secondary px-4 py-2 rounded-full hover:bg-white hover:text-secondary hover:ring-secondary hover:ring-1">Edit</button>
                                    </a>
                                    <form action="/user/{{$users->id}}" method="POST" class="flex flex-col">
                                        @method('put')   
                                        @csrf
                                        <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1">Archive</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="sticky left-0 px-6">
                <p>Showing <strong>8</strong> out of <strong>50</strong> entries</p>
            </div>
        </div>
    </section>

</x-layout>

@vite('resources/js/modal.js')

<script>
    var modal = document.getElementById('edit-modal-body');
    var btn = document.getElementById('edit');
    var span = document.getElementsByClassName('close')[0];

    // Open the modal when the button is clicked
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // Close the modal when the close button is clicked
    span.onclick = function() {
        modal.style.display = "none";
    };

    // Close the modal when the user clicks outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>