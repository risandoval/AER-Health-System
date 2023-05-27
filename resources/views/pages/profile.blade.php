<x-layout>
    <div class="mt-20">
        {{-- cover pic --}}
        <div class="h-40 overflow-hidden">
            <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
        </div>
        
        <div class="mx-10 md:mx-30 lg:mx-40">
            {{-- profile pic --}}
            <div class="flex flex-col mx-8">
                <div class="flex flex-col sm:flex-row w-full text-center sm:text-left">
                    <img class="flex-shrink-0 m-4 w-40 h-40 rounded-full bg-gray-400 self-center -mt-10 border-4 border-primary rounded-full overflow-hidden" src="https://tailwindcss.com/_next/static/media/ryan-florence.3af9c9d9.jpg" alt="Profile Picture"  loading="lazy" decoding="async">
                    <div class="flex flex-col py-2 pr-2">
                        <h4 class="text-3xl font-medium text-black">{{ $user->name }}</h4>
                        {{-- <p class="text-sm font-hairline">System Administrator </p> --}}
                        <button class="w-max self-center md:self-start bg-primary text-light hover:bg-secondary rounded duration-400 px-6 mt-2">
                            <a href="#" class="text-sm duration-400">Edit Profile</a>
                        </button>
                    </div>
                </div>
            </div>

            {{-- personal info --}}
            <div class="bg-white mx-10 mt-8 shadow overflow-hidden sm:rounded-lg">
            
                {{-- <div class="px-4 py-5 sm:px-6 bg-light">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Personal Information
                    </h3>
                </div> --}}
                <div class="">
                    <dl>
                        <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 ">
                            <dt class="text-md font-medium text-gray-500">
                                Username
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->username }}
                            </dd>
                        </div>
                        <div class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-500">
                                Role
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->role }}
                            </dd>
                        </div>
                        {{-- If admin, doctor, and other health professional --}}
                        <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-500">
                                Specialization
                            </dt>
                            <dd class="mt-1 textmd text-gray-900 sm:mt-0 sm:col-span-2">
                                Secretary
                            </dd>
                        </div>
                        {{-- If barangay health worker --}}
                        {{-- <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-500">
                                Assigned Barangay
                            </dt>
                            <dd class="mt-1 textmd text-gray-900 sm:mt-0 sm:col-span-2">
                                Tolosa, Leyte
                            </dd>
                        </div> --}}
                        <div class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-500">
                                Email address
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $user->email }}
                            </dd>
                        </div>
                        <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-500">
                                Birthday
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                1978-08-23
                            </dd>
                        </div>
                        <div class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-500">
                                Mobile Number
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                09123456789
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</x-layout>