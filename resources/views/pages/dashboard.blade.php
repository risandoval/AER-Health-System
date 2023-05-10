<x-layout>
    {{-- MODAL --}}
    <div id="modal-background" class="hidden absolute z-10 top-0 left-0 h-full w-full bg-black bg-opacity-30 items-center justify-center">
        {{-- MESSAGE MODAL --}}
        <div id="message-modal-body" class="modal hidden fixed top-[40%] bg-white rounded-xl w-[400px] drop-shadow-lg px-10 pt-6 pb-4">
            <div class="flex flex-col">
                <h2><strong>Success</strong></h2>
                <p>Profile details are saved!</p>
            </div>
            <div class="flex gap-3 justify-end p-3">
                <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-5 py-1 font-bold">Close</button>
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
                <button type="button" id="save" class="bg-secondary text-white text-sm rounded-full px-5 py-1 font-bold">Save</button>
            </div>
        </div>
    </div>

    {{-- HOME PAGE --}}
    <div class="flex flex-wrap justify-around mt-20 p-2 bg-light">
        {{-- profile card --}}
        <div class="w-full min-h-screen lg:w-[25%] bg-white rounded-lg drop-shadow-lg m-2">
            <div class="flex justify-center text-black">
                <div class="w-full">
                    <div class="">
                        <div class="photo-wrapper">
                            <img class="w-40 h-40 mt-10 border-4 border-primary rounded-full mx-auto" src="https://i.pinimg.com/564x/81/79/8d/81798d8b882d04f4ab59ba9c39fc5244.jpg" alt="Profile picture">
                        </div>
                        <div class="mt-4 flex flex-col">
                            <h3 class="text-center text-2xl font-medium leading-8">Juan Carlo M. dela Cruz III</h3>
                            <div class="text-center text-sm font-semibold mb-2">
                                <p>System Administrator</p>
                            </div>
                            <button id="edit" class="w-max px-6 mb-8 self-center  bg-primary text-light hover:bg-secondary rounded duration-400">
                                <a href="#" class="text-sm duration-400">Edit Profile</a>
                            </button>
                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Username</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        J001
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Role</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        System Administrator
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Specialization</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        Secretary
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Email address</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        juan@example.com
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Birthday</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        1978-08-23
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Mobile number</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        09123456789
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- main content [looker studio] --}}
        <div class="w-full lg:w-[72%] bg-white rounded-lg drop-shadow-lg p-4 m-2">
            <h1>Dashboard</h1>
        </div>
    </div>
    
</x-layout>

@vite('resources/js/modal.js')