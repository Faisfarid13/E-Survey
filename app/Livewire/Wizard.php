<?php

namespace App\Livewire;
use App\Models\Section;
use Livewire\Component;

class Wizard extends Component
{
    public $sections;
    public $currentSection = 0;
    public function mount()
    {
        $this->sections = Section::all();
    }
    public function render()
    {
        return view('livewire.wizard');
    }
    public function nextSection()
    {
        if ($this->currentSection < count($this->sections) - 1) {
            $this->currentSection++;
        }
    }

    public function previousSection()
    {
        if ($this->currentSection > 0) {
            $this->currentSection--;
        }
    }

    public function submitForm()
    {
        // Logika pemrosesan data pada saat tombol "Submit" ditekan
    }
}
