<div class="py-3 md:px-3 xl:px-3 md:container md:mx-auto">
    <section class="bg-gray-100 rounded">
        <div class="mx-auto px-4 py-4 lg:flex lg:items-center">
            <div class="mx-auto max-w-full text-center">
                <h1 class="text-xl font-extrabold sm:text-xl">
                    Formulir Curriculum Vitae <br>{{$event->name}}
                </h1>
                <p class="mt-4 sm:text-xl/relaxed">
                    {!! $event->location !!}
                    Tanggal, @if($event->date_start->translatedFormat('F') == $event->date_end->translatedFormat('F'))
                        {{$event->date_start->translatedFormat('d')}} - {{$event->date_end->translatedFormat('d F Y')}}
                    @else
                        {{$event->date_start->translatedFormat('d F')}} - {{$event->date_end->translatedFormat('d F Y')}}
                    @endif
                </p>
            </div>
        </div>
    </section>
    <form wire:submit="create">
        {{ $this->form }}
    </form>
    <x-filament-actions::modals />
    @livewire('notifications')
</div>
