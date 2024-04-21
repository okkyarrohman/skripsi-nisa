@extends('layouts.app')

{{-- @dd($result->soal) --}}

@section('content')
    <div class=" m-16">
        <div class="flex justify-between mb-6">
            <div>
                <h1 class="text-[#45484F] font-bold text-4xl">Hasil Quiz</h1>
                <p class="text-[#215784] font-semibold text-xl">{{ $result->kategori_kuis->kuis }}</p>
            </div>
            <div class="flex border w-fit px-4 my-2 items-center rounded-xl">
                Nilai :
                <p class="font-bold ml-2 text-3xl ">{{ $result->total_points }}</p>
                <p class="text-sm mt-2">/100</p>
            </div>
        </div>
        @foreach ($result->soal as $item)
            <div class="mt-4 mb-5">
                <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                    Soal {{ $loop->iteration }}
                </div>
                <p class="mb-3">
                    {{ $item->soal }}
                </p>
                {{-- @dd($item->pivot) --}}
                <div class="flex flex-col gap-2">
                    @foreach ($item->opsi as $opsi)
                        <button
                            class="border  border-[#055EA8] px-3 py-1 {{ $item->pivot->opsi_id == $opsi->id ? 'bg-[#76FF03]' : '' }}  w-fit rounded">
                            {{ $opsi->opsi }}
                        </button>
                    @endforeach
                    {{-- <button class="border  border-[#055EA8] px-3 py-1 bg-[#76FF03] w-fit rounded">
                        A. Bagus Sekali
                    </button>
                    <button class="border border-[#055EA8] px-3 py-1  w-fit rounded">
                        B. Bagus
                    </button>
                    <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                        C. Cukup Bagus
                    </button>
                    <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                        D. Kurang Bagus
                    </button>
                    <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                        E. Sangat Kurang
                    </button> --}}
                </div>
            </div>
        @endforeach
        {{-- <div class="mt-4 mb-5">
            <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                Soal 1
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
                <button class="border  border-[#055EA8] px-3 py-1 bg-[#76FF03] w-fit rounded">
                    A. Bagus Sekali
                </button>
                <button class="border border-[#055EA8] px-3 py-1  w-fit rounded">
                    B. Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    C. Cukup Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    D. Kurang Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    E. Sangat Kurang
                </button>
            </div>
        </div> --}}
        {{-- <div class="mt-4 mb-5 border-t pt-10">
            <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                Soal 2
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
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    A. Bagus Sekali
                </button>
                <button class="border border-[#055EA8] px-3 py-1 bg-[#FF0D1E] text-white w-fit rounded">
                    B. Bagus
                </button>
                <div class="flex items-center gap-2">
                    <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                        C. Cukup Bagus
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="w-6 h-6 text-[#76FF03] ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    D. Kurang Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    E. Sangat Kurang
                </button>
            </div>
        </div>
        <div class="mt-4 mb-5 border-t pt-10">
            <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
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
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    A. Bagus Sekali
                </button>
                <button class="border border-[#055EA8] px-3 py-1 bg-[#FF0D1E] text-white w-fit rounded">
                    B. Bagus
                </button>
                <div class="flex items-center gap-2">
                    <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                        C. Cukup Bagus
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="w-6 h-6 text-[#76FF03] ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    D. Kurang Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    E. Sangat Kurang
                </button>
            </div>
        </div>
        <div class="mt-4 mb-5 border-t pt-10">
            <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                Soal 4
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
                <button class="border  border-[#055EA8] px-3 py-1 bg-[#76FF03] w-fit rounded">
                    A. Bagus Sekali
                </button>
                <button class="border border-[#055EA8] px-3 py-1  w-fit rounded">
                    B. Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    C. Cukup Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    D. Kurang Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    E. Sangat Kurang
                </button>
            </div>
        </div>
        <div class="mt-4 mb-10 border-t pt-10">
            <div class="text-white border font-bold bg-[#215784] w-fit px-4 py-2 rounded-lg mb-3">
                Soal 5
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
                <button class="border  border-[#055EA8] px-3 py-1 bg-[#76FF03] w-fit rounded">
                    A. Bagus Sekali
                </button>
                <button class="border border-[#055EA8] px-3 py-1  w-fit rounded">
                    B. Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    C. Cukup Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    D. Kurang Bagus
                </button>
                <button class="border  border-[#055EA8] px-3 py-1  w-fit rounded">
                    E. Sangat Kurang
                </button>
            </div>
        </div> --}}
    </div>
    <div class="flex items-center justify-center gap-2 mb-12">
        <a href="" class="border p-3 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </a>
        <a href="" class="bg-[#215784] text-white font-bold px-4 py-2 rounded-lg">1</a>
        <a href="" class=" text-[#BDBDBD] border border-[#BDBDBD] font-bold px-4 py-2 rounded-lg">2</a>
        <a href="" class=" text-[#BDBDBD] border border-[#BDBDBD] font-bold px-4 py-2 rounded-lg">3</a>
        <a href="" class=" text-[#BDBDBD] border border-[#BDBDBD] font-bold px-4 py-2 rounded-lg">4</a>
        <a href="" class="p-3 rounded-lg text-[#BDBDBD] border border-[#BDBDBD]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-[#215784]">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </a>
    </div>
@endsection
