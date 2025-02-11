<x-layouts.app>
    @section('metadata')
        <meta property="og:title" content="Formulir CV "{{$event->name}}/>
        <meta property="og:site_name" content="e-survey Badan Litbang dan Diklat - Kementerian Agama"/>
        <meta property="og:description" content="e-survey Badan Litbang dan Diklat - Kementerian Agama"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="{{route('event.form',$event)}}"/>
        <meta property="og:image" content="{{ asset('favicon.png') }}"/>
    @endsection
    <x-home.navbar />
    @livewire('event-response-post', [$event])
    <x-home.footer />
</x-layouts.app>
