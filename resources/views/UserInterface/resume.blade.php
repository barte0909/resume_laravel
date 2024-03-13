@include('partials.header')

<div class="animate-[wiggle_1s_ease-in-out_infinite]">
    <!-- ... -->
  </div>
<div class="flex flex-col md:flex-row md:justify-between space-y-4 md:space-y-0 md:space-x-6 mt-10 mr-10">
    <div class="md:ml-64">
        <button id="increaseFontBtn" class="hover:bg-blue-500 bg-gray-500 text-white px-2 py-1 rounded text-2xl -mt-1">+</button>
        <button id="decreaseFontBtn" class="hover:bg-blue-500 bg-gray-500 text-white px-2 py-1 rounded text-2xl -mt-1">-</button>
    </div>
    <div class="md:ml-4">
        <button class="hover:bg-blue-500 bg-gray-500 text-white px-2 py-1 rounded text-2xl -mt-1" onclick="printPage()">Print</button>
        <a href="{{ route('download') }}" class="btn btn-primary bg-gray-500 text-white rounded px-2 py-1 text-2xl hover:bg-blue-500">Download</a>
        <a href="{{ route('login') }}" class="btn btn-primary bg-gray-500 text-white rounded px-2 py-1 text-2xl hover:bg-blue-500">Sign In</a>
        <a href="{{ route('register') }}" class="btn btn-primary bg-gray-500 text-white rounded px-2 py-1 text-2xl hover:bg-blue-500">Sign up</a>
    </div>
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
                        <p class="sm:pl-3 text-center text-5xl lg:text-left pt-20 sm:mx-auto">{{$profiles->name}}</p>
                        <h2 class="text-center text-xl lg:text-left pb-10 sm:pl-3">{{$profiles->career}}</h2>
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
                            <h3 class="ml-5">{{$profiles->github}}</h3>
                            <img class="w-4 h-4 relative top-5" src="img/gmail.png" alt="">
                            <h3 class="ml-5 ">{{$profiles->gmail}}</h3>
                        </div>
                        <div class="md:ml-auto md:mt-2">
                            <img class="w-4 h-4 relative top-5" src="img/telephone.png" alt="">
                            <h3 class="ml-5">{{$profiles->contact}}</h3>
                            <img class="w-4 h-4 relative top-5" src="img/linkin.png" alt="">
                            <h3 class="ml-5 pb-10">{{$profiles->linkedin}}</h3>
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
                            <p class="mt-4">{{$profiles->profile}}</p>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">SKILLS</h1>
                            <p class="border-2 w-20 border-gray-500 mt-2"></p>
                            <ul class="mt-4">
                               <h1>{{$profiles->skills}}</h1>
                            </ul>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">EDUCATION</h1>
                            <p class="border-2 w-36 border-gray-500 mt-2"></p>
                            <div class="flex mt-4">
                                {{$profiles->education}}
                            </div>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">REFERENCES</h1>
                            <p class="border-2 w-36 border-gray-500 mt-2"></p>
                            <p class="mt-4">{{$profiles->reference}}</p>
                            <h1 class="text-blue-500 font-bold text-2xl mt-10">Porfolio</h1>
                            <p class="border-2 w-24 border-gray-500 mt-2"></p>
                            @foreach ($projects  as  $project)

                            <div  data-project-id="{{ $project->id }}">
                              <h1 class=" ml-12 mt-2 text-2xl font-bold">{{$project->title}}</h1>
                                <img src="/uploads/avatars/{{ $project->image }}" class="mt-2 mb-10 drop-shadow-2xl" alt="" width="350px">


                            </div>

                            @endforeach



                        </div>
                        <div class="md:col-span-1 order-2 md:order-2 mr-24 ml-10">
                            <h1 class="text-blue-500 font-bold text-2xl mt-10 ">CAREER</h1>
                            <p class="border-2 w-24 border-gray-500 mt-2"></p>
                            <div class="flex mt-3">
                                <h1>{{$profiles->career_content}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

document.getElementById("increaseFontBtn").addEventListener("click", function() {
  changeFontSize(2);
});

document.getElementById("decreaseFontBtn").addEventListener("click", function() {
  changeFontSize(-2);
});

function changeFontSize(changeAmount) {
  var content = document.getElementById("content");
  var computedStyle = window.getComputedStyle(content);
  var fontSize = parseFloat(computedStyle.getPropertyValue("font-size"));
  fontSize += changeAmount;
  content.style.fontSize = fontSize + "px";
}


function printPage() {
  window.print();
}



</script>
@include('partials.header')
