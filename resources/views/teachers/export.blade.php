<x-app-layout>
    {{-- sideBar --}}
    <div class="grid grid-cols-12">
        <div class="col-start-1 col-span-2 h-screen">
            <div class="bg-gray-800 w-full rounded-r-md h-full mt-2 mr-5 text-white text-xl font-medium py-4 pr-2">
                <ul class="grid gap-4 ">
                    <li class="h-10 ">
                        <a href="{{ route('teacher.subject',['id'=> $id])}}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 ">
                                <div class="place-self-center">หน้าหลักวิชา</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.rollcall',['id'=> $id])}}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">คะแนนเช็คชื่อ</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.lab',['id'=> $id])}}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">คะแนนแล็บ</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.manage',['id'=> $id])}}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4">
                                <div class="place-self-center">จัดการผู้ใช้</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.export',['id'=> $id])}}">
                            <div class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
                                <div class="place-self-center">ส่งออกข้อมูล</div>
                            </div>
                        </a>
                    </li>
                    <li class="h-10 ">
                        <a href="{{ route('teacher.home')}}">
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

        </div>
    </div>
</x-app-layout>
