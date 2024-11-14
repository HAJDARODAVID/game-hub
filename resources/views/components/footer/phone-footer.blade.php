<div>
    <footer class="footer fixed-bottom bg-black py-2">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="text-white align-content-center">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="d-flex gap-1">
                        <button class="btn btn-dark btn-sm"><i class="bi bi-chat"></i><span class="badge text-danger">2</span></button>
                        @livewire('games.my-invites-btn')
                        @if (Auth::user()->game_inst)
                            <x-v-divider />
                            <a href="{{ route('gameLobby',['game_inst' => Auth::user()->game_inst]) }}" class="btn btn-dark btn-sm"><i class="bi bi-controller"></i></a>  
                        @endif
                    </div>
                </div>
            </div>
    </footer>
</div>