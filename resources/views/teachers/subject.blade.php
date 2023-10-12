<x-app-layout>
    {{-- sideBar --}}
    <div class="grid grid-cols-12">
        <div class="col-start-1 col-span-2 h-screen">
            <div class="bg-gray-800 w-full rounded-r-md h-full mt-2 mr-5 text-white text-xl font-medium py-4 pr-2">
                <ul class="grid gap-4 ">
                    <li class="h-10 ">
                        <a href="{{ route('teacher.subject', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 text-2xl font-medium flex flex-col gap-4">
                            <div>รหัสวิชา : <span class="text-xl font-normal">{{ $subject->subjectCode }}</span></div>
                            <div>ชื่อวิชา : <span class="text-xl font-normal">{{ $subject->subjectName }}</span></div>
                            <div>เทอม : <span class="text-xl font-normal">{{ $subject->term }}</span></div>
                            <div>ปีการศึกษา : <span class="text-xl font-normal">{{ $subject->year }}</span></div>
                            <div>รายละเอียด : <span class="text-xl font-normal">{{ $subject->description }}</span></div>
                            <div class="flex justify-end">
                                <button id="editButton" type="button"
                                class="mt-4 mx-4 bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                แก้ไข
                                </button>
                                <button id="deleteButton" type="submit"
                                    class="mt-4 mx-4 bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded">
                                    ลบ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editStudent" class="fixed mt-10 inset-0 z-50 hidden">
        <!-- Modal Content -->
        <div class="flex place-content-center">
            <div class="bg-white p-16 rounded-md shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">แก้ไขวิชา</h2>
                <form action="{{ route('teacher.editSubject') }}" method="POST" class="flex flex-col my-4">
                    @csrf
                    <label for="subject_code">รหัสวิชา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="subject_code"
                        id="subject_code">
                    <label for="subject_name">ชื่อวิชา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="subject_name"
                        id="subject_name">
                    <label for="subject_desc">รายละเอียด :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="subject_desc"
                        id="subject_desc">
                    <label for="section">เซคชั่น :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="section" id="section">
                    <label for="term">เทอม :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="term" id="term">
                    <label for="year">ปีการศึกษา :</label>
                    <input type="text" class=" w-96 rounded-lg my-2 border-2" name="year" id="year">
                    <input type="hidden" name="subject_id" value="{{$subject->subject_id}}">
                    <div class="flex justify-end">
                        <button id="closeEdit" type="button"
                            class="mt-4 mx-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            ปิด
                        </button>
                        <button id="saveData" type="submit"
                            class="mt-4 mx-4 bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            แก้ไข
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="deleteStudent" class="fixed mt-10 inset-0 z-50 hidden">
        <!-- Modal Content -->
        <div class="flex place-content-center">
            <div class="bg-white p-16 rounded-md shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">ลบวิชา</h2>
                <form action="{{ route('teacher.deleteSubject') }}" method="POST" class="flex flex-col my-4">
                    @csrf
                    <input type="hidden" id="deleteData" name="id" value="">

                    <div class="flex justify-end">
                        <button id="closeDelete" type="button"
                            class="mt-4 mx-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            ปิด
                        </button>
                        <button id="saveData" type="submit"
                            class="mt-4 mx-4 bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded">
                            ลบ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // เมื่อคลิกปุ่ม "แก้ไข"
            $("#editButton").click(function() {
                // แสดง Modal แก้ไข
                $("#editStudent").removeClass("hidden");
            });
    
            // เมื่อคลิกปุ่ม "ลบ"
            $("#deleteButton").click(function() {
                // แสดง Modal ลบ
                $("#deleteStudent").removeClass("hidden");
            });
    
            // เมื่อคลิกปุ่ม "ปิด" ใน Modal แก้ไข
            $("#closeEdit").click(function() {
                // ซ่อน Modal แก้ไข
                $("#editStudent").addClass("hidden");
            });
    
            // เมื่อคลิกปุ่ม "ปิด" ใน Modal ลบ
            $("#closeDelete").click(function() {
                // ซ่อน Modal ลบ
                $("#deleteStudent").addClass("hidden");
            });
        });
    </script>
    
</x-app-layout>
