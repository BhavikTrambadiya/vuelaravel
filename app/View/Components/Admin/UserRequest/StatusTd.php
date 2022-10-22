<?php

namespace App\View\Components\Admin\UserRequest;

use App\Enums\UserRequestStatusEnum;
use App\Models\UserRequest;
use Illuminate\View\Component;

class StatusTd extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public UserRequest $req;
    public function __construct(UserRequest $req)
    {
        $this->req = $req;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.user-request.status-td');
    }
}
