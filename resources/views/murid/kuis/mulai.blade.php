@extends('layouts.app')

{{-- @dd($categories) --}}
{{-- @foreach ($categories->soal as $soal)
    <h1>{{ $soal->soal }}</h1>
    @foreach ($soal->opsi as $opsi)
        <p>{{ $opsi->opsi }}</p>
    @endforeach
@endforeach --}}

@push('head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
@endpush

@section('content')
    <div class="border-b-2 border-b-[#C1C2C4] mx-16 mt-16 mb-8 min-h-[510px] pb-10">
        <h1 class="text-[#45484F] font-bold text-3xl">Quiz</h1>
        <p class="text-[#215784] font-semibold text-lg">Dasar-dasar CSS</p>
        <div class="flex">
            <div class="w-4/5 mr-6">
                <div class="mb-6">
                    <div>
                        <div class="flex justify-between items-center mb-2 mt-5">
                            <div class=" text-[#45484F] font-medium ">
                                Progress 25%</div>
                            <div class="border px-3 py-1 w-fit border-[#215784] text-[#215784] rounded-lg">
                                00:29:17
                            </div>
                        </div>
                        <div class="flex w-full h-2 bg-[#C1C2C4] rounded-full overflow-hidden " role="progressbar"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-[#215784] text-xs text-white text-center whitespace-nowrap transition duration-500 "
                                style="width: 25%"></div>
                        </div>
                    </div>
                </div>
                <div id="soal"></div>
                {{-- <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                    Soal 3
                </div>
                <p class="mb-3">
                    Lorem ipsum dolor sit amet consectetur. Interdum odio interdum morbi vitae nec. Consequat et
                    interdum
                    consectetur volutpat sollicitudin vulputate elementum nulla proin. Mattis tellus nisi adipiscing
                    commodo
                    quis. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse architecto at rerum culpa
                    soluta nisi
                    voluptatibus, aliquid tempora natus quam perferendis neque maiores quia quos nesciunt iure velit
                    facere accusantium.
                </p>
                <div class="flex flex-col gap-2">
                    <button
                        class="border hover:bg-blue-200 border-[#055EA8] px-3 py-1 focus:bg-[#055EA8] focus:text-white w-fit rounded">
                        A. Bagus Sekali
                    </button>
                    <button
                        class="border hover:bg-blue-200 border-[#055EA8] px-3 py-1 focus:bg-[#055EA8] focus:text-white w-fit rounded">
                        B. Bagus
                    </button>
                    <button
                        class="border hover:bg-blue-200 border-[#055EA8] px-3 py-1 focus:bg-[#055EA8] focus:text-white w-fit rounded">
                        C. Cukup Bagus
                    </button>
                    <button
                        class="border hover:bg-blue-200 border-[#055EA8] px-3 py-1 focus:bg-[#055EA8] focus:text-white w-fit rounded">
                        D. Kurang Bagus
                    </button>
                    <button
                        class="border hover:bg-blue-200 border-[#055EA8] px-3 py-1 focus:bg-[#055EA8] focus:text-white w-fit rounded">
                        E. Sangat Kurang
                    </button>
                </div> --}}
            </div>
            <div class="w-1/5 mx-6">
                <div class="border border-[#C1C2C4] rounded-lg">
                    <p class="border-b border-b-[#C1C2C4] py-3 flex justify-center items-center font-semibold">Soal</p>
                    <table class="table-fixed flex justify-center my-3">
                        <!-- <thead>
                                                                                                                                                    <tr>
                                                                                                                                                        <th>Song</th>
                                                                                                                                                        <th>Artist</th>
                                                                                                                                                        <th>Year</th>
                                                                                                                                                    </tr>
                                                                                                                                                </thead> -->
                        <tbody>
                            <tr class="flex">
                                <td class="bg-[#A2A2A2] w-7 flex items-center p-2 justify-center m-2 rounded text-white">
                                    <a href="">1</a>
                                </td>
                                <td class="bg-[#A2A2A2] w-7 flex items-center p-2 justify-center m-2 rounded text-white">
                                    <a href="">2</a>
                                </td>
                                <td class="bg-[#215784] w-7 flex items-center p-2 justify-center m-2 rounded text-white">
                                    <a href="">3</a>
                                </td>
                                <td class="bg-[#EAA718] w-7 flex items-center p-2 justify-center m-2 rounded text-white">
                                    <a href="">4</a>
                                </td>
                                <td class="bg-[#A2A2A2] w-7 flex items-center p-2 justify-center m-2 rounded text-white">
                                    <a href="">5</a>
                                </td>
                            </tr>
                            <tr class="flex">
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">6</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">7</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">8</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">9</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">10</a>
                                </td>
                            </tr>
                            <tr class="flex">
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">11</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">12</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">13</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">14</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">15</a>
                                </td>
                            </tr>
                            <tr class="flex">
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">16</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">17</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">18</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">19</a>
                                </td>
                                <td
                                    class="bg-[#F1F1F1] w-7 flex items-center p-2 justify-center m-2 rounded text-[#45484F] ">
                                    <a href="">20</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="my-10 flex justify-around items-center">
        <a href="" class="text-[#A2A2A2] bg-[#E9E9E9] border border-[#A2A2A2] px-7 py-2 rounded-lg">Sebelumnya</a>
        <a href="" class="bg-[#EAA718] text-white px-7 py-2 rounded-lg">Ragu - ragu</a>
        <a href="{{ route('kuis.show', ['kui' => 1]) }}"
            class="bg-[#215784] text-white px-7 py-2 rounded-lg">Selanjutnya</a>
    </div>

    <div id="demo"></div>
@endsection

@push('script-bottom')
    <script>
        $('#demo').pagination({
            dataSource: @json($categories[0]->soal),
            pageSize: 1,
            showPageNumbers: true,
            showNavigator: true,
            className: 'paginationjs-theme-blue paginationjs-big',

            callback: function(data, pagination) {
                var dataContainer = $('#soal');
                var tampung = '';

                data.forEach((element, index) => {
                    var element = `<div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                    Soal ${index+1}
                </div>
                <p class="mb-3">
                    ${element.soal}
                </p>
                <div class="flex flex-col gap-2">
                    ${
                        element.opsi.map(opsi => {
                            return `<button class="border hover:bg-blue-200 border-[#055EA8] px-3 py-1 focus:bg-[#055EA8] focus:text-white w-fit rounded">
                                                                            ${opsi.opsi}
                                                                        </button>`
                        }).join('')
                    }
                </div>`

                    tampung += element;

                });
                $('#soal').html(tampung)
                // dataContainer.html(html);
            }
        })
    </script>
@endpush
