<x-layout class="bg-light">
    <section class="flex justify-center w-full pt-navbar pb-10">
        {{-- success/fail message --}}
        <x-messages class="absolute w-[410px] top-[85px]">
        </x-messages>
        
        <div class="flex flex-col bg-white min-w-[400px] md:w-[570px] min-h-[600px] rounded-xl drop-shadow-lg mt-12 mx-4">
            <div class="px-6 py-4">
                <h2 class="text-xl"><strong id="userTitle">{{$errors->any() ? 'Edit User Information' : 'User Information'}}</strong></h2>
                @if(session('error'))
                    <p class="text-red text-xs p-1">
                        {{ session('error') }}  
                    </p>
                @endif
            </div>
            
            <form action="{{route('update',['id'=>$viewUser->id])}}" method="POST" id="userForm">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap border-y gap-5 px-6 py-8">    
                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="first_name" class="md:col-span-2 whitespace-nowrap">First Name:</label>
                        <input type="text" name="first_name" value="{{$viewUser->first_name}}" {{$errors->any() ? '' : 'disabled'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0 disabled:mb-0">
                        @error ('first_name') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="middle_name" class="md:col-span-2 whitespace-nowrap">Middle Name:</label>
                        <input type="text" name="middle_name" value="{{$viewUser->middle_name}}" {{$errors->any() ? '' : 'disabled'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                        @error ('middle_name') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="last_name" class="md:col-span-2 whitespace-nowrap">Last Name:</label>
                        <input type="text" name="last_name" value="{{$viewUser->last_name}}" {{$errors->any() ? '' : 'disabled'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                        @error ('last_name') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="username" class="md:col-span-2 whitespace-nowrap">Username:</label>
                        <input type="text" name="username" value="{{$viewUser->username}}" readonly class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="role" class="md:col-span-2 whitespace-nowrap">Role:</label>
                        <input id="role-input" type="text" name="role" value="{{$viewUser->role}}" readonly class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                    </div>
                    
                    @if (!($viewUser->role == 'Admin'))
                        @if ($viewUser->role == 'Doctor')
                            <div id="specialization-field" class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                                <label for="specialization" class="md:col-span-2 whitespace-nowrap">Specialization:</label>
                                <input type="text" name="specialization" value="{{$viewUser->specialization}}" readonly {{$errors->any() ? 'hidden' : ''}} class="display-input form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                                <select type="text" name="specialization" {{$errors->any() ? '' : 'disabled'}} {{$errors->any() ? '' : 'hidden'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                                    <option value="Pediatrics" {{$viewUser->specialization == 'Pediatrics' ? 'selected' : ''}}>Pediatrics</option>
                                    <option value="Geriatrics" {{$viewUser->specialization == 'Geriatrics' ? 'selected' : ''}}>Geriatrics</option>
                                    <option value="Orthopedics" {{$viewUser->specialization == 'Orthopedics' ? 'selected' : ''}}>Orthopedics</option>
                                    <option value="Anesthesiology" {{$viewUser->specialization == 'Anesthesiology' ? 'selected' : ''}}>Anesthesiology</option>
                                    <option value="Cardiology" {{$viewUser->specialization == 'Cardiology' ? 'selected' : ''}}>Cardiology</option>
                                    <option value="Dermatology" {{$viewUser->specialization == 'Dermatology' ? 'selected' : ''}}>Dermatology</option>
                                    <option value="Urology" {{$viewUser->specialization == 'Urology' ? 'selected' : ''}}>Urology</option>
                                    <option value="Neurology" {{$viewUser->specialization == 'Neurology' ? 'selected' : ''}}>Neurology</option>
                                    <option value="Radiology" {{$viewUser->specialization == 'Neurology' ? 'selected' : ''}}>Radiology</option>
                                </select>
                                @error ('specialization') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                            </div>
                        @else
                        <div id="barangay-field" class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                            <label for="barangay" class="md:col-span-2 whitespace-nowrap">Barangay:</label>
                            <input type="text" name="barangay" value="{{$viewUser->barangay}}" readonly {{$errors->any() ? 'hidden' : ''}} class="display-input form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0" >
                            <select type="text" name="barangay" {{$errors->any() ? '' : 'disabled'}} {{$errors->any() ? '' : 'hidden'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0" >
                                <option value="Burak" {{$viewUser->barangay == 'Burak' ? 'selected' : ''}}>Burak</option>
                                <option value="Canmogsay" {{$viewUser->barangay == 'Canmogsay' ? 'selected' : ''}}>Canmogsay</option>
                                <option value="Cantariwis" {{$viewUser->barangay == 'Cantariwis' ? 'selected' : ''}}>Cantariwis</option>
                                <option value="Capangihan" {{$viewUser->barangay == 'Capangihan' ? 'selected' : ''}}>Capangihan</option>
                                <option value="Doña Brigida" {{$viewUser->barangay == 'Doña Brigida' ? 'selected' : ''}}>Doña Brigida</option>
                                <option value="Imelda" {{$viewUser->barangay == 'Imelda' ? 'selected' : ''}}>Imelda</option>
                                <option value="Malbog" {{$viewUser->barangay == 'Malbog' ? 'selected' : ''}}>Malbog</option>
                                <option value="Olot" {{$viewUser->barangay == 'Olot' ? 'selected' : ''}}>Olot</option>
                                <option value="Opong" {{$viewUser->barangay == 'Opong' ? 'selected' : ''}}>Opong</option>
                                <option value="Poblacion" {{$viewUser->barangay == 'Poblacion' ? 'selected' : ''}}>Poblacion</option>
                                <option value="Quilao" {{$viewUser->barangay == 'Quilao' ? 'selected' : ''}}>Quilao</option>
                                <option value="San Roque" {{$viewUser->barangay == 'San Roque' ? 'selected' : ''}}>San Roque</option>
                                <option value="San Vicente" {{$viewUser->barangay == 'San Vicente' ? 'selected' : ''}}>San Vicente</option>
                                <option value="Tanghas" {{$viewUser->barangay == 'Tanghas' ? 'selected' : ''}}>Tanghas</option>
                                <option value="Telegrafo" {{$viewUser->barangay == 'Telegrafo' ? 'selected' : ''}}>Telegrafo</option>
                            </select>
                            @error ('barangay') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                        </div>
                        @endif
                    @endif

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="birthday" class="md:col-span-2 whitespace-nowrap">Birthday:</label>
                        <input type="date" name="birthday" value="{{$viewUser->birthday}}" {{$errors->any() ? '' : 'disabled'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                        @error ('birthday') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="contact" class="md:col-span-2 whitespace-nowrap">Mobile No:</label>
                        <input type="text" name="contact" value="{{$viewUser->contact}}" {{$errors->any() ? '' : 'disabled'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                        @error ('contact') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>

                    <div class="flex-wrap items-center md:grid md:grid-cols-12 w-full">
                        <label for="email" class="md:col-span-2 whitespace-nowrap">Email Address:</label>
                        <input type="text" name="email" value="{{$viewUser->email}}" {{$errors->any() ? '' : 'disabled'}} class="form-input md:col-start-4 md:col-span-10 focus:ring-0:mb-0">
                        @error ('email') <p class="md:col-start-4 md:col-span-10 text-sm text-red -mb-3"> {{$message}} </p> @enderror
                    </div>
                </div>
                
                <div class="flex gap-3 justify-end p-3">
                    <button id="closeButton" type="button" class="close-btn bg-gray-200 text-black text-sm rounded-full px-4 py-2 hover:bg-black hover:text-white">{{$errors->any() ? 'Cancel' : 'Close'}}</button>
                    <button id="editButton" class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">{{$errors->any() ? 'Save' : 'Edit'}}</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>

@vite('resources/js/form.js')