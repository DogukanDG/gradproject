<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Edit Listing
                    </h2>
                    <p class="mb-4">Edit:{{ $listing['title'] }}</p>
                </header>

                <form method="POST" action="/listings/{{ $listing['id'] }}" enctype="multipart/form-data">
                    @csrf {{-- This is for preventing people from submiting a form from their website to yours --}}
                    @php
                        
                    @endphp
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">Company Name</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                            value="{{ $listing['name'] }}" />
                        @error('name')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                            value="{{ $listing['title'] }}" placeholder="Example: Senior Laravel Developer" />
                        @error('title')
                            <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                            value="{{ $listing['location'] }}" placeholder="Example: Remote, Boston MA, etc" />
                        @error('location')
                            <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                            value="{{ $listing['email'] }}" />
                        @error('email')
                            <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                        @enderror
                    </div>

                    @php
                        $skills_array = json_decode($listing['skills'], true);
                    @endphp
                    {{-- <p class="inline-block text-lg mb-2">Skills</p>
                    <br>
                    <div class="bg-white shadow-md p-4 rounded-md flex justify-center">
                        <div id="skills" class="justify-center">
                            <div class="form-group">
                                @foreach ($skills_array as $index => $skill)
                                    <label for="skill{{ $index + 1 }}"></label>
                                    <div class="relative inline-block mt-3 w-80">
                                        <select id="skill{{ $index + 1 }}" name="skills[]"
                                            class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="laravel" {{ $skill === 'laravel' ? 'selected' : '' }}>
                                                Laravel</option>
                                            <option value="flutter" {{ $skill === 'flutter' ? 'selected' : '' }}>
                                                Flutter</option>
                                            <option value="javascript" {{ $skill === 'javascript' ? 'selected' : '' }}>
                                                JavaScript</option>
                                            <option value="back-end" {{ $skill === 'back-end' ? 'selected' : '' }}>Back
                                                End</option>
                                            <option value="front-end" {{ $skill === 'front-end' ? 'selected' : '' }}>
                                                Front End</option>
                                            <option value="mobile-development"
                                                {{ $skill === 'mobile-development' ? 'selected' : '' }}>Mobile
                                                Development</option>
                                            <option value="web-development"
                                                {{ $skill === 'web-development' ? 'selected' : '' }}>Web Development
                                            </option>
                                            <option value="sql" {{ $skill === 'sql' ? 'selected' : '' }}>SQL
                                            </option>
                                        </select>
                                        <div class="ml-1"></div>
                                    </div>
                                @endforeach
                            </div>
                            @error('skills')
                                <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="button" id="add-skill"
                        class="w-full px-4 py-2 mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                        skill</button>

                    <!-- JavaScript -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var skillCount =
                                {{ count($skills_array) }}; // Initialize the count with the number of skills from the database

                            $('#add-skill').click(function() {
                                skillCount++;

                                var newskill = '<div class="form-group">' +
                                    '<label for="skill' + skillCount + '"></label>' +
                                    '<div class="relative inline-block mt-3 w-80">' +
                                    '<select id="skill' + skillCount +
                                    '" name="skills[]" class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">' +
                                    '<option value="laravel">Laravel</option>' +
                                    '<option value="flutter">Flutter</option>' +
                                    '<option value="sql">SQL</option>' +
                                    '<option value="javascript">JavaScript</option>' +
                                    ' <option value="back-end">Back End</option>' +
                                    '<option value="front-end">Front End</option>' +
                                    '<option value="mobile-development">Mobile Development</option>' +
                                    ' <option value="web-development">Web Development</option>' +
                                    '</select>' +
                                    '</div>' +
                                    '<button type="button" class="remove-skill inline-block ml-1 text-red-500 ml-2">X</button>' +
                                    '</div>';

                                $('#skills').append(newskill);
                            });

                            $('#skills').on('click', '.remove-skill', function() {
                                $(this).parent().remove();
                                skillCount--;
                            });
                        });
                    </script> --}}

                    <p class="inline-block text-lg mb-2">Skills</p>
                    <br>
                    <div class="bg-white shadow-md p-4 rounded-md ">
                        <div id="skills">
                            <div
                                class="form-group ml-2 >
                                @foreach ($skills_array as $index => $skill)
<label for="skill{{ $index + 1 }}">
                                </label>
                                <div class="mt-3 ml-2">
                                    <div class="flex justify-center">
                                        <select id="skill{{ $index + 1 }}" name="skills[]"
                                            class="w-60 py-2 pl-3 mr-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="laravel" {{ $skill === 'laravel' ? 'selected' : '' }}>
                                                Laravel</option>
                                            <option value="flutter" {{ $skill === 'flutter' ? 'selected' : '' }}>
                                                Flutter</option>
                                            <option value="javascript" {{ $skill === 'javascript' ? 'selected' : '' }}>
                                                JavaScript</option>
                                            <option value="back-end" {{ $skill === 'back-end' ? 'selected' : '' }}>
                                                Back End</option>
                                            <option value="front-end" {{ $skill === 'front-end' ? 'selected' : '' }}>
                                                Front End</option>
                                            <option value="mobile-development"
                                                {{ $skill === 'mobile-development' ? 'selected' : '' }}>Mobile
                                                Development</option>
                                            <option value="web-development"
                                                {{ $skill === 'web-development' ? 'selected' : '' }}>Web
                                                Development</option>
                                            <option value="sql" {{ $skill === 'sql' ? 'selected' : '' }}>SQL
                                            </option>
                                        </select>
                                        @if ($index > 0)
                                            <button type="button"
                                                class="remove-skill  text-red-500 self-center">X</button>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-skill"
                        class="w-full px-4 py-2 mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                        skill</button>

                    <!-- JavaScript -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var skillCount = {{ count($skills_array) }};

                            $('#add-skill').click(function() {
                                skillCount++;

                                var newskill = '<div class="form-group ml-8">' +
                                    '<label for="skill' + skillCount + '"></label>' +
                                    '<div class="mt-3">' +
                                    '<div class="flex justify-center mr-4">' +
                                    '<select id="skill' + skillCount +
                                    '" name="skills[]" class="w-60 py-2 pl-3 mr-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">' +
                                    '<option value="laravel">Laravel</option>' +
                                    '<option value="flutter">Flutter</option>' +
                                    '<option value="sql">SQL</option>' +
                                    '<option value="javascript">JavaScript</option>' +
                                    '<option value="back-end">Back End</option>' +
                                    '<option value="front-end">Front End</option>' +
                                    '<option value="mobile-development">Mobile Development</option>' +
                                    '<option value="web-development">Web Development</option>' +
                                    '</select>' +
                                    '<button type="button" class="remove-skill  text-red-500 self-center">X</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                                $('#skills').append(newskill);
                            });

                            $('#skills').on('click', '.remove-skill', function() {
                                $(this).parent().remove();
                                skillCount--;
                            });
                        });
                    </script>


                    <div class="mb-6 mt-4">
                        <label for="logo" class="inline-block text-lg mb-2">
                            Company Logo
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                        <img class="w-48 mr-6 mb-6 "
                            src="{{ $listing['logo'] ? asset('storage/' . $listing['logo']) : asset('/images/no-image.png') }}"
                            alt="" />
                        @error('logo')
                            <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6 mt-4">
                        <label for="description" class="inline-block text-lg mb-2">
                            Job Description
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            value="{{ $listing['description'] }}">{{ $listing['description'] }}</textarea>
                        @error('description')
                            <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Edit Listing
                        </button>

                        <a href="/" class="text-black ml-4"> Back </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layout>
