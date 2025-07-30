<div class="">
    <a class="btn btn-dark btn-sm d-flex" href="{{ route('myInvites') }}">
        <i class="bi bi-list-task"></i>
        <div class="" @if(AppConfig::gameInviteAutoRefreshTime()) wire:poll.{{AppConfig::gameInviteAutoRefreshTime()}}s='getMyInvites' @endif>
            @if ($invitesCount > 0)
                <span class="badge text-danger">{{ $invitesCount }}</span>
            @endif
        </div>
    </a>
</div>
