<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Create a Listing
                    </h2>
                    <p class="mb-4">Post a listing to find a job</p>
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
                        <input placeholder="Example:Cyprus, Remote etc" type="text"
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
                                <div class="inline-block mt-3 w-80">
                                    <select id="skill1" name="skills[]"
                                        class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="">Select a skill</option>
                                        <option value="Accounting">Accounting</option>
                                        <option value="Active listening">Active listening</option>
                                        <option value="Adaptability">Adaptability</option>
                                        <option value="Agile methodology">Agile methodology</option>
                                        <option value="Analytical thinking">Analytical thinking</option>
                                        <option value="Android development">Android development</option>
                                        <option value="Angular">Angular</option>
                                        <option value="ASP.NET">ASP.NET</option>
                                        <option value="Assembly">Assembly</option>
                                        <option value="Attention to detail">Attention to detail</option>
                                        <option value="Big data analytics">Big data analytics</option>
                                        <option value="Blockchain">Blockchain</option>
                                        <option value="Business acumen">Business acumen</option>
                                        <option value="Business analysis">Business analysis</option>
                                        <option value="Business development">Business development</option>
                                        <option value="Business strategy">Business strategy</option>
                                        <option value="CAD modeling">CAD modeling</option>
                                        <option value="C++">C++</option>
                                        <option value="C#">C#</option>
                                        <option value="Client relationship management">Client relationship management
                                        </option>
                                        <option value="Cobol">Cobol</option>
                                        <option value="Collaboration">Collaboration</option>
                                        <option value="Competitive analysis">Competitive analysis</option>
                                        <option value="Conflict resolution">Conflict resolution</option>
                                        <option value="Content management">Content management</option>
                                        <option value="Contract management">Contract management</option>
                                        <option value="Copy editing">Copy editing</option>
                                        <option value="Copywriting">Copywriting</option>
                                        <option value="Critical thinking">Critical thinking</option>
                                        <option value="Crisis communication">Crisis communication</option>
                                        <option value="CSS">CSS</option>
                                        <option value="Customer service">Customer service</option>
                                        <option value="DART">DART</option>
                                        <option value="Data analysis">Data analysis</option>
                                        <option value="Data engineering">Data engineering</option>
                                        <option value="Data ethics">Data ethics</option>
                                        <option value="Data governance">Data governance</option>
                                        <option value="Data management and analysis">Data management and analysis
                                        </option>
                                        <option value="Data mining">Data mining</option>
                                        <option value="Data privacy and compliance">Data privacy and compliance</option>
                                        <option value="Data science">Data science</option>
                                        <option value="Data storytelling">Data storytelling</option>
                                        <option value="Data validation">Data validation</option>
                                        <option value="Data visualization">Data visualization</option>
                                        <option value="Database management">Database management</option>
                                        <option value="Database querying">Database querying</option>
                                        <option value="Decision-making">Decision-making</option>
                                        <option value="Decision-making under pressure">Decision-making under pressure
                                        </option>
                                        <option value="Deep learning">Deep learning</option>
                                        <option value="DevOps">DevOps</option>
                                        <option value="Digital advertising">Digital advertising</option>
                                        <option value="Digital literacy">Digital literacy</option>
                                        <option value="Digital marketing skills">Digital marketing skills</option>
                                        <option value="Digital transformation strategies">Digital transformation
                                            strategies</option>
                                        <option value="Docker">Docker</option>
                                        <option value="Effective communication">Effective communication</option>
                                        <option value="Emotional intelligence">Emotional intelligence</option>
                                        <option value="Employee engagement">Employee engagement</option>
                                        <option value="Event planning">Event planning</option>
                                        <option value="Excel">Excel</option>
                                        <option value="Executive leadership">Executive leadership</option>
                                        <option value="Financial analysis">Financial analysis</option>
                                        <option value="Flexibility">Flexibility</option>
                                        <option value="Front-end development">Front-end development</option>
                                        <option value="Game development">Game development</option>
                                        <option value="Genetic algorithms">Genetic algorithms</option>
                                        <option value="Git">Git</option>
                                        <option value="Goal setting">Goal setting</option>
                                        <option value="Graphic design">Graphic design</option>
                                        <option value="HTML">HTML</option>
                                        <option value="Human resources">Human resources</option>
                                        <option value="Innovation">Innovation</option>
                                        <option value="Information architecture">Information architecture</option>
                                        <option value="Interpersonal skills">Interpersonal skills</option>
                                        <option value="Interviewing">Interviewing</option>
                                        <option value="Investment analysis">Investment analysis</option>
                                        <option value="Java">Java</option>
                                        <option value="JavaScript">JavaScript</option>
                                        <option value="Jenkins">Jenkins</option>
                                        <option value="Leadership">Leadership</option>
                                        <option value="Machine learning">Machine learning</option>
                                        <option value="Machine vision">Machine vision</option>
                                        <option value="Management">Management</option>
                                        <option value="Market research">Market research</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Matlab">Matlab</option>
                                        <option value="Microsoft Office Suite">Microsoft Office Suite</option>
                                        <option value="Mobile app development">Mobile app development</option>
                                        <option value="Negotiation">Negotiation</option>
                                        <option value="Network security">Network security</option>
                                        <option value="Node.js">Node.js</option>
                                        <option value="Organizational skills">Organizational skills</option>
                                        <option value="Pascal">Pascal</option>
                                        <option value="Patience">Patience</option>
                                        <option value="Perl">Perl</option>
                                        <option value="PHP">PHP</option>
                                        <option value="Problem-solving">Problem-solving</option>
                                        <option value="Process improvement">Process improvement</option>
                                        <option value="Product management">Product management</option>
                                        <option value="Project management">Project management</option>
                                        <option value="Python">Python</option>
                                        <option value="Quantum computing">Quantum computing</option>
                                        <option value="React">React</option>
                                        <option value="Research">Research</option>
                                        <option value="Risk management">Risk management</option>
                                        <option value="Robotics">Robotics</option>
                                        <option value="Ruby">Ruby</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Sales management">Sales management</option>
                                        <option value="Scrum">Scrum</option>
                                        <option value="SEO">SEO</option>
                                        <option value="Social media advertising">Social media advertising</option>
                                        <option value="Social media marketing">Social media marketing</option>
                                        <option value="Software development">Software development</option>
                                        <option value="Software testing">Software testing</option>
                                        <option value="SQL">SQL</option>
                                        <option value="Strategic planning">Strategic planning</option>
                                        <option value="Supervision">Supervision</option>
                                        <option value="Swift">Swift</option>
                                        <option value="Tableau">Tableau</option>
                                        <option value="Teamwork">Teamwork</option>
                                        <option value="Time management">Time management</option>
                                        <option value="Troubleshooting">Troubleshooting</option>
                                        <option value="UI/UX design">UI/UX design</option>
                                        <option value="Verbal communication">Verbal communication</option>
                                        <option value="Virtual collaboration">Virtual collaboration</option>
                                        <option value="Virtual reality">Virtual reality</option>
                                        <option value="Visual design">Visual design</option>
                                        <option value="Web design">Web design</option>
                                        <option value="Web development">Web development</option>
                                        <option value="Written communication">Written communication</option>
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

                                var selectedSkills = [];
                                $('.skills-select').each(function() {
                                    var selectedValue = $(this).val();
                                    if (selectedValue !== '') {
                                        selectedSkills.push(selectedValue);
                                    }
                                });

                                var newskill = '<div class="form-group">' +
                                    '<label for="skill' + skillCount + '"></label>' +
                                    '<div class="inline-block mt-3 w-80">' +
                                    '<select id="skill' + skillCount +
                                    '" name="skills[]" class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md skills-select">' +
                                    '<option value="">Select a skill</option>';

                                var allSkills = [
                                    "Accounting", "Active listening", "Adaptability", "Agile methodology",
                                    "Analytical thinking", "Android development", "Angular",
                                    "ASP.NET", "Assembly", "Attention to detail", "Big data analytics",
                                    "Bioinformatics", "Blockchain", "Business acumen",
                                    "Business analysis", "Business development", "Business strategy", "CAD modeling",
                                    "C++", "C#", "Client relationship management",
                                    "Cloud computing", "Collaboration", "Competitive analysis", "Conflict resolution",
                                    "Content management", "Content marketing",
                                    "Contract management", "Copy editing", "Copywriting", "Critical thinking",
                                    "Crisis communication", "CSS", "Customer service",
                                    "DART", "Data analysis", "Data engineering", "Data ethics", "Data governance",
                                    "Data management and analysis", "Data mining",
                                    "Data privacy and compliance", "Data science", "Data storytelling",
                                    "Data validation", "Data visualization", "Database management",
                                    "Database querying", "Decision-making", "Decision-making under pressure",
                                    "Deep learning", "DevOps", "Digital advertising",
                                    "Digital literacy", "Digital marketing skills", "Digital transformation strategies",
                                    "Docker", "Effective communication",
                                    "Emotional intelligence", "Employee engagement", "Event planning", "Excel",
                                    "Executive leadership", "Financial analysis",
                                    "Flexibility", "Front-end development", "Game development", "Genetic algorithms",
                                    "Git", "Goal setting", "Graphic design",
                                    "HTML", "Human resources", "Information architecture", "Innovation",
                                    "Interpersonal skills", "Interviewing", "Investment analysis",
                                    "Java", "JavaScript", "Jenkins", "Leadership", "Machine learning", "Machine vision",
                                    "Management", "Market research",
                                    "Marketing", "Matlab", "Microsoft Office Suite", "Mobile app development",
                                    "Negotiation", "Neural networks", "Network security",
                                    "Node.js", "Organizational skills", "Pascal", "Patience", "Perl", "PHP",
                                    "Problem-solving", "Process improvement", "Product management",
                                    "Project management", "Python", "Quantum computing", "React", "Research",
                                    "Risk management", "Robotics", "Ruby", "Sales",
                                    "Sales management", "Scrum", "SEO", "Social media advertising",
                                    "Social media marketing", "Software development", "Software testing",
                                    "SQL", "Strategic planning", "Supervision", "Swift", "Tableau", "Teamwork",
                                    "Time management", "Troubleshooting", "UI/UX design",
                                    "Verbal communication", "Virtual collaboration", "Virtual reality", "Visual design",
                                    "Web design", "Web development",
                                    "Written communication"
                                ];

                                allSkills.sort();

                                for (var i = 0; i < allSkills.length; i++) {
                                    var skill = allSkills[i];
                                    if (!selectedSkills.includes(skill)) {
                                        newskill += '<option value="' + skill + '">' + skill + '</option>';
                                    }
                                }

                                newskill += '</select>' +
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
