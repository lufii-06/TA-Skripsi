<div>
    <div class="row bg-secondary p-4 px-5 rounded mt-4">
        <div class="ms-2">
            <h4>Kerjakan Kuis</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-4">
            @if ($currentQuestion)
                @if ($kuis->type == 'CHOKAI')
                    <div class="d-flex">
                        <audio controls src="{{ asset('storage/' . $currentQuestion->soal) }}" class="w-100 mb-2"></audio>
                    </div>
                @else
                    <h3 class="mb-3 text-center">{{ $currentQuestion->soal }}</h3>
                @endif
                <div wire:poll.750ms>
                    <a href="#" wire:loading.class="disabled"
                        class="btn {{ $tampiljawaban[0] == $detailjawaban[$currentIndex]->jawabanbenar ? 'btn-primary' : 'btn-success' }} w-100 text-center mb-2"
                        wire:click="simpanjawaban('{{ $tampiljawaban[0] }}')">{{ $tampiljawaban[0] }}</a>
                    <a href="#" wire:loading.class="disabled"
                        class="btn {{ $tampiljawaban[1] == $detailjawaban[$currentIndex]->jawabanbenar ? 'btn-primary' : 'btn-success' }} w-100 text-center mb-2"
                        wire:click="simpanjawaban('{{ $tampiljawaban[1] }}')">{{ $tampiljawaban[1] }}</a>
                    <a href="#" wire:loading.class="disabled"
                        class="btn {{$tampiljawaban[2] == $detailjawaban[$currentIndex]->jawabanbenar ? 'btn-primary' : 'btn-success' }} w-100 text-center mb-2"
                        wire:click="simpanjawaban('{{ $tampiljawaban[2] }}')">{{ $tampiljawaban[2] }}</a>
                    <a href="#" wire:loading.class="disabled"
                        class="btn {{ $tampiljawaban[3] == $detailjawaban[$currentIndex]->jawabanbenar ? 'btn-primary' : 'btn-success' }} w-100 text-center mb-2"
                        wire:click="simpanjawaban('{{ $tampiljawaban[3] }}')">{{ $tampiljawaban[3] }}</a>
                </div>
                <div class="d-flex mt-1">
                    <button class="btn btn-primary me-3" wire:click="previousQuestion"
                        @if ($currentIndex === 0) disabled @endif>{{ '< Sebelumnya' }}</button>
                    <button class="btn btn-primary" wire:click="nextQuestion"
                        @if ($currentIndex === count($soal) - 1) disabled @endif>{{ 'Berikutnya >' }}</button>
                </div>
            @else
                <p>No questions available.</p>
            @endif
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
            <h4 class="d-flex justify-content-between">Daftar Soal
                <a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Jika anda keluar dari website jawaban anda tetap tersimpan. 
Submit jika merasa sudah menjawab semua soal dengan benar dan anda tidak bisa mengerjakan kuis ini lagi">
                    <span class="badge bg-primary px-2 py-1 rounded-pill" style="cursor: pointer;">!</span>
                </a>
            </h4>
            <div class="mb-3" wire:poll.750ms>
                @foreach ($detailjawaban as $index => $item)
                    <a href="#" wire:click="kunjungisoal('{{ $index }}')"
                        class="badge  {{ $item->jawabanbenar ? 'btn-primary' : 'btn-success' }} {{ $currentIndex == $index ? 'btn-dark' : '' }}">{{ $index + 1 }}</a>
                @endforeach
            </div>
            <button class="btn btn-primary w-100 my-auto" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Submit</button>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dark">
            <div class="modal-content bg-secondary">
                <form wire:submit.prevent="submit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Submit Jawaban</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-2">
                            Pastikan telah menjawab semua pertanyaan dengan benar
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
