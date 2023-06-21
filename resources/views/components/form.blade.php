{{-- forms in forgot password --}}

<section class="bg-light bg-cover min-h-screen flex items-center justify-center" style="background-image:url('/images/bg-login.png')">
    <!-- form container -->
    <div {{$attributes->merge(['class' => 'bg-white max-w-lg md:max-w-2xl rounded-lg shadow-lg'])}}>
        <!-- form content -->
        <div class="p-5 mx-2">
            {{ $slot }}
        </div>
    </div>
</section>