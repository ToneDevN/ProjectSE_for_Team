<x-app-layout>
    {{-- sideBar --}}
    <div class="grid grid-cols-12">
        <div class="col-start-1 col-span-2 h-screen">
            <div class="bg-gray-800 w-full rounded-r-md h-full mt-2 mr-5 text-white text-xl font-medium py-4 pr-2">
                <ul class="grid gap-4 ">
                    <li class="h-10 ">
                        <a href="{{ route('students.subject', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md border-l-4 p-4">
                                <div class="place-self-center">หน้าหลักวิชา</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('students.attendance', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 text-2xl font-medium flex flex-col gap-4">
                            <div>รหัสวิชา : <span class="text-xl font-normal">{{ $subject->subjectCode }}</span></div>
                            <div>ชื่อวิชา : <span class="text-xl font-normal">{{ $subject->subjectName }}</span></div>
                            <div>เทอม : <span class="text-xl font-normal">{{ $subject->term }}</span></div>
                            <div>ปีการศึกษา : <span class="text-xl font-normal">{{ $subject->year }}</span></div>
                            <div>รายละเอียด : <span class="text-xl font-normal">{{ $subject->description }}</span></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-app-layouts>
