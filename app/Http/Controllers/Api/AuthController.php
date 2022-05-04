<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{RecoveryPasswordRequest, SignInRequest};
use App\Repositories\interfaces\UserRepositoryInterface;
use Exception;
use Illuminate\Auth\Passwords\PasswordBrokerManager;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param SignInRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function signIn(SignInRequest $request): JsonResponse
    {
        if ($token = Auth::attempt($request->getValidatedData())) {
            return $this->respondWithToken($token);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    private function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }

    /**
     * @param RecoveryPasswordRequest $request
     * @return JsonResponse
     */
    public function recoverPassword(RecoveryPasswordRequest $request): JsonResponse
    {
        $user = $this->userRepository->getUserByEmail($request->getValidatedData('email'));

        if ($user) {
            $this->broker()->sendResetLink(['email' => $user->email]);
        }

        return response()->json(['message' => 'We have sent you an email']);
    }

    /**
     * @return \Illuminate\Auth\Passwords\PasswordBroker|PasswordBroker
     */
    private function broker(): PasswordBroker|\Illuminate\Auth\Passwords\PasswordBroker
    {
        $passwordBrokerManager = new PasswordBrokerManager(app());
        return $passwordBrokerManager->broker();
    }

    public function passwordReset()
    {
        // TODO Need to add reset password action
    }

    /**
     * @return JsonResponse
     */
    public function signOut(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
