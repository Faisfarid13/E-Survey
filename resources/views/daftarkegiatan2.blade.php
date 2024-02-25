{{-- tailwind --}}
<link rel="stylesheet" href="/var/www/html/esurvey_new/resources/css/app.css">
{{-- font --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css','resources/js/app.js'])

<div id="listEvent" class="items-center justify-center w-full md:h-[34rem] h-[46rem] pb-4 mb-4 mx-auto rounded-2xl">
     <!-- content -->
      <div class="grid md:grid-cols-2 grid-cols-1 gap-4 my-8 text-black" style="font-family: Poppins;">
        @foreach ($events as $event)
                @if(auth()->check())
                <button onclick="window.location.href = '/form/{{ $event->slug }}'" class="bg-[#FFFFFF] mx-auto text-left w-full drop-shadow-lg rounded-xl p-4 hover:shadow-xl">
                @else
                <button onclick="window.location.href = '/admin/login'" class="bg-[#FFFFFF] mx-auto text-left w-full drop-shadow-lg rounded-xl p-4 hover:shadow-xl">
                @endif
                    <h1 class="font-semibold text-[1rem] md:text-[1.25rem] mb-2">{{ $event->name }}</h1>
                    <p class="text-[0.6875rem] md:text-[0.875rem]">{!! Str::words($event->desc, 20) !!}</p>
                    <table class="mt-2">
                        <tbody class="mt-2">
                            <tr>
                                <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Mulai </td>
                                <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{ $event->date_start }}</td>
                            </tr>
                            <tr>
                                <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">Tanggal Survey Ditutup </td>
                                <td style="font-family: Poppins;" class="text-[0.5rem] md:text-[0.6875rem]">: {{ $event->date_end }}</td>
                            </tr>
                        </tbody>
                    </table>
                </button>
        @endforeach
    </div>

    <!-- pagination -->
    <div class="mt-2 md:mt-2">
        <div class="pagination">
            {{ $events->links() }}
        </div>
    </div>

</div>

<script type="module">
    $(document).ready(function(){
        function loadPaginatedContent(url){
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response){
                    $('#listEvent').html($(response)).find('#listevent').html();
                },
                error: function(xhr){
                    console.log('Error:', xhr);
                }
            });
        }

        $(document).on('click', '.pagination a', function(e){
            console.log('clicked');
            e.preventDefault();

            var url = $(this).attr('href');
            loadPaginatedContent(url);
        });
    });
</script>


