<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Announcement</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex content-center justify-center">
    <!-- outer container -->
    <div class="w-4/5 px-10 py-10 mt-10 mb-10 border border-gray-300 rounded-sm shadow-lg">
        <!-- header (profile) -->
        <header>
            <!-- social icons-->

            <div class="flex items-center justify-between">
                <div>
                    <div class="bg-no-repeat bg-cover rounded-full h-52 w-52"
                        style="background-image: url(../img/cat2.jpg)">
                    </div>
                </div>
                <div class="grid justify-items-end">
                    {{-- <img class="w-48 mr-6 mb-6 rounded-full"
                        src="{{ $logo ? storage_path('public\storage\logos\bckNvHsGPngiww7bOXdfyNxD1X3yoVoWmoGjCNG2.png') : asset('/images/no-image.png') }}"
                        alt="" /> --}}
                    <h1 class="font-extrabold text-7xl">{{ $name }}</h1>
                    <p class="mt-5 text-xl">{{ $title }}</p>
                </div>
            </div>
        </header>

        <main class="flex mt-10 gap-x-10">
            <strong class="text-xl font-medium">Date: {{ $date }}</strong>
            <div class="w-2/6">

                <strong class="text-xl font-medium">Contact Information</strong>
                <ul class="mt-2 mb-10">
                    <li class="px-2 mt-1"><strong class="mr-1">E-mail </strong>
                        <a href="mailto:" class="block">{{ $email }}</a>
                    </li>
                    <li class="px-2 mt-1"><strong class="mr-1">Location:</strong><span class="block">
                            {{ $location }}</span></li>
                </ul>


                <div>
                    <strong class="mb-10 text-xl font-medium">Required Skills: </strong>
                    <ul class="inline-block space-x-4">
                        @foreach ($skills as $skill)
                            <li class="pt-2">
                                <p class="text-sm">{{ $skill }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="w-4/6">
                <section>

                    <h2 class="pb-1 text-2xl font-semibold border-b">
                        Information About The Job</h2>
                    <p style="width:100%;word-break:break-word;" class="mt-4 text-xs">{{ $description }} </p>

                </section>
            </div>
        </main>

    </div>
</body>

</html>
