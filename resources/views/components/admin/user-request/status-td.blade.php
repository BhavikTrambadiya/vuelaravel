<div class="d-flex justify-content-start align-items-center">
    @enum('UserRequestStatusEnum', 'statustype')
    <span @class([
        'badge rounded-pill',
        'bg-secondary' => $req->status == $statustype::Pending,
        'bg-success' => $req->status == $statustype::Approve,
        'bg-light text-dark' =>
            $req->status != $statustype::Approve &&
            $req->status != $statustype::Pending,
    ])>{{ $req->status }}</span>
    @if ($req->status == $statustype::Pending && $req->user->point >= $req->points)
        <a href="{{ route('userrequests.approval', $req->id) }}" class="ms-2 btn btn-primary">Give Approval</a>
    @endif
</div>
