
@include('partials.header')
<body class="bg-gray-200">
    <form action="/dashboard_show/{{$profiles->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="text-center ">
            <h1 class="font-bold text-6xl mb-2 ">Edit Your Resume</h1>
            <a href="{{ route('logout') }}" class="bg-red-600 rounded px-2 py-2 text-white ">Logout</a>
        </div>
    <div id="content">
        {{-- <div id="calendar" class="bg-white drop-shadow-2xl"></div> --}}
        <hr class="border-1 border-red mx-24">
        <div class="container mx-auto">
            <div class="mx-auto relative z-10">
                <div class="flex items-center lg:justify-center bg-blue-900 md:mx-24 mt-10 drop-shadow-2xl">
                    <div class="lg:w-64 md:mt-4 sm:text-center z-20">
                        <img class="absolute top-auto sm:mt-1 left-16 mt-20 align-bottom mb-4 w-56 h-56 pl-14" src="/uploads/avatars/{{ $profiles->avatar }}" alt="Image">
                    </div>

                    <div class="lg:w-1/2 text-white relative pl-3 pt-11">
                        <input type="text" class="sm:pl-3 text-center text-5xl lg:text-left pt-20 sm:mx-auto bg-blue-900 block" name="name" autocomplete="off" value="{{$profiles->name}}">
                        <input type="text" class="text-center text-xl lg:text-left pb-5 sm:pl-3 bg-blue-900 block" name="career" autocomplete="off" value="{{$profiles->career}}">
                        <input type="file" class="pb-2 ml-2" name="avatar" accept=".jpeg, .jpg, .png">
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <div class="border-2 border-yellow-500 drop-shadow-2xl md:mx-24"></div>
            </div>
            <div class="mx-auto">
                <div class="bg-white lg:flex lg:items-center lg:justify-center md:mx-24 sm:px-6 drop-shadow-2xl font-bold pl-3">
                    <div class="md:mx-auto md:pr-14 grid grid-rows-1 md:grid-cols-2 gap-4 lg:pl-64">
                        <div class="md:mt-1 mt-44">
                            <img class="w-4 h-4 relative top-5" src="img/github.png" alt="">
                            <input type="text" class="ml-5" name="github" autocomplete="off" value="{{$profiles->github}}">
                            <img class="w-4 h-4 relative top-5" src="img/gmail.png" alt="">
                            <input type="text" class="ml-5" name="gmail" autocomplete="off" value="{{$profiles->gmail}}">

                        </div>
                        <div class="md:ml-auto md:mt-2">
                            <img class="w-4 h-4 relative top-5" src="img/telephone.png" alt="">
                            <input type="text" class="ml-5" name="contact" autocomplete="off" value="{{$profiles->contact}}">
                            <img class="w-4 h-4 relative top-5" src="img/linkin.png" alt="">

                            <input type="text" class="ml-5 " name="linkedin" autocomplete="off" value="{{$profiles->linkedin}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto relative">
                <div class="bg-white md:mx-24 drop-shadow-2xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mr-4">
                        <div class="md:col-span-1 order-1 md:order-1 ml-10 lg:md-32 pr-10">
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">PROFILE</h1>
                            <p class="border-2 w-24 border-gray-500 mt-2"></p>
                            <textarea class="mt-4 h-56 w-full" name="profile" autocomplete="off">{{$profiles->profile}}</textarea>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">SKILLS</h1>
                            <p class="border-2 w-20 border-gray-500 mt-2"></p>
                            <ul class="mt-4">
                                <textarea class="mt-4 h-56 w-full" name="skills" autocomplete="off">{{$profiles->skills}}</textarea>
                            </ul>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">EDUCATION</h1>
                            <p class="border-2 w-36 border-gray-500 mt-2"></p>
                            <div class="flex mt-4">
                                <ul class="">
                                    <textarea class="mt-4 h-56 w-full " name="education" autocomplete="off">{{$profiles->education}}</textarea>
                                </ul>

                            </div>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">REFERENCES</h1>
                            <p class="border-2 w-36 border-gray-500 mt-2"></p>
                            <textarea name="reference">{{$profiles->reference}}</textarea>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">Porfolio</h1>
                            <p class="border-2 w-24 border-gray-500 mt-2"></p>
                            @foreach ($projects  as  $project)
                            <div  data-project-id="{{ $project->id }}">
                                <textarea class="ml-10 mt-4 text-2xl font-bold" name="project[{{ $project->id }}][title]">{{ $project->title }}</textarea>
                                <img src="/uploads/avatars/{{ $project->image }}" class="mt-1 mb-10 drop-shadow-2xl" alt="">
                                <input type="hidden" name="project[{{ $project->id }}][_delete]" value="0">
                                <button type="button" class="bg-red-700 hover:bg-red-600 text-white px-2 py-2 font-bold mb-10 ml-28 " onclick="deleteProject({{ $project->id }})">Delete</button>
                            </div>
                            @endforeach
                        </div>
                        <div class="md:col-span-1 order-2 md:order-2 mr-24 ml-10">
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">CAREER</h1>
                            <p class="border-2 w-24 border-gray-500 mt-2"></p>
                            <div class="flex mt-3">
                                <ul>
                                    <textarea class="mt-4 resize-none h-96 w-96 overflow-y-auto" name="career_content" autocomplete="off">{{$profiles->career_content}}</textarea>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <button type="submit" class="px-2 bg-red-700 hover:bg-red-700 text-white font-bold py-2 rounded-lg shadow-lg hover:shadow-x1 transition duration-200 mt-3">
            Update Resume
        </button>
    </div>
</form>
<div class="flex justify-center item-center mt-2 mb-10">
    <button id="showFormButton" class="bg-red-700 hover:bg-red-600 text-white font-bold px-2 py-2 rounded">Add a new porfolio</button>

    <div id="formContainer" style="display: none;" class="ml-10">
        <form id="myForm" action="/add/project" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" class="bg-red-700 hover:bg-red-400 text-white font-bold rounded px-2 py-2">Submit</button>
            <button id="closeFormButton" class="bg-red-700 hover:bg-red-400 text-white font-bold px-2 py-2 rounded">&times;</button>
        </form>
    </div>
</div>


<script>

const base_url = @json(url('/'));
const csrf_token = '{{csrf_token()}}';

function deleteProject(projectId) {
  const projectElement = document.querySelector(`[data-project-id="${projectId}"]`);
  let body = JSON.stringify({id: projectId});
  if (projectElement) {
    projectElement.remove();
    fetch(base_url + '/deleteProject/' + projectId, {
        method: "POST",
        headers: {
            accept: 'application/json',
            'X-CSRF-TOKEN': csrf_token
        },
    })
        .then(res => res.json())
        .then(res => console.log(res))
        .catch(err => console.log(err))
  }
  else {
    console.log("no delete");
  }
}


const showFormButton = document.getElementById('showFormButton');
const formContainer = document.getElementById('formContainer');

showFormButton.addEventListener('click', function() {
  formContainer.style.display = 'block';
});


const closeFormButton = document.getElementById('closeFormButton');

closeFormButton.addEventListener('click', function() {
    formContainer.style.display = 'none';
});







</script>






    @include('partials.footer')
