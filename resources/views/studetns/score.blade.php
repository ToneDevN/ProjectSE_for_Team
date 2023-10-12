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
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">เช็คชื่อ</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('students.score', ['id' => $id]) }}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md border-l-4 p-4">
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
                <div class="w-full mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white flex justify-start shadow-sm sm:rounded-lg">
                        <span class="p-6 text-gray-900 text-2xl font-medium">
                            คะแนนเช็คชื่อ
                        </span>

                    </div>
                </div>
                <div class="w-full mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-base text-left text-gray-700 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 table-fixed">
                                    <tr class="font-medium text-lg">
                                        @foreach ($sessions as $session)
                                            <th scope="col" class="px-6 py-3 w-10">สัปดาที่
                                                {{ $session->attendanceSession }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($lectures as $lecture)
                                            <td scope="col" class="px-6 py-3 w-10">{{ $lecture->lectureScore }}</td>
                                        @endforeach
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="pt-6">
                <div class="w-full mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white flex justify-start shadow-sm sm:rounded-lg">
                        <span class="p-6 text-gray-900 text-2xl font-medium">
                            คะแนนแล็บ
                        </span>

                    </div>
                </div>
                <div class="w-full mx-auto sm:px-6 lg:px-8 py-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-base text-left text-gray-700 table-fixed">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr class="font-medium text-lg">
                                        <th scope="col" class="px-6 py-3 w-44">
                                            รหัสนักศึกษา
                                        </th>
                                        <th scope="col" class="px-6 py-3 w-44">
                                            ชื่อ-นามสกุล
                                        </th>
                                        <th scope="col" class="px-6 py-3 ">
                                            สัปดาที่ 1
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($student as $student)
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
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </x-app-layouts>
