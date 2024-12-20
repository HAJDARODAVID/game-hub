<div class="row">
    <div class="col-md align-content-center">
        <div class="d-flex justify-content-center flex-wrap gap-2 ">
            @for ($i=1; $i<10; $i++)
                <x-game-controller.mvt-btn type=1 wireClick='method-test.params-key:test,kex2:jbt' />
            @endfor
        </div>
    </div>
</div>
