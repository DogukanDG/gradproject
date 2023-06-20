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
                            <div class="form-group ml-2 ">
                                @foreach ($skills_array as $index => $skill)
                                    <label for="skill{{ $index + 1 }}">
                                    </label>
                                    <div class="mt-3 ml-2">
                                        <div class="flex justify-center">
                                            <select id="skill{{ $index + 1 }}" name="skills[]"
                                                class="w-60 py-2 pl-3 mr-1 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                <option value="" disabled selected>Select a skill</option>
                                                <option value="Accounting"
                                                    {{ $skill === 'Accounting' ? 'selected' : '' }}>Accounting</option>
                                                <option value="Active listening"
                                                    {{ $skill === 'Active listening' ? 'selected' : '' }}>Active
                                                    listening</option>
                                                <option value="Adaptability"
                                                    {{ $skill === 'Adaptability' ? 'selected' : '' }}>Adaptability
                                                </option>
                                                <option value="Agile methodology"
                                                    {{ $skill === 'Agile methodology' ? 'selected' : '' }}>Agile
                                                    methodology</option>
                                                <option value="Analytical thinking"
                                                    {{ $skill === 'Analytical thinking' ? 'selected' : '' }}>Analytical
                                                    thinking</option>
                                                <option value="Android development"
                                                    {{ $skill === 'Android development' ? 'selected' : '' }}>Android
                                                    development</option>
                                                <option value="Angular" {{ $skill === 'Angular' ? 'selected' : '' }}>
                                                    Angular</option>
                                                <option value="ASP.NET" {{ $skill === 'ASP.NET' ? 'selected' : '' }}>
                                                    ASP.NET</option>
                                                <option value="Assembly" {{ $skill === 'Assembly' ? 'selected' : '' }}>
                                                    Assembly</option>
                                                <option value="Attention to detail"
                                                    {{ $skill === 'Attention to detail' ? 'selected' : '' }}>Attention
                                                    to detail</option>
                                                <option value="Big data analytics"
                                                    {{ $skill === 'Big data analytics' ? 'selected' : '' }}>Big data
                                                    analytics</option>
                                                <option value="Blockchain"
                                                    {{ $skill === 'Blockchain' ? 'selected' : '' }}>Blockchain</option>
                                                <option value="Business acumen"
                                                    {{ $skill === 'Business acumen' ? 'selected' : '' }}>Business
                                                    acumen</option>
                                                <option value="Business analysis"
                                                    {{ $skill === 'Business analysis' ? 'selected' : '' }}>Business
                                                    analysis</option>
                                                <option value="Business development"
                                                    {{ $skill === 'Business development' ? 'selected' : '' }}>Business
                                                    development</option>
                                                <option value="Business strategy"
                                                    {{ $skill === 'Business strategy' ? 'selected' : '' }}>Business
                                                    strategy</option>
                                                <option value="CAD modeling"
                                                    {{ $skill === 'CAD modeling' ? 'selected' : '' }}>CAD modeling
                                                </option>
                                                <option value="C++" {{ $skill === 'C++' ? 'selected' : '' }}>C++
                                                </option>
                                                <option value="C#" {{ $skill === 'C#' ? 'selected' : '' }}>C#
                                                </option>
                                                <option value="Client relationship management"
                                                    {{ $skill === 'Client relationship management' ? 'selected' : '' }}>
                                                    Client relationship management</option>
                                                <option value="Cobol" {{ $skill === 'Cobol' ? 'selected' : '' }}>Cobol
                                                </option>
                                                <option value="Collaboration"
                                                    {{ $skill === 'Collaboration' ? 'selected' : '' }}>Collaboration
                                                </option>
                                                <option value="Competitive analysis"
                                                    {{ $skill === 'Competitive analysis' ? 'selected' : '' }}>
                                                    Competitive analysis</option>
                                                <option value="Conflict resolution"
                                                    {{ $skill === 'Conflict resolution' ? 'selected' : '' }}>Conflict
                                                    resolution</option>
                                                <option value="Content management"
                                                    {{ $skill === 'Content management' ? 'selected' : '' }}>Content
                                                    management</option>
                                                <option value="Contract management"
                                                    {{ $skill === 'Contract management' ? 'selected' : '' }}>Contract
                                                    management</option>
                                                <option value="Copy editing"
                                                    {{ $skill === 'Copy editing' ? 'selected' : '' }}>Copy editing
                                                </option>
                                                <option value="Copywriting"
                                                    {{ $skill === 'Copywriting' ? 'selected' : '' }}>Copywriting
                                                </option>
                                                <option value="Critical thinking"
                                                    {{ $skill === 'Critical thinking' ? 'selected' : '' }}>Critical
                                                    thinking</option>
                                                <option value="Crisis communication"
                                                    {{ $skill === 'Crisis communication' ? 'selected' : '' }}>Crisis
                                                    communication</option>
                                                <option value="CSS" {{ $skill === 'CSS' ? 'selected' : '' }}>CSS
                                                </option>
                                                <option value="Customer service"
                                                    {{ $skill === 'Customer service' ? 'selected' : '' }}>Customer
                                                    service</option>
                                                <option value="DART" {{ $skill === 'DART' ? 'selected' : '' }}>DART
                                                </option>
                                                <option value="Data analysis"
                                                    {{ $skill === 'Data analysis' ? 'selected' : '' }}>Data analysis
                                                </option>
                                                <option value="Data engineering"
                                                    {{ $skill === 'Data engineering' ? 'selected' : '' }}>Data
                                                    engineering</option>
                                                <option value="Data ethics"
                                                    {{ $skill === 'Data ethics' ? 'selected' : '' }}>Data ethics
                                                </option>
                                                <option value="Data governance"
                                                    {{ $skill === 'Data governance' ? 'selected' : '' }}>Data
                                                    governance</option>
                                                <option value="Data management and analysis"
                                                    {{ $skill === 'Data management and analysis' ? 'selected' : '' }}>
                                                    Data management and analysis</option>
                                                <option value="Data mining"
                                                    {{ $skill === 'Data mining' ? 'selected' : '' }}>Data mining
                                                </option>
                                                <option value="Data privacy and compliance"
                                                    {{ $skill === 'Data privacy and compliance' ? 'selected' : '' }}>
                                                    Data privacy and compliance</option>
                                                <option value="Data science"
                                                    {{ $skill === 'Data science' ? 'selected' : '' }}>Data science
                                                </option>
                                                <option value="Data storytelling"
                                                    {{ $skill === 'Data storytelling' ? 'selected' : '' }}>Data
                                                    storytelling</option>
                                                <option value="Data validation"
                                                    {{ $skill === 'Data validation' ? 'selected' : '' }}>Data
                                                    validation</option>
                                                <option value="Data visualization"
                                                    {{ $skill === 'Data visualization' ? 'selected' : '' }}>Data
                                                    visualization</option>
                                                <option value="Database management"
                                                    {{ $skill === 'Database management' ? 'selected' : '' }}>Database
                                                    management</option>
                                                <option value="Database querying"
                                                    {{ $skill === 'Database querying' ? 'selected' : '' }}>Database
                                                    querying</option>
                                                <option value="Decision-making"
                                                    {{ $skill === 'Decision-making' ? 'selected' : '' }}>
                                                    Decision-making</option>
                                                <option value="Decision-making under pressure"
                                                    {{ $skill === 'Decision-making under pressure' ? 'selected' : '' }}>
                                                    Decision-making under pressure</option>
                                                <option value="Deep learning"
                                                    {{ $skill === 'Deep learning' ? 'selected' : '' }}>Deep learning
                                                </option>
                                                <option value="DevOps" {{ $skill === 'DevOps' ? 'selected' : '' }}>
                                                    DevOps</option>
                                                <option value="Digital advertising"
                                                    {{ $skill === 'Digital advertising' ? 'selected' : '' }}>Digital
                                                    advertising</option>
                                                <option value="Digital literacy"
                                                    {{ $skill === 'Digital literacy' ? 'selected' : '' }}>Digital
                                                    literacy</option>
                                                <option value="Digital marketing skills"
                                                    {{ $skill === 'Digital marketing skills' ? 'selected' : '' }}>
                                                    Digital marketing skills</option>
                                                <option value="Digital transformation strategies"
                                                    {{ $skill === 'Digital transformation strategies' ? 'selected' : '' }}>
                                                    Digital transformation strategies</option>
                                                <option value="Docker" {{ $skill === 'Docker' ? 'selected' : '' }}>
                                                    Docker</option>
                                                <option value="Effective communication"
                                                    {{ $skill === 'Effective communication' ? 'selected' : '' }}>
                                                    Effective communication</option>
                                                <option value="Emotional intelligence"
                                                    {{ $skill === 'Emotional intelligence' ? 'selected' : '' }}>
                                                    Emotional intelligence</option>
                                                <option value="Employee engagement"
                                                    {{ $skill === 'Employee engagement' ? 'selected' : '' }}>Employee
                                                    engagement</option>
                                                <option value="Event planning"
                                                    {{ $skill === 'Event planning' ? 'selected' : '' }}>Event planning
                                                </option>
                                                <option value="Excel" {{ $skill === 'Excel' ? 'selected' : '' }}>
                                                    Excel</option>
                                                <option value="Executive leadership"
                                                    {{ $skill === 'Executive leadership' ? 'selected' : '' }}>Executive
                                                    leadership</option>
                                                <option value="Financial analysis"
                                                    {{ $skill === 'Financial analysis' ? 'selected' : '' }}>Financial
                                                    analysis</option>
                                                <option value="Flexibility"
                                                    {{ $skill === 'Flexibility' ? 'selected' : '' }}>Flexibility
                                                </option>
                                                <option value="Front-end development"
                                                    {{ $skill === 'Front-end development' ? 'selected' : '' }}>
                                                    Front-end development</option>
                                                <option value="Game development"
                                                    {{ $skill === 'Game development' ? 'selected' : '' }}>Game
                                                    development</option>
                                                <option value="Genetic algorithms"
                                                    {{ $skill === 'Genetic algorithms' ? 'selected' : '' }}>Genetic
                                                    algorithms</option>
                                                <option value="Git" {{ $skill === 'Git' ? 'selected' : '' }}>Git
                                                </option>
                                                <option value="Goal setting"
                                                    {{ $skill === 'Goal setting' ? 'selected' : '' }}>Goal setting
                                                </option>
                                                <option value="Graphic design"
                                                    {{ $skill === 'Graphic design' ? 'selected' : '' }}>Graphic design
                                                </option>
                                                <option value="HTML" {{ $skill === 'HTML' ? 'selected' : '' }}>HTML
                                                </option>
                                                <option value="Human resources"
                                                    {{ $skill === 'Human resources' ? 'selected' : '' }}>Human
                                                    resources</option>
                                                <option value="Innovation"
                                                    {{ $skill === 'Innovation' ? 'selected' : '' }}>Innovation</option>
                                                <option value="Information architecture"
                                                    {{ $skill === 'Information architecture' ? 'selected' : '' }}>
                                                    Information architecture</option>
                                                <option value="Interpersonal skills"
                                                    {{ $skill === 'Interpersonal skills' ? 'selected' : '' }}>
                                                    Interpersonal skills</option>
                                                <option value="Interviewing"
                                                    {{ $skill === 'Interviewing' ? 'selected' : '' }}>Interviewing
                                                </option>
                                                <option value="iOS development"
                                                    {{ $skill === 'iOS development' ? 'selected' : '' }}>iOS
                                                    development</option>
                                                <option value="Java" {{ $skill === 'Java' ? 'selected' : '' }}>Java
                                                </option>
                                                <option value="JavaScript"
                                                    {{ $skill === 'JavaScript' ? 'selected' : '' }}>JavaScript</option>
                                                <option value="Leadership"
                                                    {{ $skill === 'Leadership' ? 'selected' : '' }}>Leadership</option>
                                                <option value="Machine learning"
                                                    {{ $skill === 'Machine learning' ? 'selected' : '' }}>Machine
                                                    learning</option>
                                                <option value="Management skills"
                                                    {{ $skill === 'Management skills' ? 'selected' : '' }}>Management
                                                    skills</option>
                                                <option value="Marketing strategy"
                                                    {{ $skill === 'Marketing strategy' ? 'selected' : '' }}>Marketing
                                                    strategy</option>
                                                <option value="Matlab" {{ $skill === 'Matlab' ? 'selected' : '' }}>
                                                    Matlab</option>
                                                <option value="Mobile app development"
                                                    {{ $skill === 'Mobile app development' ? 'selected' : '' }}>Mobile
                                                    app development</option>
                                                <option value="MongoDB" {{ $skill === 'MongoDB' ? 'selected' : '' }}>
                                                    MongoDB</option>
                                                <option value="Motivation"
                                                    {{ $skill === 'Motivation' ? 'selected' : '' }}>Motivation</option>
                                                <option value="Multitasking"
                                                    {{ $skill === 'Multitasking' ? 'selected' : '' }}>Multitasking
                                                </option>
                                                <option value="Negotiation"
                                                    {{ $skill === 'Negotiation' ? 'selected' : '' }}>Negotiation
                                                </option>
                                                <option value="Network security"
                                                    {{ $skill === 'Network security' ? 'selected' : '' }}>Network
                                                    security</option>
                                                <option value="Node.js" {{ $skill === 'Node.js' ? 'selected' : '' }}>
                                                    Node.js</option>
                                                <option value="Objective-C"
                                                    {{ $skill === 'Objective-C' ? 'selected' : '' }}>Objective-C
                                                </option>
                                                <option value="Operations management"
                                                    {{ $skill === 'Operations management' ? 'selected' : '' }}>
                                                    Operations management</option>
                                                <option value="Organizational skills"
                                                    {{ $skill === 'Organizational skills' ? 'selected' : '' }}>
                                                    Organizational skills</option>
                                                <option value="Performance management"
                                                    {{ $skill === 'Performance management' ? 'selected' : '' }}>
                                                    Performance management</option>
                                                <option value="Perl" {{ $skill === 'Perl' ? 'selected' : '' }}>Perl
                                                </option>
                                                <option value="Photoshop"
                                                    {{ $skill === 'Photoshop' ? 'selected' : '' }}>Photoshop</option>
                                                <option value="PHP" {{ $skill === 'PHP' ? 'selected' : '' }}>PHP
                                                </option>
                                                <option value="Problem-solving"
                                                    {{ $skill === 'Problem-solving' ? 'selected' : '' }}>
                                                    Problem-solving</option>
                                                <option value="Process improvement"
                                                    {{ $skill === 'Process improvement' ? 'selected' : '' }}>Process
                                                    improvement</option>
                                                <option value="Product management"
                                                    {{ $skill === 'Product management' ? 'selected' : '' }}>Product
                                                    management</option>
                                                <option value="Project management"
                                                    {{ $skill === 'Project management' ? 'selected' : '' }}>Project
                                                    management</option>
                                                <option value="Public speaking"
                                                    {{ $skill === 'Public speaking' ? 'selected' : '' }}>Public
                                                    speaking</option>
                                                <option value="Python" {{ $skill === 'Python' ? 'selected' : '' }}>
                                                    Python</option>
                                                <option value="React" {{ $skill === 'React' ? 'selected' : '' }}>
                                                    React</option>
                                                <option value="Recruiting"
                                                    {{ $skill === 'Recruiting' ? 'selected' : '' }}>Recruiting
                                                </option>
                                                <option value="Research skills"
                                                    {{ $skill === 'Research skills' ? 'selected' : '' }}>Research
                                                    skills</option>
                                                <option value="Risk management"
                                                    {{ $skill === 'Risk management' ? 'selected' : '' }}>Risk
                                                    management</option>
                                                <option value="Ruby" {{ $skill === 'Ruby' ? 'selected' : '' }}>Ruby
                                                </option>
                                                <option value="Sales" {{ $skill === 'Sales' ? 'selected' : '' }}>
                                                    Sales</option>
                                                <option value="Scala" {{ $skill === 'Scala' ? 'selected' : '' }}>
                                                    Scala</option>
                                                <option value="Search engine optimization (SEO)"
                                                    {{ $skill === 'Search engine optimization (SEO)' ? 'selected' : '' }}>
                                                    Search engine optimization (SEO)</option>
                                                <option value="Security analysis"
                                                    {{ $skill === 'Security analysis' ? 'selected' : '' }}>Security
                                                    analysis</option>
                                                <option value="Social media marketing"
                                                    {{ $skill === 'Social media marketing' ? 'selected' : '' }}>Social
                                                    media marketing</option>
                                                <option value="Software architecture"
                                                    {{ $skill === 'Software architecture' ? 'selected' : '' }}>
                                                    Software architecture</option>
                                                <option value="Software development"
                                                    {{ $skill === 'Software development' ? 'selected' : '' }}>Software
                                                    development</option>
                                                <option value="Software engineering"
                                                    {{ $skill === 'Software engineering' ? 'selected' : '' }}>Software
                                                    engineering</option>
                                                <option value="SQL" {{ $skill === 'SQL' ? 'selected' : '' }}>SQL
                                                </option>
                                                <option value="Statistical analysis"
                                                    {{ $skill === 'Statistical analysis' ? 'selected' : '' }}>
                                                    Statistical analysis</option>
                                                <option value="Strategic planning"
                                                    {{ $skill === 'Strategic planning' ? 'selected' : '' }}>Strategic
                                                    planning</option>
                                                <option value="Supply chain management"
                                                    {{ $skill === 'Supply chain management' ? 'selected' : '' }}>
                                                    Supply chain management</option>
                                                <option value="Tableau" {{ $skill === 'Tableau' ? 'selected' : '' }}>
                                                    Tableau</option>
                                                <option value="Teamwork"
                                                    {{ $skill === 'Teamwork' ? 'selected' : '' }}>Teamwork</option>
                                                <option value="Time management"
                                                    {{ $skill === 'Time management' ? 'selected' : '' }}>Time
                                                    management</option>
                                                <option value="UI/UX design"
                                                    {{ $skill === 'UI/UX design' ? 'selected' : '' }}>UI/UX design
                                                </option>
                                                <option value="Verbal communication"
                                                    {{ $skill === 'Verbal communication' ? 'selected' : '' }}>Verbal
                                                    communication</option>
                                                <option value="Video editing"
                                                    {{ $skill === 'Video editing' ? 'selected' : '' }}>Video editing
                                                </option>
                                                <option value="Virtual collaboration"
                                                    {{ $skill === 'Virtual collaboration' ? 'selected' : '' }}>Virtual
                                                    collaboration</option>
                                                <option value="Web design"
                                                    {{ $skill === 'Web design' ? 'selected' : '' }}>Web design
                                                </option>
                                                <option value="Web development"
                                                    {{ $skill === 'Web development' ? 'selected' : '' }}>Web
                                                    development</option>
                                                <option value="Written communication"
                                                    {{ $skill === 'Written communication' ? 'selected' : '' }}>Written
                                                    communication</option>
                                            </select>
                                            @if ($index > 0)
                                                <button type="button"
                                                    class="remove-skill  text-red-500 ml-1 self-center">X</button>
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
                                    '" name="skills[]" class="block w-60 ml-auto py-2 pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md skills-select">' +
                                    '<option value="">Select a skill</option>';

                                var allSkills = [
                                    "Accounting", "Active listening", "Adaptability", "Agile methodology",
                                    "Analytical thinking", "Android development", "Angular", "ASP.NET", "Assembly",
                                    "Attention to detail", "Big data analytics", "Bioinformatics", "Blockchain",
                                    "Business acumen", "Business analysis", "Business development", "Business strategy",
                                    "CAD modeling", "C++", "C#", "Client relationship management", "Cloud computing",
                                    "Collaboration", "Competitive analysis", "Conflict resolution",
                                    "Content management",
                                    "Content marketing", "Contract management", "Copy editing", "Copywriting",
                                    "Critical thinking", "Crisis communication", "CSS", "Customer service", "DART",
                                    "Data analysis", "Data engineering", "Data ethics", "Data governance",
                                    "Data management and analysis", "Data mining", "Data privacy and compliance",
                                    "Data science", "Data storytelling", "Data validation", "Data visualization",
                                    "Database management", "Database querying", "Decision-making",
                                    "Decision-making under pressure", "Deep learning", "DevOps", "Digital advertising",
                                    "Digital literacy", "Digital marketing skills", "Digital transformation strategies",
                                    "Docker", "Effective communication", "Emotional intelligence",
                                    "Employee engagement",
                                    "Event planning", "Excel", "Executive leadership", "Financial analysis",
                                    "Flexibility", "Front-end development", "Game development", "Genetic algorithms",
                                    "Git", "Goal setting", "Graphic design", "HTML", "Human resources",
                                    "Information architecture", "Innovation", "Interpersonal skills", "Interviewing",
                                    "Investment analysis", "Java", "JavaScript", "Jenkins", "Leadership",
                                    "Machine learning", "Machine vision", "Management", "Market research", "Marketing",
                                    "Matlab", "Microsoft Office Suite", "Mobile app development", "Negotiation",
                                    "Neural networks", "Network security", "Node.js", "Organizational skills", "Pascal",
                                    "Patience", "Perl", "PHP", "Problem-solving", "Process improvement",
                                    "Product management", "Project management", "Python", "Quantum computing", "React",
                                    "Research", "Risk management", "Robotics", "Ruby", "Sales", "Sales management",
                                    "Scrum", "SEO", "Social media advertising", "Social media marketing",
                                    "Software development",
                                    "Software testing", "SQL", "Strategic planning", "Supervision", "Swift",
                                    "Tableau", "Teamwork", "Time management", "Troubleshooting", "UI/UX design",
                                    "Verbal communication", "Virtual collaboration", "Virtual reality", "Visual design",
                                    "Web design", "Web development", "Written communication"

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
