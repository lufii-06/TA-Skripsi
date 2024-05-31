<?php

namespace App\Http\Livewire;

use App\Models\Pesan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PengumumanIndex extends Component
{
    public $user;
    public $pengumuman;

    public $pesan;


    public function mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        $this->pesan = Pesan::orderBy('created_at', 'asc')->with('user')->get();
        // dd($this->pesan);
        return view('livewire.pengumuman-index');
    }

    public function simpan()
    {
        Pesan::create([
            'user_id' => $this->user->id,
            'pesan' => $this->pengumuman
        ]);
        $this->pengumuman = '';
        $this->render();
    }
    public function deletepesan($id)
    {
        $pesan = Pesan::find($id);
        $pesan->delete();
        $this->render();
    }

}
