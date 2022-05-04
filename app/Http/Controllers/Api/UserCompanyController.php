<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Repositories\interfaces\CompanyRepositoryInterface;
use App\Services\interfaces\CompanyServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserCompanyController
 */
class UserCompanyController extends Controller
{
    private CompanyRepositoryInterface $companyRepository;
    private CompanyServiceInterface $companyService;

    /**
     * @param CompanyRepositoryInterface $companyRepository
     * @param CompanyServiceInterface $companyService
     */
    public function __construct(CompanyRepositoryInterface $companyRepository, CompanyServiceInterface $companyService)
    {
        $this->companyRepository = $companyRepository;
        $this->companyService = $companyService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->companyRepository->getAllByUserId(Auth::id(), ['title', 'description', 'phone']));
    }

    /**
     * @param CompanyStoreRequest $request
     * @return JsonResponse
     */
    public function store(CompanyStoreRequest $request): JsonResponse
    {
        return response()->json($this->companyService->create($request->getValidatedData(), Auth::id()), 201);
    }
}
