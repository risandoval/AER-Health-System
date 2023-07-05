<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach ($client as $users)
    <tr class="border border-transparent y-10 {{!($loop->last) ? "border-b-light-gray" : ""}}">
        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->ONE_EF_LASTNAME}}</td>
        <td class="text-left lg:px-6 py-3 sticky left-0 bg-white px-6 whitespace-nowrap">{{$users->id}}</td>
        <td class="text-left px-6 py-3">
            <div class="flex gap-[6px]">
                <a href="{{url("/client/view/$users->id")}}">
                    <button class="text-white bg-primary px-4 py-2 rounded-full hover:bg-white hover:text-primary hover:ring-primary hover:ring-1 duration-100">View</button>
                </a>
                {{-- <form action="{{url("/users/archive/$users->id")}}" method="POST" class="flex flex-col">
                    @method('put')   
                    @csrf
                    <button type="submit" class="text-white bg-red px-4 py-2 rounded-full hover:bg-white hover:text-red hover:ring-red hover:ring-1 duration-100">Archive</button>
                </form> --}}

            </div>
        </td>
    </tr>
@endforeach

    
</body>
</html>
