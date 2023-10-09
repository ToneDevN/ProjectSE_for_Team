<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-2xl font-medium">
                    รายวิชา
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="w-full  mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-6 gap-6 p-4">
                    @isset($subject)
                        @foreach ($subject as $sub)
                            <form action="{{ route('teacher.subject', ['id' => $sub->subject_id]) }}" method="GET">
                                @csrf
                                <button class="w-full h-72 bg-slate-100  rounded-md text-white text-4xl">
                                    <div class="bg-blue-500 w-full h-2/5 top-0 rounded-t-md px-4 relative">
                                        <div class="flex justify-between">
                                            <span class="place-self-center">{{ $sub->subjectName }}</span>
                                            <a data-dropdown="dropdown-menu-{{ $sub->subject_id }}"
                                                class="place-self-end mt-1 subject-link">
                                                <span class="material-symbols-outlined" style="font-size: 40px">
                                                    more_vert
                                                </span>
                                            </a>

                                            {{-- dropdown-list --}}

                                            <div
                                                class="text-xl text-black absolute -bottom-4 right-0 w-1/3 mr-4 hidden dropdown-menu-{{ $sub->subject_id }}">
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
                                            <span>{{ $sub->subjectCode }}</span>
                                            <span>Sec {{ $sub->section }}</span>
                                        </div>

                                    </div>
                                    <div class="w-full h-3/5 bg-slate-100 rounded-b-md font-medium text-xl text-black p-4 ">
                                        {{ $sub->desctiption }}
                                    </div>
                                </button>
                            </form>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>



    {{-- button Add subject --}}
    <button class="bg-blue-600 w-14 h-14 font-bold text-4xl rounded-full text-white fixed bottom-0 right-0 m-10"
        id="openModal">
        <span class="material-symbols-outlined" style="font-size: 56px">
            add
        </span>
    </button>
    <div id="modalOverlay" class="modal-overlay"></div>
    {{-- Modal --}}
    <div id="myModal" class="fixed mt-10 inset-0 z-50 hidden">
        <!-- Modal Content -->
        <div class="flex place-content-center">
            <div class="bg-white p-6 rounded-md shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">เพิ่มวิชา</h2>

                <form action="{{ route('teacher.addsubject') }}" method="POST" class="flex flex-col my-4">
                    @csrf
                    <label for="subject_code">รหัสวิชา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="subject_code" id="subject_code">
                    <label for="subject_name">ชื่อวิชา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="subject_name" id="subject_name">
                    <label for="subject_desc">รายละเอียด :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="subject_desc" id="subject_desc">
                    <label for="section">เซคชั่น :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="section" id="section">
                    <label for="term">เทอม :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="term" id="term">
                    <label for="year">ปีการศึกษา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="year" id="year">
                    <div class="flex justify-end">
                        <button id="closeModal" type="button"
                            class="mt-4 mx-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            Close
                        </button>
                        <button id="saveData" type="submit"
                            class="mt-4 mx-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(".subject-link").click(function() {
                // Find the data-dropdown attribute value
                var dropdownId = $(this).data("dropdown");

                // Find the corresponding dropdown menu
                var dropdown = $("." + dropdownId);

                // Toggle the visibility of the dropdown menu
                dropdown.toggleClass("hidden");
            });
            // Open modal
            $("#openModal").click(function() {
                $("#myModal").removeClass("hidden");
                $("#modalOverlay").show();
            });

            // Close modal
            $("#closeModal").click(function() {
                $("#myModal").addClass("hidden");
                $("#modalOverlay").hide();
            });


        });
    </script>
</x-app-layout>
