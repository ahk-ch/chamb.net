<?php

namespace App\Http\Controllers\Ahk;

use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\User\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ahk\StoreUserRequest;

/**
 * Class UsersController.
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest', ['except' => 'getLogout']);

        $this->userRepository = $userRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $userStored = $this->userRepository->store($request->all());

        if (! $userStored) {
            Flash::error(trans('ahk_messages.unable_to_store_user'));

            return redirect()->back();
        }

        Flash::success(trans('ahk_messages.user_created'));

        return redirect()->route('home_path');
    }
}
