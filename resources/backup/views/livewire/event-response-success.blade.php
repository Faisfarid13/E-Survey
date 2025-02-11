<div class="py-3 md:px-3 xl:px-3 md:container md:mx-auto">
    <section class="bg-green-100 rounded">
        <div class="mx-auto px-4 py-4 lg:flex lg:items-center">
            <div class="mx-auto max-w-full text-center">
                <h1 class="text-xl font-extrabold sm:text-xl">
                    Formulir Curriculum Vitae <br>{{$event->name}}
                </h1>
                <p class="mt-4 sm:text-xl/relaxed">
                    Terima kasih, CV an. {{$eventResponse->name}}, telah disimpan. <br>
                    Silahkan copy url untuk menyimpan bukti.
                </p>
            </div>
        </div>
    </section>
    {{ $this->formInfolist }}
    <section class="bg-amber-100 rounded">
        <div class="flex justify-center mx-auto px-4 py-4 lg:flex lg:items-center">
            <a href="{{route('event.form', $event)}}" class="md:underline">Kembali ke Form</a>
        </div>
    </section>
    <x-filament-actions::modals />
    @livewire('notifications')
</div>
