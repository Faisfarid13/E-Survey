<div class="wizard">
    <form action="" method="post">
        @foreach($sections as $key => $section)
        @if($key === $currentSection)
        <div class="section">
            <h2>{{ $section->section }}</h2>

                    @if($key === count($sections) - 1)
                        <!-- Ini adalah section terakhir -->
                        <button wire:click="submitForm">Submit</button>
                    @else
                        @if($key > 0)
                            <button wire:click="previousSection">Back</button>
                        @endif

                        @if($key < count($sections) - 1)
                            <button wire:click="nextSection">Next</button>
                        @endif
                    @endif
                </div>
            @endif
        @endforeach
    </form>
</div>
