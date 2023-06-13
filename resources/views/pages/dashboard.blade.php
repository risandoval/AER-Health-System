<x-layout>
    {{-- MODAL --}}
    {{-- {{dd("url("users/update/".auth()->user()->id)")}} --}}
    {{-- <div id="modal-background" class="{{$errors->any() ? 'flex' : 'hidden'}} absolute z-10 top-[-10%] left-0 h-full w-full bg-black bg-opacity-30 items-center justify-center"> --}}
        {{-- CHANGE PASSWORD MODAL --}}
        <div id="change-password-modal-body" class="{{($errors->any() && !(session()->has('changePassSuccess'))) ? 'flex' : 'hidden'}} flex-col modal top-[10%] bg-white rounded-xl w-[600px] drop-shadow-lg overflow-hidden m-4 py-4">            
            <div class="items-center px-6 mb-2">
                <i class="close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-3 hover:cursor-pointer"></i>
                <h2 class="text-xl"><strong>Change Password</strong></h2>
            </div>

            <form action="{{url('users/update/password/'.auth()->user()->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col px-6 py-8 border-y">
                    <div class="items-center grid grid-cols-8 mt-3">
                        <label for="current_password" class="col-span-8 sm:col-span-3">Current Password:</label>
                        <input type="password" name="current_password" class="form-input col-span-8 sm:col-span-5" placeholder="********">
                        @error ('password') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                    </div>

                    <div class="items-center grid grid-cols-8 mt-3">
                        <label for="new_password" class="col-span-8 sm:col-span-3">New Password:</label>
                        <input type="password" name="new_password" class="form-input col-span-8 sm:col-span-5" placeholder="********">
                        @error ('new_password') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                    </div>
                    
                    <div class="items-center grid grid-cols-8 mt-3 mb-1">
                        <label for="confirm_password" class="col-span-8 sm:col-span-3">Confirm Password:</label>
                        <input type="password" name="confirm_password" class="form-input col-span-8 sm:col-span-5" placeholder="********">
                        @error ('confirm_password') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                    </div>
                </div>
            
                <div class="flex items-center gap-2 justify-end w-full px-3 pt-3">
                    <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Close</button>
                    <button type="submit" class="save-btn bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Save</button>
                </div>
            </form>
        </div>
        
        {{-- EDIT MODAL --}}
        <div id="edit-modal-body" class=" {{($errors->any() && session()->has('success')) ? 'flex' : 'hidden'}} flex-col modal top-[10%] bg-white rounded-xl w-[600px] drop-shadow-lg overflow-hidden m-4 py-4">
            <div class="items-center px-6 mb-2">
                <i class='close-btn bx bx-x text-gray-400 absolute text-2xl right-2 top-3 hover:cursor-pointer'></i>
                <h2 class="text-xl"><strong>Edit Profile</strong></h2>
            </div>

            <form action="{{url('users/update/'.auth()->user()->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col w-full h-[500px] border border-y overflow-y-scroll px-6 py-8">
                        <div class="items-center grid grid-cols-8">
                            <label for="first_name" class="col-span-8 sm:col-span-2">First Name:</label>
                            <input type="text" name="first_name" class="form-input col-span-8 sm:col-span-6" value="{{auth()->user()->first_name}}">
                            @error ('first_name') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror    
                        </div>           
                        
                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="middle_name" class="col-span-8 sm:col-span-2">Middle Name:</label>
                            <input type="text" name="middle_name" class="form-input col-span-8 sm:col-span-6" value="{{auth()->user()->middle_name}}">
                            @error ('middle_name') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror    
                        </div>         
    
                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="last_name" class="col-span-8 sm:col-span-2">Last Name:</label>
                            <input type="text" name="last_name" class="form-input col-span-8 sm:col-span-6" value="{{auth()->user()->last_name}}">
                            @error ('last_name') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                        </div>
    
                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="username" class="col-span-8 sm:col-span-2">Username:</label>
                            <input type="text" name="username" class="form-input col-span-8 sm:col-span-6 read-only:mb-0" value="{{auth()->user()->username}}" readonly>
                        </div>

                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="role" class="col-span-8 sm:col-span-2">Role:</label>
                            <input type="text" name="role" class="form-input col-span-8 sm:col-span-6 read-only:mb-0 whitespace-nowrap" value="{{auth()->user()->role}}" readonly>
                        </div>

                        @if (!(auth()->user()->role == 'Admin'))
                            @if (auth()->user()->role == 'Doctor')
                                <div id="specialization-field" class="items-center grid grid-cols-8 mt-3">
                                    <label for="specialization" class="col-span-8 sm:col-span-2">Specialization:</label>
                                    <select name="specialization" class="form-input col-span-8 sm:col-span-6">
                                        <option value="Pediatrics" {{auth()->user()->specialization == 'Pediatrics' ? 'selected' : ''}}>Pediatrics</option>
                                        <option value="Geriatrics" {{auth()->user()->specialization == 'Geriatrics' ? 'selected' : ''}}>Geriatrics</option>
                                        <option value="Orthopedics" {{auth()->user()->specialization == 'Orthopedics' ? 'selected' : ''}}>Orthopedics</option>
                                        <option value="Anesthesiology" {{auth()->user()->specialization == 'Anesthesiology' ? 'selected' : ''}}>Anesthesiology</option>
                                        <option value="Cardiology" {{auth()->user()->specialization == 'Cardiology' ? 'selected' : ''}}>Cardiology</option>
                                        <option value="Dermatology" {{auth()->user()->specialization == 'Dermatology' ? 'selected' : ''}}>Dermatology</option>
                                        <option value="Urology" {{auth()->user()->specialization == 'Urology' ? 'selected' : ''}}>Urology</option>
                                        <option value="Neurology" {{auth()->user()->specialization == 'Neurology' ? 'selected' : ''}}>Neurology</option>
                                        <option value="Radiology" {{auth()->user()->specialization == 'Neurology' ? 'selected' : ''}}>Radiology</option>
                                    </select>
                                    @error ('specialization') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                                </div>
                            @else
                                <div id="barangay-field" class="items-center grid grid-cols-8 mt-3">
                                    <label for="barangay" class="col-span-8 sm:col-span-2">Barangay:</label>
                                    <select name="barangay" class="form-input col-span-8 sm:col-span-6">
                                        <option value="Burak" {{auth()->user()->barangay == 'Burak' ? 'selected' : ''}}>Burak</option>
                                        <option value="Canmogsay" {{auth()->user()->barangay == 'Canmogsay' ? 'selected' : ''}}>Canmogsay</option>
                                        <option value="Cantariwis" {{auth()->user()->barangay == 'Cantariwis' ? 'selected' : ''}}>Cantariwis</option>
                                        <option value="Capangihan" {{auth()->user()->barangay == 'Capangihan' ? 'selected' : ''}}>Capangihan</option>
                                        <option value="Doña Brigida" {{auth()->user()->barangay == 'Doña Brigida' ? 'selected' : ''}}>Doña Brigida</option>
                                        <option value="Imelda" {{auth()->user()->barangay == 'Imelda' ? 'selected' : ''}}>Imelda</option>
                                        <option value="Malbog" {{auth()->user()->barangay == 'Malbog' ? 'selected' : ''}}>Malbog</option>
                                        <option value="Olot" {{auth()->user()->barangay == 'Olot' ? 'selected' : ''}}>Olot</option>
                                        <option value="Opong" {{auth()->user()->barangay == 'Opong' ? 'selected' : ''}}>Opong</option>
                                        <option value="Poblacion" {{auth()->user()->barangay == 'Poblacion' ? 'selected' : ''}}>Poblacion</option>
                                        <option value="Quilao" {{auth()->user()->barangay == 'Quilao' ? 'selected' : ''}}>Quilao</option>
                                        <option value="San Roque" {{auth()->user()->barangay == 'San Roque' ? 'selected' : ''}}>San Roque</option>
                                        <option value="San Vicente" {{auth()->user()->barangay == 'San Vicente' ? 'selected' : ''}}>San Vicente</option>
                                        <option value="Tanghas" {{auth()->user()->barangay == 'Tanghas' ? 'selected' : ''}}>Tanghas</option>
                                    </select>
                                    @error ('specialization') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                                </div>
                            @endif              
                        @endif

                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="birthday" class="col-span-8 sm:col-span-2">Birthdate:</label>
                            <input type="date" name="birthday" class="form-input col-span-8 sm:col-span-6" max="9999-12-31" value="{{auth()->user()->birthday}}">
                            @error ('birthday') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                        </div>

                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="contact" class="col-span-8 sm:col-span-2">Mobile No:</label>
                            <input type="text" name="contact" class="form-input col-span-8 sm:col-span-6" value="{{auth()->user()->contact}}">
                            @error ('contact') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                        </div>

                        <div class="items-center grid grid-cols-8 mt-3">
                            <label for="email" class="col-span-8 sm:col-span-2">Email Address:</label>
                            <input type="text" name="email" class="form-input col-span-8 sm:col-span-6" value="{{auth()->user()->email}}">
                            @error ('email') <p class="col-span-8 sm:col-start-3 sm:col-span-5 text-sm text-red"> {{$message}} </p> @enderror
                        </div>
                </div>
                <div class="flex gap-2 justify-end w-full px-3 pt-3">
                    <button type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">Close</button>
                    <button type="submit" class="save-btn bg-primary text-white text-sm rounded-full px-5 py-2 font-bold hover:bg-white hover:text-primary hover:ring-1 hover:ring-primary">Save</button>
                </div>
            </form>
        </div>
    {{-- </div> --}}

    

    {{-- HOME PAGE --}}
    <div class="flex flex-wrap justify-around mt-20 p-2 bg-light">
        {{-- SUCCESS/FAIL MESSAGE --}}
        @if (session()->has('success'))
            <div id="successMessage" class="z-20 bg-white rounded-xl drop-shadow-lg absolute w-[410px] text-green-700 px-4 py-3" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">Your account details have been saved.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg id="msgCloseButton" class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
                <div id="timerBar" class="bg-green-300 h-1 mt-2"></div>
            </div>
        @elseif ($errors->any())
            <div id="successMessage" class="z-20 bg-white rounded-xl drop-shadow-lg absolute w-[410px] text-red px-4 py-3" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Your account details has failed to update.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg id="msgCloseButton" class="fill-current h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                    </svg>
                </span>
                <div id="timerBar" class="bg-red h-1 mt-2"></div>
            </div>
        @endif

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

                            @if (!(auth()->user()->role == 'Admin'))
                                @if (auth()->user()->role == 'Doctor')
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
                                @else
                                    <div class="relative cursor-pointer px-6 mb-3">
                                        <div class="relative p-2 px-4 bg-white shadow-sm shadow-gray-500/30 hover:scale-105 transition duration-500">
                                            <div class="flex items-center">
                                                <h3 class="text-lg font-bold">Barangay</h3>
                                            </div>
                                            <p class="text-gray-600 pl-2">
                                                {{ auth()->user()->barangay ? auth()->user()->barangay : 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                @endif 
                            @endif

                            

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