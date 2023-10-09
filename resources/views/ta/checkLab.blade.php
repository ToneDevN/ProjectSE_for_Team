<x-app-layout>
    {{-- sideBar --}}
    <div class="grid grid-cols-12">
        <div class="col-start-1 col-span-2 h-screen">
            <div class="bg-gray-800 w-full rounded-r-md h-full mt-2 mr-5 text-white text-xl font-medium py-4 pr-2">
                <ul class="grid gap-2 ">
                    <li class="h-10 ">
                        <button class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
                            <div class="place-self-center">รายวิชา</div>
                        </button>
                    </li>
                    <li class="h-10 ">
                        <button class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
                            <div class="place-self-center">คะแนน</div>
                        </button>
                    </li>
                    <li class="h-10 ">
                        <button class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4">
                            <div class="place-self-center">เช็คชื่อ</div>
                        </button>
                    </li>
                    <li class="h-10 ">
                        <button
                            class="bg-gray-900 w-full h-full flex justify-items-start rounded-r-md p-4 border-l-4 text-lg">
                            <div class="place-self-center">กลับไปยังหน้าหลัก</div>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        {{-- EndSideBar --}}
        <div class="col-start-3 col-span-12 ">

        </div>
    </div>
</x-app-layout>
