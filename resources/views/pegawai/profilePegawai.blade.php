@extends('navbar-pegawai2')
@section('title')
    Profile Pegawai
@endsection

@section('content')

    {{-- title page --}}
    <p class="text-center text-xl md:text-3xl mt-10" style="font-family: 'Inter'; font-weight:700; font-style:normal; font-line:normal">Profile</p>
    
    {{-- profile --}}
    <div class="container mx-auto w-4/5 md:w-2/5 mt-10 mb-20">
        <div class="grid grid-rows-6 gap-y-0">
            {{-- profile photo --}}
            @if(auth()->check() && auth()->user()->photo)
                <div class="rounded-full bg-cover bg-center w-24 h-24 mx-auto" style="background-image: url('{{ asset('storage/' . auth()->user()->photo) }}')"></div>
            @else
                <div class="rounded-full bg-gray-500 w-24 h-24 mx-auto" style="background-image: url({{ asset('/asset/profileabu.svg') }})"></div>
            @endif

            {{-- profile data --}}
            <div class="h-14 mt-10">
                <div class="grid grid-cols-2">
                    <p style="font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal" class="mb-2 text-sm md:text-base ">NIP</p>
                    <!-- button edit profile -->
                    <button onclick="window.location.href = '/admin/profile'" class="justify-self-end bg-[#F5C577] hover:bg-[#f5C177] hover:shadow-md text-semibold border rounded w-[55%] text-xs md:text-sm md:w-2/5 h-3/4 justify-end">Edit Profile</button>
                </div>
                <div class="rounded-md w-full border-gray-300 border pl-3 pt-2 pb-2"><p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">{{auth()->user()->nip}}</p></div>
            </div>
            <div class="h-14 mt-10">
                <p style="font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal" class="mb-2 text-sm md:text-base">Nama Pegawai</p>
                <div class="rounded-md w-full border-gray-300 border pl-3 pt-2 pb-2"><p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">{{ auth()->user()->name }}</p></div>
            </div>
            <div class="h-14 mt-10">
                <p style="font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal" class="mb-2 text-sm md:text-base">Pangkat</p>
                <div class="rounded-md w-full border-gray-300 border pl-3 pt-2 pb-2"><p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">{{ auth()->user()->pangkat }}</p></div>
            </div>
            <div class="h-14 mt-10">
                <p style="font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal" class="mb-2 text-sm md:text-base">Tempat Lahir</p>
                <div class="rounded-md w-full border-gray-300 border pl-3 pt-2 pb-2"><p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">{{ auth()->user()->place_of_birth }}</p></div>
            </div>
            <div class="h-14 mt-10">
                <div class="grid grid-cols-2 gap-10">
                    <div>
                        <p style="font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal" class="mb-2 text-sm md:text-base">Jenis Kelamin</p>
                        <div class="rounded-md w-full md:w-3/5 border-gray-300 border pl-3 pt-2 pb-2">
                            @if(auth()->user()->gender == 0)
                                <p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">Perempuan</p>
                            @else
                                <p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">Laki-Laki</p>
                            @endif
                        </div>
                    </div>
                    <div>
                        <p style="font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal" class="mb-2 text-sm md:text-base">Status Pegawai</p>
                        <div class="rounded-md w-full md:w-3/5 border-gray-300 border pl-3 pt-2 pb-2"><p class="text-sm md:text-base text-[#999999]" style=" font-family: 'Inter'; font-weight:600; font-style:normal; font-line:normal">Aktif</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection