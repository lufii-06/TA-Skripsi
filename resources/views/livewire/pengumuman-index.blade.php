<div>
    <div class="px-4 mt-5">
        <h4 class="bg-secondary p-4 m-0">Papan Pengumuman</h4>
        <div class="bg-secondary overflow-auto pengumuman" style="max-height: 60vh">
            <div class="chat-container fw-bold pe-4 px-4">
                <div class="d-flex justify-content-end">
                    <div class="chat-message w-100">
                        @forelse ($pesan as $index => $item)
                            @if ($item->user_id == $user->id)
                                <div style="text-align: right">
                                    <p class="text-primary">
                                        @if ($user->status == '4')
                                            <a wire:click.prevent="deletepesan({{ $item->id }})" class="me-2"><i
                                                    class="fa fa-trash">&nbsp;Hapus</i></a>
                                        @endif
                                        Me
                                    </p>
                                    <a {{ $item->info ? "href=".route('pesan-detail',$item->info)."" : '' }} class="{{ $item->info ? 'text-primary' : 'text-white' }}">
                                        <small class="me-2 text-success">
                                            @php
                                                $createdAt = \Carbon\Carbon::parse($item->created_at);
                                                \Carbon\Carbon::setLocale('id');
                                                $diff = $createdAt->diffForHumans();
                                                echo $diff;
                                            @endphp
                                        </small>
                                        {{ $item->pesan }}
                                    </a>
                                </div>
                            @else
                                <p class="text-primary">{{ ucfirst(explode(' ', $item->user->name)[0]) }}
                                    @if ($user->status == '4')
                                        <a wire:click.prevent="deletepesan({{ $item->id }})" class="ms-2"><i
                                                class="fa fa-trash">&nbsp;Hapus</i></a>
                                    @endif
                                </p>
                                <a {{ $item->info ? "href=".route('pesan-detail',$item->info)."" : '' }}  class="text-white">
                                    {{ $item->pesan }}
                                    <small class="ms-2 text-success">
                                        @php
                                            $createdAt = \Carbon\Carbon::parse($item->created_at);
                                            \Carbon\Carbon::setLocale('id');
                                            $diff = $createdAt->diffForHumans();
                                            echo $diff;
                                        @endphp
                                    </small>
                                </a>
                            @endif
                        @empty
                            <p class="text-muted">Admin atau Sensei Belum Mengumumkan Apapun</p>
                        @endforelse
                    </div>
                </div>
                @if ($user->status == '4' or $user->status == '3')
                    <form wire:submit.prevent="simpan">
                        @csrf
                        <div class="p-4 container d-flex">
                            <input type="text" class="form-control me-3" placeholder="Buat Pengumuman"
                                wire:model='pengumuman'>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <script>
            function scrollToBottom() {
                var container = document.querySelector('.pengumuman');
                container.scrollTop = container.scrollHeight;
            }
            window.onload = function() {
                scrollToBottom();
            };
        </script>
    </div>
