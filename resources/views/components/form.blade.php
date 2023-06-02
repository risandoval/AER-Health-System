{{-- forms in forgot password --}}

<section class="bg-light bg-cover min-h-screen flex items-center justify-center" style="background-image:url('/images/bg-login.png')">
    <!-- form container -->
    <div class="bg-white flex max-w-lg md:max-w-2xl rounded-lg shadow-lg items-center"> <!-- max-w-3xl -->
        <!-- form content -->
        <div class="px-4 md:px-6 py-5 mx-2"> <!-- md:w-1/2 -->
            {{ $slot }}
        </div>
    </div>
</section>