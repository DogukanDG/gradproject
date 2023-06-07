<x-layout>
    @php
        $user = auth()->user();
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <h3 class="text-2xl mb-2">{{ $jobseekerlisting['title'] }}</h3>
                <div class="text-xl font-bold mb-4">{{ $jobseekerlisting['name'] }}</div>
                <x-listing-tags :listing_data="$jobseekerlisting" />
               
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $jobseekerlisting['location'] }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{ $jobseekerlisting['description'] }}
                        </p>

                        <a href="mailto:{{ $jobseekerlisting['email'] }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Job Seeker</a>

                        <a href="{{ route('jobseeker.download', ['jobseekerlisting' => $jobseekerlisting]) }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Download CV</a>
                        @if ($user)
                            @if ($user['role'] == 'employer')
                                <button type="button"
                                    class="focus:outline-none openModal text-white text-sm py-2.5 px-5 mt-5 mx-5  rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">Send
                                    Offer
                                </button>
                                <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title"
                                    role="dialog" aria-modal="true" id="interestModal">
                                    <div
                                        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                            aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                            aria-hidden="true">​</span>
                                        <div
                                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start items-center justify-center">
                                                    <div class="mt-5 py-10 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900 text-center"
                                                            id="modal-title">
                                                            Offer Form
                                                        </h3>
                                                        <div class="mt-8 items-center justify-center">
                                                            <form method="POST" action="/storeoffer "
                                                                enctype="multipart/form-data">
                                                                @csrf 
                                                                <div class="mb-6">
                                                                    <label for="sender_email"
                                                                        class="inline-block text-lg mb-2">Contact
                                                                        Email</label>
                                                                    <input type="text"
                                                                        class="border border-gray-200 rounded p-2 w-full"
                                                                        name="sender_email"
                                                                        value={{ auth()->user()->email }} />

                                                                </div>
                                                                <input type="hidden" name="listing_id"
                                                                    value={{ $jobseekerlisting['id'] }}>
                                                                <div class="mb-6">

                                                                    <label for="phone_number"
                                                                        class="inline-block text-lg mb-2">Contact
                                                                        Number</label>
                                                                    <input type="text"
                                                                        class="border border-gray-200 rounded p-2 w-full"
                                                                        name="phone_number"
                                                                        placeholder="+90 --- --- ----" />

                                                                </div>
                                                                <div class="mb-6">
                                                                    <label for="description"
                                                                        class="inline-block text-lg mb-2">
                                                                        Information
                                                                    </label>
                                                                    <textarea name="description" id="description" rows="4"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                                        placeholder="Include Work Hours, Salary etc."></textarea>
                                                                </div>
                                                                <div
                                                                    class="justify-between bg-gray-50 py-3  sm:flex sm:flex-row-reverse">
                                                                    <button type="submit"
                                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Send Offer
                                                                    </button>
                                                                    <button type="button"
                                                                        class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                                <p></p>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div></div>
                        @endif
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('.openModal').on('click', function(e) {
                                    $('#interestModal').removeClass('invisible');
                                });
                                $('.closeModal').on('click', function(e) {
                                    $('#interestModal').addClass('invisible');
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">{{ $jobseekerlisting->title }}</h2>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Name:</span>
                        <span>{{ $jobseekerlisting->name }}</span>
                    </div>
                    <div class="mb-4">
                        @php
                            $education = json_decode($jobseekerlisting->educations, true);
                        @endphp
                        <span class="font-bold text-gray-600">Education:</span>
                        @foreach ($education as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Experience:</span>
                        <span>{{ $jobseekerlisting->experience }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Location:</span>
                        <span>{{ $jobseekerlisting->location }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Email:</span>
                        <span>{{ $jobseekerlisting->email }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">CV:</span>
                        <a href="{{ $jobseekerlisting->cv }}" class="text-blue-600">{{ $jobseekerlisting->cv }}</a>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold text-gray-600">Desired Roles:</span>
                        <span>{{ $jobseekerlisting->desired_roles }}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-600">Description:</span>
                        <p class="mt-2">{{ $jobseekerlisting->description }}</p>
                    </div>
                </div>
                <a class=" text-black" href="/job-seekers/{{ $jobseekerlisting['id'] }}/edit" target="_self"
                    class=""><i class="fa-solid fa-edit"></i>
                    Edit</a>
                <form method="POST" action="/job-seekers/{{ $jobseekerlisting['id'] }}">
                    @csrf
                    @method ('DELETE')
                    <button type='submit' class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                </form>
            </div>
        </div>
        @if ($jobseekerlisting['user_id'] == auth()->user()->id)
            <div class="flex bg-white text-white mt-5 py-2  justify-center rounded-xl align-center space-x-6">
                <a class=" text-black" href="/listings/{{ $jobseekerlisting['id'] }}/edit" target="_self"
                    class=""><i class="fa-solid fa-edit"></i>
                    Edit</a>
                <form method="POST" action="/listings/{{ $jobseekerlisting['id'] }} class">
                    @csrf
                    @method ('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                </form>
            </div>
        @else
            <div></div>
        @endif
    </div> --}}
    <div class="flex flex-wrap justify-center">
        <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
            <div class="py-6 px-3 mt-32 sm:mt-0">
                <a href="mailto:{{ $jobseekerlisting['email'] }}"style="background-color: blue;"
                    class="bg-green-400 active:bg-green-600  uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                    type="button">
                    Contact Job-Seeker
                </a>
                @if ($user)
                    @if ($user->role == 'employer')
                        <a href="{{ route('jobseeker.download', ['jobseekerlisting' => $jobseekerlisting]) }}"
                            class="bg-blue-400 active:bg-blue-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"><i
                                class="fa-solid fa-download"></i>
                            Download CV</a>
                        <button type="button"
                            class="openModal bg-green-400 active:bg-green-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">Send
                            Offer
                        </button>
                        <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title"
                            role="dialog" aria-modal="true" id="interestModal">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                    aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true">​</span>
                                <div
                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start items-center justify-center">
                                            <div class="mt-5 py-10 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900 text-center"
                                                    id="modal-title">
                                                    Offer Form
                                                </h3>
                                                <div class="mt-8 items-center justify-center">
                                                    <form method="POST" action="/storeoffer"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-6">
                                                            <label for="sender_email"
                                                                class="inline-block text-lg mb-2">Contact
                                                                Email</label>
                                                            <input type="text"
                                                                class="border border-gray-200 rounded p-2 w-full"
                                                                name="sender_email" value={{ auth()->user()->email }} />
                                                        </div>
                                                        <input type="hidden" name="listing_id"
                                                            value={{ $jobseekerlisting['id'] }}>
                                                        <div class="mb-6">
                                                            <label for="phone_number"
                                                                class="inline-block text-lg mb-2">Contact
                                                                Number</label>
                                                            <input type="text"
                                                                class="border border-gray-200 rounded p-2 w-full"
                                                                name="phone_number" placeholder="+90 --- --- ----" />

                                                        </div>
                                                        <div class="mb-6">
                                                            <label for="description" class="inline-block text-lg mb-2">
                                                                Information
                                                            </label>
                                                            <textarea name="description" id="description" rows="4"
                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                                placeholder="Include Work Hours, Salary etc."></textarea>
                                                        </div>
                                                        <div
                                                            class="justify-between bg-gray-50 py-3  sm:flex sm:flex-row-reverse">
                                                            <button type="submit"
                                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Send Application
                                                            </button>
                                                            <button type="button"
                                                                class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            $('.openModal').on('click', function(e) {
                                                                $('#interestModal').removeClass('invisible');
                                                            });
                                                            $('.closeModal').on('click', function(e) {
                                                                $('#interestModal').addClass('invisible');
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div></div>
                    @endif

                @endif
            </div>
        </div>
        <div class="w-full lg:w-4/12 px-4 lg:order-1">

        </div>
    </div>
    <div class="text-center mt-12">
        <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
            {{ $jobseekerlisting->name }}
        </h3>

        <h5 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2"> {{ $jobseekerlisting->title }}
        </h5>
        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
            {{ $jobseekerlisting->location }}
        </div>
        <h5 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2"> Required Skills</h5>
        @php
            $tags = json_decode($jobseekerlisting['skills']);
            $educations = json_decode($jobseekerlisting['educations']);
        @endphp
        @foreach ($tags as $tag)
            <span style="background-color: blue;"
                class="uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150">{{ $tag }}</span>
        @endforeach
        <h5 class="mt-4 text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">Education </h5>
        @foreach ($educations as $education)
            <ul class="flex justify-center">
                <li class="text-black text-md px-3 py-1 flex items-center mt-3">
                    <span class="h-2 w-2 bg-black rounded-full mr-2"></span>
                    <span>{{ $education }}</span>
                </li>
            </ul>
        @endforeach
    </div>


    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
        <div class="flex flex-wrap justify-center">
            <div class="w-full lg:w-9/12 px-4">
                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                    {{ $jobseekerlisting->description }}

                </p>

            </div>
        </div>
    </div>
    @if ($jobseekerlisting['user_id'] == auth()->user()->id)
        <div class="flex bg-white text-white mt-5 py-2  justify-center rounded-xl align-center space-x-6">
            <a class=" text-black" href="/job-seekers/{{ $jobseekerlisting['id'] }}/edit" target="_self"
                class=""><i class="fa-solid fa-edit"></i>
                Edit</a>
            <form method="POST" action="/job-seekers/{{ $jobseekerlisting['id'] }} class">
                @csrf
                @method ('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
            </form>
        </div>
    @else
        <div></div>
    @endif
</x-layout>
