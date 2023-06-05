<x-layout>
    <section class="bg-white ">
        <div class="grid py-8 px-4 mx-auto max-w-screen-xl lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="place-self-center mr-auto lg:col-span-7">
                <h1 class="mb-4 max-w-2xl text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl ">
                    Welcome to Work Link - Your Connection to Opportunities!</h1>
                <p class="mb-6 max-w-2xl font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl ">Are
                    you a job seeker looking for the perfect career opportunity? Or an employer seeking talented
                    individuals to join your team? Look no further! Work Link is your one-stop destination for
                    connecting job seekers and employers, making the hiring process seamless and efficient.</p>
                <a href="/newregister"
                    class="inline-flex justify-center items-center py-3 px-5 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
                    Sign Up Now
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('/images/homepageimages/handshake.jpg') }}" alt="mockup">
            </div>
        </div>
    </section>

    <section class="bg-white ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 lg:mb-16">
                Join Work Link today and unlock a world of possibilities. Start your journey towards professional
                success now!"</h2>
        </div>
    </section>



    <section class="bg-white ">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg">
                <h2 class="mb-4 text-4xl font-extrabold text-gray-900 ">Work Link: Unlocking
                    Opportunities with Innovative Solutions!</h2>
                <p class="mb-4">At Work Link, we understand the challenges faced by both job seekers and employers in
                    today's competitive market. That's why we've developed a cutting-edge platform that revolutionizes
                    the way connections are made.</p>
                <p>For job seekers, Work Link offers a seamless experience to discover, explore, and apply for a wide
                    range of career opportunities. Our user-friendly interface empowers you to showcase your skills,
                    create an impressive profile, and connect directly with top employers in your desired field. Let us
                    be your guide as you navigate the path to professional success.</p>
                <p>Employers, we've got you covered too! Work Link provides a powerful platform to streamline your
                    hiring process</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="{{ asset('/images/homepageimages/work1.jpg') }}"
                    alt="office content 1">
                <img class="mt-4 w-full rounded-lg lg:mt-10" src="{{ asset('/images/homepageimages/work2.jpg') }}"
                    alt="office content 2">
            </div>
        </div>
    </section>

    <section class="bg-gray-50 ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg ">
                <h2 class="mb-4 text-4xl font-bold text-gray-900 ">Work Link: Connecting Opportunities
                    for a Growing Community of Professionals!</h2>
                <p class="mb-4 font-light">Work Link connects job seekers and employers, providing a platform that
                    fosters collaboration and growth. Together, we are building a vibrant ecosystem of talent and
                    organizations, all driven by the shared goal of success.</p>
                <p class="mb-4 font-medium">Discover a multitude of opportunities tailored to your unique skills and
                    aspirations. Our community is expanding every day, offering a diverse range of roles and industries
                    for you to explore. Whether you're just starting your journey or seeking new horizons</p>

            </div>
        </div>
    </section>

    <section class="bg-white ">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-4xl font-extrabold leading-tight text-gray-900 ">Sign Up Now</h2>
                <p class="mb-6 font-light text-gray-500  md:text-lg">Discover the Power of Work Link –
                    Your Free Gateway to Opportunities!</p>
                <a href="/newregister"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Register
                    Now</a>
            </div>
        </div>
    </section>

    <footer class="p-4 bg-gray-50 sm:p-6 ">
        <div class="mx-auto max-w-screen-xl">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a class="flex items-center">
                        <img src="{{ asset('/images/homepageimages/worklink1.png') }}" class="mr-3 h-8"
                            alt="FlowBite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap ">WorkLink</span>
                    </a>
                </div>

            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center ">© 2023 <a class="hover:underline">WorkLink™</a>. All
                    Rights Reserved.
                </span>

            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</x-layout>
