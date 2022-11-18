@props(['book'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$book->cover ? asset('storage/'. $book->cover) : asset('images/default.jpg')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/books/{{$book->id}}">{{$book->title}}</a>
            </h3>
            <x-genre :genre="$book->genre"/>
            <div class="text-lg mt-4">
                <h2 class="text-1xl">
                    Language: <a href="/?language={{$book->language}}">{{$book->language}}</a>
                </h2>

            </div>
        </div>
    </div>
    </x-card>