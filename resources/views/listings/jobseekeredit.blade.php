<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Edit Listing
                    </h2>
                    <p class="mb-4">Post a Listing to find a job</p>
                </header>

                <form method="POST" action="/job-seekers/{{ $jobseekerlisting['id'] }}" enctype="multipart/form-data">
                    @csrf {{-- This is for preventing people from submiting a form from their website to yours --}}
                    @php
                        
                    @endphp
                    @method('PUT')
                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Title</label>
                        <input placeholder="Example:Senior Laravel Developer, etc" type="text"
                            class="border border-gray-200 rounded p-2 w-full" name="title"
                            value="{{ $jobseekerlisting['title'] }}" />
                        @error('title')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Location</label>
                        <input placeholder="Example:Boston MA, etc" type="text"
                            class="border border-gray-200 rounded p-2 w-full" name="location"
                            value="{{ $jobseekerlisting['location'] }}" />
                        @error('location')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="mb-6">
                        <label for="education" class="inline-block text-lg mb-2">Education</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="education"
                            value="{{ old('education') }}" />
                    </div> --}}
                    {{-- Educations --}}
                    {{-- <div>
                        <div id="educations">
                            <div class="form-group">
                                <label for="education1">Education 1:</label>
                                <input value="{{ $jobseekerlisting['educations'] }}" type="text" id="education1"
                                    name="educations[0]">
                            </div>
                            @error('educations')
                                <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="button" id="add-education">Add Education</button>
                    </div>
                    <!-- JavaScript -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var educationCount = 1;

                            $('#add-education').click(function() {
                                educationCount++;

                                var newEducation = '<div class="form-group">' +
                                    '<label for="education' + educationCount + '">Education ' + educationCount +
                                    ':</label>' +
                                    '<input type="text" id="education' + educationCount + '" name="educations[]">' +
                                    '<button type="button" class="remove-education">Remove</button>' +
                                    '</div>';

                                $('#educations').append(newEducation);
                            });

                            $('#educations').on('click', '.remove-education', function() {
                                $(this).parent().remove();
                                educationCount--;
                            });
                        });
                    </script> --}}
                    <div>
                        <div id="educations">
                            @if (isset($jobseekerlisting))
                                @foreach (json_decode($jobseekerlisting['educations']) as $key => $education)
                                    <div class="form-group">
                                        <label for="education{{ $key + 1 }}" class="font-medium">Education:</label>
                                        <input
                                            class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                            value="{{ $education }}" type="text" id="education{{ $key + 1 }}"
                                            name="educations[{{ $key }}]">
                                        @if ($key > 0)
                                            <button type="button"
                                                class="remove-education px-2 py-1 mt-1 text-white bg-red-500 rounded-md hover:bg-red-600">Remove</button>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <label for="education1" class="font-medium">Education 1:</label>
                                    <input type="text" id="education1" name="educations[]"
                                        class="border-gray-200 rounded p-2 w-full">
                                </div>
                            @endif
                            @error('educations')
                                <p class="text-red-500 text-xs mt-0.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <button
                            class="add-item w-full px-4 py-2 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-600"
                            type="button" id="add-education">Add Education</button>
                    </div>

                    <!-- JavaScript -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var educationCount =
                                {{ isset($jobseekerlisting) ? count(json_decode($jobseekerlisting['educations'])) : 1 }};

                            $('#add-education').click(function() {
                                educationCount++;

                                var newEducation = `
                                    <div class="form-group">
                                        <label for="education${educationCount}" class="font-medium">Education ${educationCount}:</label>
                                        <input type="text" id="education${educationCount}" name="educations[]"
                                            class="border-gray-200 rounded p-2 w-full">
                                        <button type="button" class="remove-education px-2 py-1 mt-1 text-white bg-red-500 rounded-md hover:bg-red-600">Remove</button>
                                    </div>
                                `;

                                $('#educations').append(newEducation);
                            });

                            $('#educations').on('click', '.remove-education', function() {
                                $(this).parent().remove();
                                educationCount--;
                            });
                        });
                    </script>

                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">
                            Experience Level
                        </label>
                        <select name='experience' class="border border-gray-200 rounded p-2 w-full">
                            <option value="entry" selected="selected">Entry-Level</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="expert">Expert</option>
                        </select>

                    </div>
                    @php
                        $skills_array = json_decode($jobseekerlisting['skills'], true);
                    @endphp
                    <p class="inline-block text-lg mb-2">Skills</p>
                    <br>
                    <div class="bg-white shadow-md p-4 rounded-md ">
                        <div id="skills">
                            <div class="form-group ml-2">
                                @foreach ($skills_array as $index => $skill)
                                    <label for="skill{{ $index + 1 }}"></label>
                                    <div class="mt-3 ml-2"">
                                        <div class="flex justify-center">
                                            <select id="skill{{ $index + 1 }}" name="skills[]"
                                                class="w-60 py-2 pl-3 mr-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                <option value="laravel" {{ $skill === 'laravel' ? 'selected' : '' }}>
                                                    Laravel</option>
                                                <option value="flutter" {{ $skill === 'flutter' ? 'selected' : '' }}>
                                                    Flutter</option>
                                                <option value="javascript"
                                                    {{ $skill === 'javascript' ? 'selected' : '' }}>JavaScript</option>
                                                <option value="back-end" {{ $skill === 'back-end' ? 'selected' : '' }}>
                                                    Back End</option>
                                                <option value="front-end"
                                                    {{ $skill === 'front-end' ? 'selected' : '' }}>Front End</option>
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
                                    '<div class="mt-3 ">' +
                                    '<div class="flex justify-center mr-4">' +
                                    '<select id="skill' + skillCount +
                                    '" name="skills[]" class="w-60 py-2 pl-3 mr-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">' +
                                    '<option value="laravel">Laravel</option>' +
                                    '<option value="flutter">Flutter</option>' +
                                    '<option value="sql">SQL</option>' +
                                    '<option value="javascript">JavaScript</option>' +
                                    ' <option value="back-end">Back End</option>' +
                                    '<option value="front-end">Front End</option>' +
                                    '<option value="mobile-development">Mobile Development</option>' +
                                    ' <option value="web-development">Web Development</option>' +
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

                    <div class="mb-6 mt-3">
                        <label for="cv" class="inline-block text-lg mb-2">
                            CV
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full"
                            value="{{ $jobseekerlisting['cv'] }}" name="cv" />
                        @error('cv')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">
                            Description
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            value="{{ $jobseekerlisting['description'] }}" placeholder="Include tasks, requirements, salary, etc">{{ $jobseekerlisting['description'] }}</textarea>
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
