<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Create a Listing
                    </h2>
                    <p class="mb-4">Post a listing to find a developer</p>
                </header>

                <form method="POST" action="/jobseekerlistings" enctype="multipart/form-data">
                    @csrf {{-- This is for preventing people from submiting a form from their website to yours --}}

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Title</label>
                        <input placeholder="Example:Senior Laravel Developer, etc" type="text"
                            class="border border-gray-200 rounded p-2 w-full" name="title"
                            value="{{ old('title') }}" />
                        @error('title')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Location</label>
                        <input placeholder="Example:Boston MA, etc" type="text"
                            class="border border-gray-200 rounded p-2 w-full" name="location"
                            value="{{ old('location') }}" />
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
                    <div>
                        <div id="educations">
                            <div class="mb-4">
                                <label for="education1" class="block font-medium">Education 1:</label>
                                <input type="text" id="education1" name="educations[]"
                                    class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            @error('educations')
                                <p class="text-red-500 text-xs mt-0.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="button" id="add-education"
                            class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600">Add
                            Education</button>
                    </div>

                    <!-- JavaScript -->
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var educationCount = 1;

                            $('#add-education').click(function() {
                                educationCount++;

                                var newEducation = `
                                    <div class="mb-4">
                                        <label for="education${educationCount}" class="block font-medium">Education ${educationCount}:</label>
                                        <input type="text" id="education${educationCount}" name="educations[]" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
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


                    <div class="mb-6 mt-3">
                        <label for="name" class="inline-block text-lg mb-2">
                            Experience Level
                        </label>
                        <select name='experience' class="border border-gray-200 rounded p-2 w-full">
                            <option value="entry" selected="selected">Entry-Level</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="expert">Expert</option>
                        </select>

                    </div>
                    <p class="inline-block text-lg mb-2">Skills</p><br>
                    <div class="bg-white shadow-md p-4 rounded-md flex justify-center">

                        <div id="skills">
                            <div class="form-group ">

                                <label for="skill1"></label>
                                <div class="relative inline-block mt-3 w-80">
                                    <select id="skill1" name="skills[]"
                                        class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="laravel">Laravel</option>
                                        <option value="flutter">Flutter</option>
                                        <option value="javascript">JavaScript</option>
                                        <option value="back-end">Back End</option>
                                        <option value="front-end">Front End</option>
                                        <option value="mobile-development">Mobile Development</option>
                                        <option value="web-development">Web Development</option>
                                        <option value="sql">SQL</option>
                                    </select>
                                    <div class="ml-1"></div>
                                </div>
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
                            var skillCount = 1;

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
                    </script>
                    <div class="mb-6 mt-3">
                        <label for="cv" class="inline-block text-lg mb-2">
                            CV
                        </label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="cv" />
                        @error('cv')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">
                            Description
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            value={{ old('description') }} placeholder="Include tasks, requirements, salary, etc"></textarea>
                    </div>

                    <div class="mb-6">
                        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Create Listing
                        </button>

                        <a href="/listings/manage" class="text-black ml-4"> Back </a>
                    </div>
                </form>

            </div>
        </div>
    </main>
</x-layout>
