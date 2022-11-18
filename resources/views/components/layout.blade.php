<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            gray: "#7c7c7c"
                        },
                    },
                },
            };
        </script>
        <title>Book Store</title>
    </head>
    <body class="mb-48">
        <nav class="items-center mb-4">
            <ul class="flex justify-between space-x-6 mr-6 text-lg">
                <li class="mt-2">
                    <div class="mt-2 ">
                        <a href="/" class="transition ease-in-out delay hover:bg-black hover:text-white
                        border rounded border-black p-2 mt-10 "> bookStore</a></div>
                </li>
                @auth
                <div class="flex space-between space-x-6">
                    <li>
                        <div class="mt-2 ">
                            <span class="font-bold">
                                Welcome {{auth()->user()->name}}
                            </span>
                           </div>
                    </li>
                    <li class="mt-2">|</li>
                    <li>
                        <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button class="mt-2 hover:text-gray hover:underline" type="submit">
                            logout
                        </button>
                    </form>
                    </li>
                </div>
                @else
                <div class="flex space-between space-x-6">
                    <li class="mt-2">
                        <a href="/register" class="mr-10 hover:text-laravel"
                            ><i class="fa-solid fa-user-plus"></i> Register</a
                        >
                    </li>
                    <li class="mt-2">|</li>
                    <li class="mt-2">
                        <a href="/login" class="hover:text-laravel"
                            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a
                        >
                    </li>
                </div>
                @endauth
            </ul>
        </nav>
    <main>
        {{$slot}}
    </main>

    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-gray text-white h-24 mt-24 opacity-90 md:justify-center"
>

    <a
        href="/books/create"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
        >Add Book</a
    >
</footer>

</body>
</html>