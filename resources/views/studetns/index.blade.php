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
                    <div class="grid-cols-4 gap-6">
                        <div class="w-1/6 h-72 bg-slate-100  rounded-md m-4 text-white text-4xl ">
                            <button class="bg-blue-500 w-full h-2/5 top-0 rounded-t-md px-4 relative">
                                <div class="flex justify-between">
                                    <span class=" place-self-center">ชื่อวิชา</span>
                                    <a id="dropdownfunc" class="place-self-center">
                                        <span class="material-symbols-outlined" style="font-size: 40px">
                                            more_vert
                                        </span>
                                    </a>

                                    {{-- dropdown-list --}}

                                    <div class="text-xl text-black absolute -bottom-4 right-0 w-1/3 mr-4 hidden"
                                        id="dropdown1">
                                        <ul>
                                            <li class="w-full h-1/2 bg-yellow-500 rounded-t-md p-1">
                                                <a class="" href="#">
                                                    <div class="w-full h-full flex justify-start">
                                                        <span class="material-symbols-outlined flex place-items-center">
                                                            edit
                                                        </span>
                                                        <span class="flex place-items-center">| edit</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="bg-rose-500 w-full h-1/2 rounded-b-md p-1">
                                                <a class="" href="#">
                                                    <div class="w-full h-full flex justify-start">
                                                        <span class="material-symbols-outlined flex place-items-center">
                                                            delete
                                                        </span>
                                                        <span class="flex place-items-center">| delete</span>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                                <div class="text-2xl flex justify-items-start gap-10">
                                    <span>รหัสวิชา</span>
                                    <span>section</span>
                                </div>

                            </button>
                            <div class="w-full h-3/5 bg-slate-100 rounded-b-md font-medium text-xl text-black p-4 ">
                                รายละเอียด
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#dropdownfunc").click(function () {
                // Remove the class from the element
                $("#dropdown1").toggleClass("hidden");
            });
        });
    </script>

</x-app-layout>
