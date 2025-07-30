<div>
    <footer class="footer fixed-bottom bg-black py-2">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="text-white align-content-center">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="d-flex gap-1">
                        @if (AppConfig::messengerModule()) @livewire('messenger.messenger-btn') @endif
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