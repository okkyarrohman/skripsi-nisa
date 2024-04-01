@extends('layouts.app')

@push('head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/pagination.css') }}">
@endpush

@section('content')
    <form action="{{ route('kuis.store') }}" method="POST">
        @csrf

        <input type="hidden" name="kategori_kuis_id" value="{{ $kategori->id }}">
        <div class="border-b-2 border-b-[#C1C2C4] mx-16 mt-16 mb-8 min-h-[510px] pb-10">
            <h1 class="text-[#45484F] font-bold text-3xl">Quiz</h1>
            <p class="text-[#215784] font-semibold text-lg">Dasar-dasar CSS</p>
            <div class="flex">
                <div class="w-4/5 mr-6">
                    <div class="mb-6">
                        <div>
                            <div class="flex justify-between items-center mb-2 mt-5">
                                <div class=" text-[#45484F] font-medium ">
                                    Progress <span id="progres"></span>%</div>
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
                        {{-- <table class="table-fixed flex justify-center my-3">
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
                    </table> --}}
                        <div class="">
                            <div id="demo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-10 flex justify-around items-center">
            <button type="button" id="sebelum-btn"
                class="text-white bg-[#215784] border border-[#A2A2A2] px-7 py-2 rounded-lg">Sebelumnya</button>

            <button type="submit" class="bg-[#EAA718] text-white px-7 py-2 rounded-lg">Submit</button>

            <button type="button" id="selanjut-btn"
                class="bg-[#215784] text-white px-7 py-2 rounded-lg">Selanjutnya</button>
        </div>
    </form>
@endsection

@push('script-bottom')
    <script>
        var selectedOptions = {};
        var totalSoal = @json($categories[0]->soal->count());

        var selanjutBtn = document.getElementById('selanjut-btn');
        var sebelumBtn = document.getElementById('sebelum-btn');
        selanjutBtn.addEventListener('click', function() {
            var demo = $('#demo');
            demo.pagination('next');
        });
        sebelumBtn.addEventListener('click', function() {
            var demo = $('#demo');
            demo.pagination('previous');
        });

        $(document).on('change', 'input[type="radio"]', function() {
            var id = $(this).closest('.soal-container').data('soal-id');
            // var value = $('input[name="opsi_' + id + '"]:checked').val();
            var value = $('input[id="opsi_' + id + '"]:checked').val();
            selectedOptions[id] = value;

            var jumlahDikerjakan = Object.keys(selectedOptions).length;
            var progress = (jumlahDikerjakan / totalSoal) * 100;
            $('#progres').text(progress.toFixed(0));
        });

        $('form').submit(function(e) {
            e.preventDefault();
            if (Object.keys(selectedOptions).length < @json($categories[0]->soal->count())) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda belum menjawab semua soal!',
                });
                return;
            }
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengubah jawaban setelah mengirim!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, kirim!'
            }).then((result) => {
                if (result.isConfirmed) {
                    buatInputSoal();
                    this.submit();
                }
            })

        });

        function buatInputSoal() {
            for (var key in selectedOptions) {
                if (selectedOptions.hasOwnProperty(key)) {
                    // Buat elemen input
                    var input = $('<input>').attr({
                        type: 'hidden',
                        name: 'soal[]',
                        value: selectedOptions[key]
                    });
                    // Masukkan elemen input ke dalam formulir
                    $('form').append(input);
                }
            }
        }

        $('#demo').pagination({
            dataSource: @json($categories[0]->soal),
            pageSize: 1,
            showPageNumbers: true,
            showNavigator: true,
            className: 'paginationjs-theme-blue paginationjs-big',

            callback: function(data, pagination) {
                var dataContainer = $('#soal');
                var tampung = '';

                // console.log(data)

                data.forEach((element, index) => {
                    // console.log(element)
                    var element = `
                    <div class="soal-container" data-soal-id="${element.id}">
                    <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                    Soal ${element.id}
                </div>
                <p class="mb-3">
                    ${element.soal}
                </p>
                <div class="flex flex-col gap-2">
                    ${
                        element.opsi.map(opsi => {
                            console.log(opsi.id)
                            var radioName = `soal_${element.id}`;
                            var checked = selectedOptions[element.id] == opsi.id ? 'checked' : '';
                            return `
                                                                                            <label class="inline-flex items-center mt-3 mr-3">
                                                                                                <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="testing" id="opsi_${element.id}" value="${opsi.id}" ${checked}>
                                                                                                    <span class="ml-2">${opsi.opsi}</span>
                                                                                                </label>`
                        }).join('')
                    }
                </div>
            </div>
                `

                    tampung += element;
                    // $('#soal').html(element)


                });
                $('#soal').html(tampung)
                // dataContainer.html(html);
            }
        })
    </script>
@endpush
