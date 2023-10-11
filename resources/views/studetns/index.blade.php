<x-app-layout>
    {{-- sideBar --}}

    <div class="">
        <div class="pt-10">
            <div class="w-full  mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 text-gray-900 text-4xl">
                        รายวิชา
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="py-6">
            <div class="w-full  mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="grid grid-cols-6 md:grid-cols-4 gap-6 p-4 xl:grid-cols-6">
                        @isset($subject)
                            @foreach ($subject as $sub)
                                <form action="{{ route('students.subject', ['id' => $sub->subject->subject_id]) }}" method="GET">
                                    @csrf
                                    <button class="w-full h-72 bg-slate-100  rounded-md text-white text-4xl"
                                        id="subject_button">
                                        <div class="bg-blue-500 w-full h-2/5 top-0 rounded-t-md px-4 relative">
                                            <div class="flex justify-between">
                                                <span class="place-self-center">{{ $sub->subject->subjectName }}</span>
                                                <a data-dropdown="dropdown-menu-{{ $sub->subject->subject_id }}"
                                                    class="place-self-end mt-1 subject-link" id="dropdown">
                                                    <span class="material-symbols-outlined" style="font-size: 40px">
                                                        more_vert
                                                    </span>
                                                </a>

                                                {{-- dropdown-list --}}

                                                <div
                                                    class="text-xl text-black absolute -bottom-4 right-0 w-1/3 mr-4 hidden dropdown-menu-{{ $sub->subject->subject_id }}">
                                                    <ul>
                                                        <li class="w-full h-1/2 bg-yellow-500 rounded-md p-1">
                                                            <a class="" href="#">
                                                                <div class="w-full h-full flex justify-start">
                                                                    <span
                                                                        class="material-symbols-outlined flex place-items-center">
                                                                        edit
                                                                    </span>
                                                                    | edit
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="bg-rose-500 w-full h-1/2 rounded-md p-1">
                                                            <a class="" href="#">
                                                                <div class="w-full h-full flex justify-start">
                                                                    <span
                                                                        class="material-symbols-outlined flex place-items-center">
                                                                        delete
                                                                    </span>
                                                                    | delete
                                                                </div>
                                                            </a>
                                                        </li>

                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="text-2xl flex justify-items-start gap-10">
                                                <span>{{ $sub->subject->subjectCode }}</span>
                                                <span>Sec {{ $sub->subject->section }}</span>
                                            </div>

                                        </div>
                                        <div
                                            class="w-full h-3/5 bg-slate-100 rounded-b-md font-medium text-xl text-black p-4 ">
                                            {{ $sub->subject->description }}
                                        </div>
                                    </button>
                                </form>
                            @endforeach
                        @endisset
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#dropdownfunc").click(function() {
                // Remove the class from the element
                $("#dropdown1").toggleClass("hidden");
            });
        });
    </script>

</x-app-layout>
