<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit : {{$book->title}}
        </h2>
    </header>
    
    <form method="POST" action="/books/{{$book->id}}" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label
                for="title"
                class="inline-block text-lg mb-2"
                >Title</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title" value="{{$book->title}}"
            />
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label for="genre" class="inline-block text-lg mb-2"
                >Genre</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="genre"
                placeholder="Horror, thriller, ..."
                value="{{$book->genre}}"
            />
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label
                for="language"
                class="inline-block text-lg mb-2"
                >Language</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="language"
                placeholder="en, esp, ...."
                value="{{$book->language}}"
            />
            @error('language')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="cover" class="inline-block text-lg mb-2">
                Book cover
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="cover"
            />
            <img class="w-48 mr-6 mb-6 mt-5" src="{{
                $book->cover ? asset('storage/'.$book->cover):
                asset('/images/default.jpg')
            }}" alt="">
            @error('cover')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Book Description
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="About this book ..."
                >{{$book->description}}
            </textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="mb-6">
            <button
                class="bg-black text-white rounded py-2 px-4 hover:bg-gray"
            >
                Edit Book
            </button>
    
            <a href="/" class="text-black ml-4 hover:text-gray"> Back </a>
        </div>
    </form>
    </x-card>
    
    </x-layout>