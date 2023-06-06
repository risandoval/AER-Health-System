<x-layout>
    {{-- MODAL --}}
    {{-- {{dd("url("users/update/".auth()->user()->id)")}} --}}
    <div id="modal-background" class="hidden absolute z-10 top-[-10%] left-0 h-full w-full bg-black bg-opacity-30 items-center justify-center">
        {{-- MESSAGE MODAL --}}
        <div id="message-modal-body" class="modal hidden fixed top-[40%] bg-white text-green-700 rounded-xl w-[400px] drop-shadow-lg px-10 pt-6 pb-6">
            <div class="flex flex-col">
                <h2><strong>Checking Profile Information</strong></h2>
                <p>Saving changes...</p>
            </div>
        </div>

        {{-- CHANGE PASSWORD MODAL --}}
        <div id="change-password-modal-body" class="modal hidden fixed top-[30%] bg-white rounded-xl max-w-[600px] drop-shadow-lg overflow-hidden">
            
            <div class="relative px-6 py-4">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-[10%] hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>Change Password</strong></h2>
            </div>

            <form action="{{url('users/update/password/'.auth()->user()->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-8 p-10 gap-x-6 gap-y-4 items-center border-y">
                    <label for="current_password" class="col-span-3 whitespace-nowrap">Current Password:</label>
                    <input type="password" name="current_password" class="form-input col-span-5" placeholder="********">
                    @error ('password') <p class="col-start-4 col-span-5 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror

                    <label for="new_password" class="col-span-3 whitespace-nowrap">New Password:</label>
                    <input type="password" name="new_password" class="form-input col-span-5" placeholder="********">
                    @error ('new_password') <p class="col-start-4 col-span-5 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror

                    <label for="confirm_password" class="col-span-3 whitespace-nowrap">Confirm New Password:</label>
                    <input type="password" name="confirm_password" class="form-input col-span-5" placeholder="********">
                    @error ('confirm_password') <p class="col-start-4 col-span-5 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
                </div>
            
            
                <div class="flex gap-3 justify-end p-3 w-full">
                    <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Close</button>
                    <button type="submit" class="save-btn bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Save</button>
                </div>
            </form>
        </div>
        
        {{-- EDIT MODAL --}}
        <div id="edit-modal-body" class="modal hidden fixed top-[10%] bg-white rounded-xl w-[600px] drop-shadow-lg overflow-hidden">
            <div class="relative px-6 py-4">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-[10%] hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>Edit Profile</strong></h2>
            </div>

            <form action="{{url('users/update/'.auth()->user()->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col w-full h-[500px] overflow-y-scroll border lg:min-h-[600px]">
                    <div class="lg:grid lg:grid-cols-4 p-10 gap-x-6 gap-y-6 items-center">                  
                        <label for="first_name" class="col-span-1 whitespace-nowrap">First Name:</label>
                        <input type="text" name="first_name" class="form-input" value={{auth()->user()->first_name}}>
                        @error ('first_name') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
    
                        <label for="middle_name" class="col-span-1 whitespace-nowrap">Middle Name:</label>
                        <input type="text" name="middle_name" class="form-input" value={{auth()->user()->middle_name}}>
                        @error ('middle_name') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
    
                        <label for="last_name" class="col-span-1 whitespace-nowrap">Last Name:</label>
                        <input type="text" name="last_name" class="form-input" value={{auth()->user()->last_name}}>
                        @error ('last_name') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror 
    
                        <label for="username" class="col-span-1 whitespace-nowrap">Username:</label>
                        <input type="text" name="username" class="form-input" value={{auth()->user()->username}} readonly>
                        
                        <label for="role" class="col-span-1 whitespace-nowrap">Role:</label>
                        <input id="role-input" type="text" name="role" class="form-input" value={{auth()->user()->role}} readonly>
                        
                        <label for="specialization" class="col-span-1 whitespace-nowrap">Specialization:</label>
                        <select id="specialization-input" name="specialization" class="form-input">
                            <option value="Admin" {{auth()->user()->specialization == 'Admin' ? 'selected' : ''}}>Admin</option>
                            <option value="Doctor" {{auth()->user()->specialization == 'Doctor' ? 'selected' : ''}}>Doctor</option>
                            <option value="Barangay Health Worker" {{auth()->user()->specialization == 'Barangay Health Worker' ? 'selected' : ''}}>Barangay Health Worker</option>
                        </select>
                        @error ('specialization') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
    
                        <label for="birthday" class="col-span-1 whitespace-nowrap">Birthdate:</label>
                        <input type="date" name="birthday" class="form-input" max="9999-12-31" value={{auth()->user()->birthday}}>
                        @error ('birthday') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
    
                        <label for="contact" class="col-span-1 whitespace-nowrap">Mobile No:</label>
                        <input type="text" name="contact" class="form-input" value={{auth()->user()->contact}}>
                        @error ('contact') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
    
                        <label for="email" class="col-span-1 whitespace-nowrap">Email Address:</label>
                        <input type="text" name="email" class="form-input" value={{auth()->user()->email}}>
                        @error ('email') <p class="col-start-2 col-span-3 text-sm text-red -mt-2 mb-2 lg:-mt-4 lg:mb-0"> {{$message}} </p> @enderror
                    </div>

                </div>
                <div class="flex gap-3 justify-end p-3 w-full">
                    <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Close</button>
                    <button type="submit" class="save-btn bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Save</button>
                </div>
            </form>
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
                            <h3 class="text-center text-2xl font-medium leading-8">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</h3>
                            <div class="text-center text-sm font-semibold mb-2">
                                <p>{{auth()->user()->role}}</p>
                            </div>
                            <div class="flex gap-2 justify-center">
                                <button id="edit" class="w-max px-4 py-2 mb-8 self-center bg-primary text-light hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 rounded duration-100">
                                    <p class="text-sm">Edit Profile</p>
                                </button>
                                <button id="change-password" class="w-max px-6 py-2 mb-8 self-center bg-primary text-light hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 rounded duration-100">
                                    <p class="text-sm">Change Password</p>
                                </button>
                            </div>
                            
                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Username</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        {{auth()->user()->username}}
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Role</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        {{auth()->user()->role}}
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Specialization</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        {{ auth()->user()->specialization ? auth()->user()->specialization : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Email address</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        {{auth()->user()->email ? auth()->user()->email : 'N/A'}}
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Birthday</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        {{auth()->user()->birthday}}
                                    </p>
                                </div>
                            </div>

                            <div class="relative cursor-pointer px-6 mb-3">
                                <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                    <div class="flex items-center">
                                        <h3 class="text-lg font-bold">Mobile number</h3>
                                    </div>
                                    <p class="text-gray-600 pl-2">
                                        {{auth()->user()->contact ? auth()->user()->contact : 'N/A'}}
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

@vite('resources/js/dashboard.js')
@vite('resources/js/role.js')