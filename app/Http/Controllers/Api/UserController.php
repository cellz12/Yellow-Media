<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Services\interfaces\UserServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 */
class UserController extends Controller
{
    private UserServiceInterface $userService;

    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param UserStoreRequest $request
     * @return JsonResponse
     */
    public function store(UserStoreRequest $request): JsonResponse
    {
        return response()->json($this->userService->create($request->getValidatedData()), 201);
    }
}
