<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TransactionTypeEnum;
use App\Enums\UserRequestStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\UserRequest;
use App\Services\TransactionServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestAdminController extends Controller
{
    public function index(): View
    {
        $userrequests = UserRequest::with(['user'])->paginate();
        return view('admin.userrequest.index', compact('userrequests'));
    }

    public function approval(UserRequest $userrequest): RedirectResponse
    {
        $userrequest->load('user');
        $userrequest->admin_id = Auth::id();
        $userrequest->approvedate = now();
        $userrequest->status = UserRequestStatusEnum::Approve;
        $userrequest->save();

        $user = $userrequest->user;
        $user->decrement('point', $userrequest->points);

        $admin = Admin::find(Auth::id());

        (new TransactionServices())->credited($user, $userrequest->points, TransactionTypeEnum::RequestApproved, $userrequest, $admin);

        return redirect(route('userrequests.index'))->with('status', 'User Request approve successfully.');
    }
}
