<x-layout>
    {{-- @include('partials._search') --}}
    
    
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
    <x-card>
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{$book->cover ? asset('storage/'. $book->cover) : asset('images/default.jpg')}}"
                alt=""
            />
    
            <h3 class="text-2xl mb-2">{{$book->title}}</h3>
            <x-genre :genre="$book->genre"/>
            <div class="text-xl mb-4">Language: {{$book->language}}</div>
    
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Book Description
                </h3>
                <div class="text-lg space-y-6">
                    {{$book->description}}
                </div>
            </div>
        </div>
    </x-card>
    
    <x-card class=" flex  mt-4 p-2 flex space-x-6">
        <div class="inline hover:text-gray">
            <a href="/books/{{$book->id}}/edit">
                {{-- edit icon --}}
                <i class="fa-solid fa-pencil"></i>
                Edit
            </a>
            
        </div>
    <form method="POST" action="/books/{{$book->id}}">
        @csrf
        @method('DELETE')
        <button class="text-black hover:text-gray">
            {{-- delete icon --}}
            <i class="fa-solid fa-trash"></i>
            Delete
        </button>
    </form>

    </x-card>

    
    </div>
    
    
    
    </x-layout>