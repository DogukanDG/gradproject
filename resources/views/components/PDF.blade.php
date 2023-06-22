<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
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
                    <h1 class="font-extrabold text-7xl">{{ $name }} {{ $last_name }}</h1>
                    <p class="mt-5 text-xl">{{ $title }}</p>
                </div>
            </div>
        </header>
        <!-- detailed info -->
        <main class="flex mt-10 gap-x-10">
            <strong class="text-xl font-medium">Date: {{ $date }}</strong>
            <div class="w-2/6">
                <!-- contact details -->
                <strong class="text-xl font-medium">Contact Information</strong>
                <ul class="mt-2 mb-10">
                    <li class="px-2 mt-1"><strong class="mr-1">Phone Number: </strong>
                        <a href="tel:+821023456789" class="block">{{ $phone }}</a>
                    </li>
                    <li class="px-2 mt-1"><strong class="mr-1">E-mail </strong>
                        <a href="mailto:" class="block">{{ $email }}</a>
                    </li>
                    <li class="px-2 mt-1"><strong class="mr-1">Location:</strong><span class="block">
                            {{ $location }}</span></li>
                </ul>
                <!-- skills -->

                <div>
                    <strong class="mb-10 text-xl font-medium">Skills: </strong>
                    <ul class="mt-2">
                        @foreach ($skills as $skill)
                            <li class="pt-2">
                                <p class="flex justify-between text-sm">{{ $skill }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="mt-5">
                <strong class="text-xl font-medium">Experience Level: {{ $experience }}</strong>
            </div>
            <div class="w-4/6">
                <section>

                    <h2 class="pb-1 text-2xl font-semibold border-b">Information About Me</h2>
                    <p style="width:100%;word-break:break-word; class="mt-4 text-xs">{{ $description }} </p>

                </section>
                <section>

                    <h2 class="pb-1 mt-6 text-2xl font-semibold border-b">Education</h2>
                    <ul class="mt-2">
                        @foreach ($education as $edu)
                            <li class="pt-2">
                                <p class="flex justify-between text-sm">{{ $edu }}</p>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </main>

    </div>
</body>

</html>
