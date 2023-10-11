<x-app-layout>
    {{-- sideBar --}}
    <div class="grid grid-cols-12">
        <div class="col-start-1 col-span-2 h-screen">
            <div class="bg-gray-800 w-full rounded-r-md h-full mt-2 mr-5 text-white text-xl font-medium py-4 pr-2">
                <ul class="grid gap-4 ">
                    <li class="h-10 ">
                        <a href="{{ route('teacher.subject', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">หน้าหลักวิชา</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.rollcall', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">คะแนนเช็คชื่อ</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.lab', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">คะแนนแล็บ</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.manage', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
                                <div class="place-self-center">จัดการผู้ใช้</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.export', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">ส่งออกข้อมูล</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.home') }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 text-lg">
                                <div class="place-self-center">กลับไปยังหน้าหลัก</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- EndSideBar --}}
        <div class="col-start-3 col-span-12 ">
            <div class="pt-6">
                <div class="w-full mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white flex justify-around shadow-sm sm:rounded-lg">
                        <span class="p-6 text-gray-900 text-2xl font-medium">
                            นักศึกษา
                        </span>
                        <span class="p-6 relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-10 pointer-events-none">
                                <svg class=" text-gray-700 h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-md focus:ring-blue-500 focus:border-blue-500 block w-1/3 pl-16 p-2.5  "
                                placeholder="ค้นหารหัสนักศึกษา" required>
                        </span>
                    </div>
                </div>
                <div class="w-full mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-base text-left text-gray-700 ">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr class="font-medium text-lg">
                                        <th scope="col" class="px-6 py-3">
                                            รหัสนักศึกษา
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ชื่อ-นามสกุล
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            คณะ
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            สาขา
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ลบ/แก้ไข
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $student)
                                        <tr class="bg-white border-b ">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $student->student->student_code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $student->student->user->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $student->student->faculty }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $student->student->branch }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button class="bg-yellow-500 w-14 h-10 rounded-md text-white">
                                                    <span class="material-symbols-outlined">
                                                        edit
                                                    </span>
                                                </button>
                                                <button class="bg-rose-600 w-14 h-10 rounded-md text-white">
                                                    <span class="material-symbols-outlined">
                                                        delete
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <button class="bg-blue-600 w-14 h-14 font-bold text-4xl rounded-full text-white fixed bottom-0 right-0 m-10"
        id="openModal">
        <span class="material-symbols-outlined" style="font-size: 56px">
            add
        </span>
    </button>
    <div id="modalOverlay" class="modal-overlay"></div>
    <div id="importstudent" class="fixed mt-10 inset-0 z-50 hidden">
        <!-- Modal Content -->
        <div class="flex place-content-center">
            <div class="bg-white p-16 rounded-md shadow-lg">
                <div class="flex flex-row h-10 text-lg font-light text-gray-100 mb-4  ">
                    <button class="bg-blue-600 w-1/2 h-full rounded-l-md border-b-4 border-blue-400"
                        id="">นำเข้ารายบุคคล</button>
                    <button class="bg-blue-500 w-1/2 h-full rounded-r-md" id="toggleFile">นำเข้าไฟล์ Excel</button>
                </div>

                <form action="{{ route('teacher.addStudent') }}" method="POST" class="flex flex-col my-4">
                    @csrf
                    <label for="subject_name">รหัสนักศึกษา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="code" id="code">
                    <label for="subject_code">ชื่อ-นามสกุล :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="name" id="name">
                    <label for="subject_desc">อีเมล :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="email" id="email">
                    <label for="section">คณะ :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="faculty" id="faculty">
                    <label for="section">สาขา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="branch" id="branch">
                    <input type="hidden" name="subject_id" value="{{ $id }}">
                    <div class="flex justify-end">
                        <button id="closeModal" type="button"
                            class="mt-4 mx-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            ปิด
                        </button>
                        <button id="saveData" type="submit"
                            class="mt-4 mx-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            เพิ่ม
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="importfile" class="fixed mt-10 inset-0 z-50 hidden">
        <!-- Modal Content -->
        <div class="flex place-content-center">
            <div class="bg-white p-16 rounded-md shadow-lg">
                <div class="flex flex-row h-10 text-lg font-light text-gray-100 mb-4  ">
                    <button class="bg-blue-500 w-1/2 h-full rounded-l-md " id="toggleStudent">นำเข้ารายบุคคล</button>
                    <button class="bg-blue-600 w-1/2 h-full rounded-r-md border-b-4 border-blue-400"
                        id="">นำเข้าไฟล์ Excel</button>
                </div>

                <form action="{{ route('teacher.importStudent') }}" method="POST" class="flex flex-col my-4">
                    @csrf

                    <div class="flex items-center justify-center flex-col w-96">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">สามารถอัปโหลดได้เฉพาะไฟล์ .xls
                                    เท่านั้น</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="dropzone-file" />

                        </label>
                        <input type="hidden" name="subject_id" value="{{ $id }}">
                        <p class="place-self-start my-4">Selected File: <span id="file_name_display">No file
                                selected</span></p>
                    </div>

                    <div class="flex justify-end">
                        <button id="closeImportfile" type="button"
                            class="mt-4 mx-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            ปิด
                        </button>
                        <button id="saveData" type="submit"
                            class="mt-4 mx-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            เพิ่ม
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            // Open modal
            function showStudentModal() {
                $("#importstudent").toggleClass("hidden");
                $("#modalOverlay").show();
            }

            // Open modal import file.
            function toggleStudentImport() {
                $("#importstudent").toggleClass("hidden");
                $("#importfile").toggleClass("hidden");
            }

            function toggleFileImport() {
                $("#importstudent").toggleClass("hidden");
                $("#importfile").toggleClass("hidden");
            }

            // Close modal
            function closeModal() {
                $("#importstudent").toggleClass("hidden");
                $("#modalOverlay").hide();
            }

            function closeImportfile() {
                $("#importfile").toggleClass("hidden");
                $("#modalOverlay").hide();
            }

            $('#dropzone-file').change(function() {
                // Get the selected file's name
                var fileName = $(this).val().split('\\').pop();

                // Update a label or text element with the file name
                $('#file_name_display').text(fileName);
            });

            $("#openModal").click(showStudentModal);
            $("#toggleStudent").click(toggleStudentImport);
            $("#toggleFile").click(toggleFileImport);
            $("#closeModal").click(closeModal);
            $("#closeImportfile").click(closeImportfile);


        });
    </script>
</x-app-layout>
