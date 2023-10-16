<?php

namespace App\Livewire;

use App\Models\Section;
use App\Models\Question;
use App\Models\Survey;
use Livewire\Component;

class Wizard extends Component
{
    public $sections;
    public $jumlahSection;
    public $surveys;
    public $currentSection = 0;
    public function mount()
    {
        $this->sections = Section::all();
    }
    public function render()
    {
        $sections = Section::all();
        $jumlahSection = Section::count();
        $questions = Question::all();
        $surveys = Survey::where();
        return view('livewire.wizard', compact('sections', 'questions', 'surveys', 'jumlahSection'));
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
