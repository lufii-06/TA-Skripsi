<?php

namespace App\Http\Livewire;

use App\Models\DetailJawaban;
use Livewire\Component;

class KuisIndex extends Component
{
    public $detailjawaban;
    public $jawaban;
    public $soal;
    public $currentIndex = 0;
    public $currentQuestion;
    public $currentAnswer;
    public $isOpen = false;

    public function mount()
    {
        $this->currentQuestion = $this->soal[$this->currentIndex];
        $this->currentAnswer = $this->detailjawaban[$this->currentIndex];
    }

    public function nextQuestion()
    {
        if ($this->currentIndex < count($this->soal) - 1) {
            $this->currentIndex++;
            $this->currentQuestion = $this->soal[$this->currentIndex];
            $this->currentAnswer = $this->detailjawaban[$this->currentIndex];
        }
    }

    public function previousQuestion()
    {
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
            $this->currentQuestion = $this->soal[$this->currentIndex];
            $this->currentAnswer = $this->detailjawaban[$this->currentIndex];
        }
    }

    public function simpanjawaban($jawaban)
    {
        DetailJawaban::where('soal_id', $this->currentQuestion->id)
            ->where('jawaban_id', $this->jawaban->id)
            ->update(['jawabanbenar' => $jawaban,]);
        sleep(0.8);
    }

    public function kunjungisoal($no)
    {
        $this->currentIndex = $no;
        $this->currentQuestion = $this->soal[$this->currentIndex];
        $this->currentAnswer = $this->detailjawaban[$this->currentIndex];
    }

    public function render()
    {
        return view('livewire.kuis-index');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function submit()
    {
        $this->jawaban->update(['status' => '0']);
        return redirect()->route('kuis-index')->with('success', 'Telah selesai mengerjakan kuis');
    }

}
