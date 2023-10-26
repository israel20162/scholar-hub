<div class="container mx-auto p-4">

    <!-- Header with Profile Picture and Name -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ $user->name }}"
                class="w-24 h-24 rounded-full border-2 border-gray-600 object-cover">
            <div class="ml-4">
                <h2 class="text-3xl font-semibold capitalize dark:text-gray-300">{{ $user->name }}</h2>
                <p class="text-lg text-gray-600">{{ '@' . $user->name }}</p>
            </div>
        </div>


    </div>

    <main x-data="{ tab: 'profile' }" class="mb-32">
        <!-- User Info Tabs -->
        <div class="mt-6 border-b-2">
            <ul class="flex justify-between md:w-1/4 md:p-0 px-4">
                <li class="hover:text-gray-600 cursor-pointer dark:text-gray-300  py-2"
                    :class="{ 'dark:text-indigo-600 border-b border-indigo-600': tab == 'profile' }"
                    @click="tab = 'profile'">
                    Overview</li>
                <li class="hover:text-gray-600 cursor-pointer dark:text-gray-300 py-2"
                    :class="{ 'dark:text-indigo-600 border-b border-indigo-600': tab == 'quiz' }" @click="tab = 'quiz'">
                    Quizzes</li>
                <li class="hover:text-gray-600 cursor-pointer dark:text-gray-300 py-2"
                    :class="{ 'dark:text-indigo-600 border-b border-indigo-600': tab == 'topics' }"
                    @click="tab = 'topics'">
                    Topics</li>
                <li class="hover:text-gray-600 cursor-pointer dark:text-gray-300 py-2"
                    :class="{ 'text-indigo-600 border-b border-indigo-600': tab == 'profile' }"
                    @click="tab = 'profile'">
                    Inbox</li>
            </ul>
        </div>

        <section x-show="tab === 'profile'" class="grid md:grid-cols-2">
            <div class="w-full max-w-full px-3 mt-6 lg-max:mt-6  mb-4 draggable" x-data="{ isEditing: @entangle('isEditing') }">

                <div
                    class="relative flex flex-col h-full min-w-0 break-words bg-slate-900 text-white border-0 shadow-soft-xl  bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-slate-900 border-b-0 rounded-t-2xl">
                        <div class="flex flex-wrap -mx-3">
                            <div
                                class="flex items-center justify-between w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-none">
                                <h2 class="mb-0 text-lg font-bold ">Profile Information</h2>
                                <svg @click="isEditing = !isEditing" class="h-6 w-6 cursor-pointer"
                                    viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    stroke="rgb(75 85 99)" transform="matrix(1, 0, 0, 1, 0, 0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="rgb(75 85 99)" stroke-width="2.4" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="rgb(75 85 99)" stroke-width="2.4" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="w-full max-w-full px-3 text-right shrink-0  md:flex-none">


                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4">
                        <div x-show="!isEditing">
                            @if ($bio)
                                <p class="">{{ $bio }}</p>
                            @else
                                <p class="leading-normal text-blue-500 text-center ">Write a bit about yourself</p>
                            @endif
                        </div>
                        <div x-show="isEditing" class="mt-4 space-y-2">
                            <textarea class="w-full p-2 border rounded-md bg-white dark:bg-gray-800" wire:model="bio" rows="4"></textarea>
                            <div class="justify-end flex gap-2 md:block">
                                <button class="bg-gray-400 text-white px-4 py-2 rounded"
                                    @click="isEditing = false">Cancel</button>
                                <button class="bg-green-500 dark:bg-indigo-600 text-white px-4 py-2 rounded"
                                    wire:click="saveBio">Save</button>

                            </div>
                        </div>




                        <hr class="h-px my-6 bg-gray-800 text-gray-800  from-transparent via-black/40 to-transparent"
                            style="color: black;border-color: rgb(31 41 55)">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative block px-4 py-2 capitalize pt-0 pl-0 leading-normal bg-slate-900 border-0 rounded-t-lg text-sm text-inherit">
                                <strong class="text-slate-700">Display Name:</strong> &nbsp; {{ $user->name }}
                            </li>
                            <li
                                class="relative block px-4 py-2 pl-0 leading-normal bg-slate-900 border-0 border-t-0 text-sm text-inherit">
                                <strong class="text-slate-700">Email:</strong> &nbsp; {{ $user->email }}
                            </li>


                            <li
                                class="relative block px-4 py-2 pb-0 pl-0 bg-slate-900 border-0 border-t-0 rounded-b-lg text-inherit">
                                <strong class="leading-normal text-sm text-slate-700">Social:</strong> &nbsp; <a
                                    class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none"
                                    href="javascript:;">
                                    <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600"
                                    href="javascript:;">
                                    <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900"
                                    href="javascript:;">
                                    <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Statistics Section -->
            <div class="w-full max-w-full px-3 mt-6 lg-max:mt-6  mb-4 draggable">
                <h3 class="text-xl font-semibold mb-4 dark:text-gray-300 text-gray-700">Your Statistics</h3>

                <!-- Grid for Quizzes and Topics Count -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Quizzes Count -->
                    <div
                        class="p-4 rounded border dark:border-gray-800 dark:bg-gray-900 hover:bg-gray-700 transition duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium dark:text-gray-300">Quizzes</h4>
                                <p class="text-2xl font-bold text-blue-500">{{ count($user->quizzes) }}</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-10 w-10 text-blue-500">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                        d="M12 4v16m-8-8h16"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Topics Count -->
                    <div
                        class="p-4 rounded border  dark:border-gray-800 dark:bg-gray-900 hover:bg-gray-100 transition duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium dark:text-gray-300 text-gray-700">Topics</h4>
                                <p class="text-2xl font-bold text-blue-500">{{ count($user->topics) }}</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="h-10 w-10 text-blue-500">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-4 rounded border  dark:border-gray-800 dark:bg-gray-900 hover:bg-gray-100 transition duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium dark:text-gray-300 text-gray-700">Forum Posts</h4>
                                <p class="text-2xl font-bold text-blue-500">{{ count($user->forumPosts) }}</p>
                            </div>
                            <div>
                                <svg fill="rgb(59 130 246)" class="h-6 w-6" viewBox="0 0 16 16" id="forum-16px"
                                    xmlns="http://www.w3.org/2000/svg" stroke="rgb(59 130 246)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="Path_101" data-name="Path 101"
                                            d="M-7.5,16a.48.48,0,0,1-.158-.026L-10,15.193A5.971,5.971,0,0,1-13,16a6.006,6.006,0,0,1-6-6,6.006,6.006,0,0,1,6-6,6.006,6.006,0,0,1,6,6,5.976,5.976,0,0,1-.807,3l.782,2.345a.5.5,0,0,1-.121.512A.5.5,0,0,1-7.5,16ZM-13,5a5.006,5.006,0,0,0-5,5,5.006,5.006,0,0,0,5,5,4.984,4.984,0,0,0,2.668-.777.5.5,0,0,1,.426-.052l1.616.538-.539-1.615a.5.5,0,0,1,.052-.426A4.982,4.982,0,0,0-8,10,5.006,5.006,0,0,0-13,5Zm-9.342,7.974,3-1a.5.5,0,0,0,.317-.632.5.5,0,0,0-.633-.316l-2.051.683L-20.94,9.4a.5.5,0,0,0-.073-.454,4.96,4.96,0,0,1,.478-6.485A4.966,4.966,0,0,1-17,1a4.966,4.966,0,0,1,3.535,1.464.5.5,0,0,0,.707,0,.5.5,0,0,0,0-.707A5.959,5.959,0,0,0-17,0a5.959,5.959,0,0,0-4.242,1.757,5.948,5.948,0,0,0-.727,7.569l-1.006,3.016a.5.5,0,0,0,.121.512A.5.5,0,0,0-22.5,13,.48.48,0,0,0-22.342,12.974Z"
                                            transform="translate(23)"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    {{-- points --}}
                    <div
                        class="p-4 rounded border  dark:border-gray-800 dark:bg-gray-900 hover:bg-gray-100 transition duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium dark:text-gray-300 text-gray-700">Scholar Points</h4>
                                <p class="text-2xl font-bold text-blue-500">{{ $user->karma }}</p>
                            </div>
                            <div>
                                <svg class="h-6 w-6 bg--500 text-blue-500" height="200px" width="200px"
                                    version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                    xml:space="preserve" fill="#0000ff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <style type="text/css">
                                            .st0 {
                                                fill: rgb(59 130 246);
                                            }
                                        </style>
                                        <g>
                                            <polygon class="st0"
                                                points="55.176,455.098 55.176,16.574 55.176,0 0,0 0,16.574 0,455.098 0,495.426 0,512 16.07,512 55.176,512 480.412,512 496.484,512 496.484,455.098 480.412,455.098 ">
                                            </polygon>
                                            <polygon class="st0"
                                                points="221.258,239.94 318.582,336.766 458.482,197.578 490.42,229.354 512,100.514 382.504,121.99 414.44,153.76 318.582,249.131 221.258,152.305 72.06,300.732 116.102,344.553 ">
                                            </polygon>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- topics section --}}
            <div class="mt-8  w-full bg-white dark:bg-gray-900 p-6 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4 text-gray-700 dark:text-gray-300 border-b pb-2">Your Published
                    Topics</h3>

                <!-- List of Topics -->
                <ul class="mt-4 space-y-4">
                    @foreach ($user->topics->take(5) as $topic)
                        <li
                            class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg hover:shadow-md transition duration-200">
                            <!-- Topic Title and Publication Date -->
                            <div class="flex items-center justify-between">
                                <h4 class="text-xl capitalize font-medium text-gray-800 dark:text-gray-300">
                                    {{ $topic->title }}
                                </h4>
                                <span
                                    class="text-sm text-gray-500 dark:text-indigo-500">{{ $topic->created_at->format('F j, Y') }}</span>
                            </div>

                            <!-- Topic Details -->
                            <div class="flex items-center justify-between mt-2">
                                <!-- Views/Interactions Count -->
                                <div class="text-sm flex justify-evenly gap-1 whitespace-nowrap ">
                                    <p class="text-gray-600 dark:text-indigo-500">{{ $topic->views }} views</p> |
                                    <p class="text-gray-600 dark:text-indigo-500">{{ $topic->likes_count }}
                                        {{ Str::plural('like', $topic->likes_count) }}</p> |
                                    <p class="mr-4 text-gray-600 dark:text-indigo-500">{{ $topic->replies->count() }}
                                        {{ Str::plural('comment', $topic->replies->count()) }}</p>

                                </div>
                                <!-- View/Edit Links -->
                                <div class="text-right">
                                    <a href="{{ route('topic.single', $topic->id) }}"
                                        class="text-blue-500 dark:text-indigo-600 hover:underline">View</a>
                                    <span class="mx-2">|</span>
                                    <a href="{{ route('topic.edit', $topic->id) }}"
                                        class="text-blue-500 dark:text-indigo-600 hover:underline">Edit</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

             {{-- topics section --}}
            <div class="mt-8  w-full bg-white dark:bg-gray-900 p-6 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4 text-gray-700 dark:text-gray-300 border-b pb-2">Your Published
                    Quiz</h3>

                <!-- List of Topics -->
                <ul class="mt-4 space-y-4">
                    @foreach ($user->quizzes->take(5) as $quiz)
                        <li
                            class="p-4 bg-gray-100 dark:bg-gray-800 rounded-lg hover:shadow-md transition duration-200">
                            <!-- Topic Title and Publication Date -->
                            <div class="flex items-center justify-between">
                                <h4 class="text-xl capitalize font-medium text-gray-800 dark:text-gray-300">
                                    {{ $quiz->title }}
                                </h4>
                                <span
                                    class="text-sm text-gray-500 dark:text-indigo-500">{{ $quiz->created_at->format('F j, Y') }}</span>
                            </div>

                            <!-- Topic Details -->
                            <div class="flex items-center justify-between mt-2">
                                <!-- Views/Interactions Count -->
                                <div class="md:text-sm text-xs flex justify-evenly gap-1 whitespace-nowrap ">
                                     <span class="dark:text-gray-500">No of Questions:
                                        <span class="dark:text-indigo-500">{{ count(json_decode($quiz->quiz)) }}
                                        </span>
                                    </span>
                                    <span class="dark:text-gray-500">Time limit:
                                        <span class="dark:text-indigo-500">{{ $quiz->time_limit }} mins </span>
                                    </span>

                                </div>
                                <!-- View/Edit Links -->
                                <div class="text-right text-sm md:text-base">
                                    <a href="{{ route('quiz.single', $quiz->id) }}"
                                        class="text-blue-500 dark:text-indigo-600 hover:underline">View</a>
                                    <span class="mx-2">|</span>
                                    <a href="{{ route('quiz.edit', $quiz->id) }}"
                                        class="text-blue-500 dark:text-indigo-600 hover:underline">Edit</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section x-show="tab === 'quiz'" class="grid grid-cols-1 md:grid-cols-2">
            <!-- Quizzes Created by the User -->
            <div class="mx-auto w-full col-span-2 mt-6 bg-white dark:bg-gray-900   ">
                <h3 class="mb-0 text-2xl text-center font-bold dark:text-gray-300">Your Quizzes</h3>

                <!-- List of Quizzes -->
                <ul class="gap-3 mt-6 grid md:grid-cols-2">
                    @foreach ($user->quizzes as $quiz)
                        <li class="py-4 px-2 dark:bg-gray-800  rounded hover:bg-gray-100 transition duration-200">
                            <!-- Quiz Title -->
                            <h4 class="text-xl capitalize font-medium text-gray-700 dark:text-gray-300">
                                {{ $quiz->title }}
                            </h4>

                            <!-- Additional Information -->
                            <div class="grid grid-cols-1 space-y-4 justify-between  w-full mt-2">
                                <!-- Creation Date -->
                                <div class="flex flex-col w-full gap-2 text-sm mb-1">
                                    <span class="dark:text-gray-500 ">Created on:
                                        <span class="dark:text-indigo-500 whitespace-nowrap text-sm">
                                            {{ $quiz->created_at->format('F j, Y') }}
                                        </span>
                                    </span>
                                    <span class="dark:text-gray-500">No of Questions:
                                        <span class="dark:text-indigo-500">{{ count(json_decode($quiz->quiz)) }}
                                        </span>
                                    </span>
                                    <span class="dark:text-gray-500">Time limit:
                                        <span class="dark:text-indigo-500">{{ $quiz->time_limit }} mins </span>
                                    </span>
                                </div>



                                <!-- Quiz Statistics -->
                                <div class="text-sm capitalize flex flex-col gap-2">
                                    <p><span class="font-semibold dark:text-gray-500">Taken:</span> <span
                                            class="dark:text-indigo-500"> {{ $quiz->timesTaken() }}
                                            {{ Str::plural('time', $quiz->timesTaken()) }}</span></p>
                                    <p><span class="font-semibold dark:text-gray-500">Average Score:</span> <span
                                            class="dark:text-indigo-500">{{ round($quiz->averageScore(),2) }}%</span>
                                    </p>
                                     <!-- View/Edit Links -->
                                <div class="text-right text-sm md:text-base">
                                    <a href="{{ route('quiz.single', $quiz->id) }}"
                                        class="text-blue-500 dark:text-indigo-600 hover:underline">View</a>
                                    <span class="mx-2">|</span>
                                    <a href="{{ route('quiz.edit', $quiz->id) }}"
                                        class="text-blue-500 dark:text-indigo-600 hover:underline">Edit</a>
                                </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- Quizzes Taken Section -->
            <div class="mx-auto  w-full  mt-6 bg-white dark:bg-gray-900  ">
                <h3 class="mb-0 text-2xl text-center font-bold dark:text-gray-300">Quizzes You've Taken</h3>

                <!-- List of Quizzes -->
                <ul class="gap-3 mt-6 grid ">
                    @foreach ($user->quizResults->sortByDesc('created_at')->unique('quiz_id') as $result)
                        <li
                            class="px-4 py-4 dark:bg-gray-800 w-full rounded-lg hover:shadow-md transition duration-200">

                            <!-- Quiz Title and Date Taken -->
                            <div class="flex items-center justify-between">
                                <h4 class="text-xl capitalize font-bold text-gray-800 dark:text-gray-300">
                                    {{ $result->quiz->title }}</h4>
                                <span
                                    class="text-sm dark:text-indigo-500">{{ $result->created_at->format('F j, Y') }}</span>
                            </div>


                            <!-- Quiz Details -->
                            <div class="flex items-center justify-between gap-3 mt-4">
                                <!-- User's Score -->
                                <div>
                                    <p class="dark:text-indigo-500 font-medium"> Average Score:
                                        {{ round($user->quizResults->where('quiz_id', $result->quiz->id)->avg('score'), 2) }}%
                                    </p>
                                </div>

                                <!-- Total Times Taken -->
                                <div class="text-right whitespace-nowrap">
                                    <p class="dark:text-indigo-500"><span
                                            class="font-medium dark:text-indigo-500">Taken:
                                            {{ $user->quizResults->where('quiz_id', $result->quiz->id)->count() }}
                                            {{ Str::plural('time', $user->quizResults->where('quiz_id', $result->quiz->id)->count()) }}</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </section>

        <section x-show="tab === 'topics'" class="grid md:grid-cols-1">
            <!-- User's Published Topics Section -->
            <div class="mt-8 w-full   bg-white dark:bg-gray-800 md:p-6 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4 text-gray-700 dark:text-gray-200 border-b pb-2">Your Published
                    Topics</h3>

                <!-- List of Topics -->
                <ul class="mt-4 space-y-4">
                    @foreach ($user->topics as $topic)
                        <li
                            class="md:p-4 p-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:shadow-md transition duration-200">
                            <!-- Topic Title and Publication Date -->
                            <div class="flex items-start  justify-between">
                                <div>
                                    <h4 class="text-xl capitalize font-bold text-gray-800 dark:text-gray-300">
                                        {{ $topic->title }}</h4>
                                    <p class="text-sm text-gray-300 my-1">Category: <span
                                            class="dark:text-indigo-500"> {{ $topic->category->name }}
                                        </span></p>
                                </div>
                                <span
                                    class="text-sm text-gray-500 mt-1 dark:text-indigo-400 font-bold">{{ $topic->created_at->format('F j, Y') }}</span>
                            </div>
                            <!-- Excerpt -->
                            <div
                                class="py-12 no-tailwin ql-editor line-clamp-5 !overflow-auto  !whitespace-normal !text-ellipsis  child:dark:text-gray-300 child:first-letter:capitalize first-letter:capitalize  dark:!text-gray-300  ">
                                {!! $topic->body !!}</div>
                            {{-- <div class="child:dark:text-gray-300  ">{!! $topic->body !!}</div> --}}
                            <!-- Topic Details -->
                            <div class="flex items-center justify-between mt-2">
                                <!-- Views/Interactions Count -->
                                <div class="text-sm flex justify-evenly gap-1 whitespace-nowrap ">
                                    <p class="text-gray-600 dark:text-indigo-500">{{ $topic->views }} views</p> |
                                    <p class="text-gray-600 dark:text-indigo-500">{{ $topic->likes_count }}
                                        {{ Str::plural('like', $topic->likes_count) }}</p> |
                                    <p class="mr-4 text-gray-600 dark:text-indigo-500">{{ $topic->replies->count() }}
                                        {{ Str::plural('comment', $topic->replies->count()) }}</p>

                                </div>

                                <!-- View/Edit Links -->
                                <div class="text-right text-sm whitespace-nowrap">
                                    <a href="{{ route('topic.single', $topic->id) }}"
                                        class="text-blue-500 dark:text-blue-400 hover:underline">View</a>
                                    <span class="mx-1">|</span>
                                    <a href="{{ route('topic.edit', $topic->id) }}"
                                        class="text-blue-500 dark:text-blue-400 hover:underline">Edit</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>




        </section>





    </main>


</div>
