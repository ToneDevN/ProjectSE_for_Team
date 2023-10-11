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
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
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
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
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
                <div class="w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white flex justify-around shadow-sm sm:rounded-lg p-4">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class=" text-gray-700 h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-md focus:ring-blue-500 focus:border-blue-500 block w-1/3 pl-16 p-2.5  "
                                placeholder="Search branch name" required>
                        </div>
                        <select class="border-gray-300 text-gray-900 rounded-md w-1/4">
                            <option>เรียงตามรหัสนักศึกษา (มากไปน้อย)</option>
                            <option>เรียงตามรหัสนักศึกษา (น้อยไปมาก)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="p-8">
                <table class="border-collapse border border-slate-500">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 px-2">รหัสนักศึกษา</th>
                            <th class="border border-slate-600 px-2">ชื่อ-นามสกุล</th>
                            @foreach ($session as $session)
                                <th class="border border-slate-600 px-2">สัปดาที่ {{ $session->attendanceSession }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($session as $session)
                            <tr>
                                <td class="border border-slate-700">{{ $student->student->student_code }}</td>
                                <td class="border border-slate-700">Indianapolis</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Add Rollcall Times --}}
    <button class="bg-blue-600 w-14 h-14 font-bold text-4xl rounded-full text-white fixed bottom-0 right-0 m-10"
        id="openModal">
        <span class="material-symbols-outlined" style="font-size: 56px">
            add
        </span>
    </button>
    <div id="modalOverlay" class="modal-overlay"></div>
    <div id="myModal" class="fixed mt-10 inset-0 z-50 hidden">
        <!-- Modal Content -->
        <div class="flex place-content-center">
            <div class="bg-white p-6 rounded-md shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">เปิดเช็คชื่อ</h2>

                <form action="{{ route('teacher.addAtSes') }}" method="POST" class="flex flex-col my-4">
                    @csrf
                    <input type="hidden" value="{{ $id }}" name="subject_id">
                    <label for="subject_code">สัปดาที่ :</label>
                    <input type="number" class=" w-96 rounded-lg my-2 border-2" name="session">
                    <label for="subject_name">เวลาเปิด :</label>
                    <input type="time" class=" w-96 rounded-lg my-2 border-2" name="attendanceOpen">
                    <label for="subject_desc">เวลาปิด :</label>
                    <input type="time" class=" w-96 rounded-lg my-2 border-2" name="attendanceClose">
                    <label for="section">เวลาสาย :</label>
                    <input type="time" class=" w-96 rounded-lg my-2 border-2" name="attendanceLate">
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
    <script>
        $(document).ready(function() {

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
