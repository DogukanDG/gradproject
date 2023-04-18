<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Create a Gig
                    </h2>
                    <p class="mb-4">Post a gig to find a developer</p>
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
                            <div class="form-group">
                                <label for="education1">Education 1:</label>
                                <input type="text" id="education1" name="educations[]">
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
                    <div class="mb-6">
                        <label for="tags" class="inline-block text-lg mb-2">Skills</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                            value="{{ old('tags') }}" />
                        @error('tags')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="desired_roles" class="inline-block text-lg mb-2">Desired Roles</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="desired_roles"
                            value="{{ old('desired_roles') }}" />
                        @error('desired_roles')
                            <p class='text-red-500 text-xs mt-0.5'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
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
