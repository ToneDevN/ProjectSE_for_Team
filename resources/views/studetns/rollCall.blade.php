<x-app-layout>
    {{-- sideBar --}}
    <div class="grid grid-cols-12">
        <div class="col-start-1 col-span-2 h-screen">
            <div class="bg-gray-800 w-full rounded-r-md h-full mt-2 mr-5 text-white text-xl font-medium py-4 pr-2">
                <ul class="grid gap-4 ">
                    <li class="h-10 ">
                        <a href="{{ route('students.subject', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">หน้าหลักวิชา</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('students.attendance', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md border-l-4 p-4">
                                <div class="place-self-center">เช็คชื่อ</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('students.score', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">คะแนน</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('students.home') }}">
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
                        <form action="{{ route('student.attendacerecord') }}" method="POST">
                            @csrf <!-- ใส่ตัวรหัสความปลอดภัย (CSRF token) สำหรับความปลอดภัย -->
                            <!-- ส่วนที่คุณต้องการส่ง -->
                            <label for="input_field">เช็คชื่อสัปดาที่ :</label>
                            <input type="number" name="attend" id="attend">
                            <input type="hidden" name="subject_id" value="{{$id}}">

                            <!-- ปุ่มสำหรับส่งฟอร์ม -->
                            <button id="saveData" type="submit"
                            class="mt-4 mx-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            เช็คชื่อ
                        </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </x-app-layouts>
