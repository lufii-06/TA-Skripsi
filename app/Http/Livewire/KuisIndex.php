<?php

namespace App\Http\Livewire;

use App\Models\Nilai;
use Livewire\Component;
use App\Models\DetailJawaban;

class KuisIndex extends Component
{
    public $detailjawaban;
    public $jawaban;
    public $user;
    public $soal;
    public $kuis;
    public $currentIndex = 0;
    public $currentQuestion;
    public $currentAnswer;
    public $isOpen = false;
    public $tampiljawaban;

    public function mount()
    {
        $this->currentQuestion = $this->soal[$this->currentIndex];
        $this->tampiljawaban = [
            $this->currentQuestion->jawabanbenar,
            $this->currentQuestion->jawabansatu,
            $this->currentQuestion->jawabandua,
            $this->currentQuestion->jawabantiga,
        ];
        shuffle($this->tampiljawaban);
        $this->currentAnswer = $this->detailjawaban[$this->currentIndex];
    }

    public function nextQuestion()
    {
        if ($this->currentIndex < count($this->soal) - 1) {
            $this->currentIndex++;
            $this->currentQuestion = $this->soal[$this->currentIndex];
            $this->tampiljawaban = [
                $this->currentQuestion->jawabanbenar,
                $this->currentQuestion->jawabansatu,
                $this->currentQuestion->jawabandua,
                $this->currentQuestion->jawabantiga,
            ];
            shuffle($this->tampiljawaban);
            $this->currentAnswer = $this->detailjawaban[$this->currentIndex];
        }
    }

    public function previousQuestion()
    {
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
            $this->currentQuestion = $this->soal[$this->currentIndex];
            $this->tampiljawaban = [
                $this->currentQuestion->jawabanbenar,
                $this->currentQuestion->jawabansatu,
                $this->currentQuestion->jawabandua,
                $this->currentQuestion->jawabantiga,
            ];
            shuffle($this->tampiljawaban);
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
        $this->tampiljawaban = [
            $this->currentQuestion->jawabanbenar,
            $this->currentQuestion->jawabansatu,
            $this->currentQuestion->jawabandua,
            $this->currentQuestion->jawabantiga,
        ];
        shuffle($this->tampiljawaban);
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
        $jmlbenar = 0;
        foreach ($this->soal as $index => $value) {
            if ($value->jawabanbenar == $this->detailjawaban[$index]->jawabanbenar) {
                $jmlbenar++;
            }
        }
        $nilai = ($jmlbenar / $this->kuis->jumlahsoal) * 100;
        Nilai::create([
            'user_id' => $this->user->id,
            'kuis_id' => $this->kuis->id,
            'nilai' => number_format($nilai,2)
        ]);
        return redirect()->route('kuis-index')->with('success', 'Telah selesai mengerjakan kuis');
    }

}
