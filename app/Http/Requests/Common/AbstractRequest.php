<?php

namespace App\Http\Requests\Common;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

/**
 * Class AbstractRequest
*/
abstract class AbstractRequest
{
    use ProvidesConvenienceMethods;

    private array $validatedData;

    /**
     * @param Request $request
     * @throws ValidationException
     */
    public function __construct(Request $request)
    {
        $this->validatedData = $this->validate($request, $this->getRules());
    }

    /**
     * @param string|null $attribute
     * @return array|string|null
     */
    public function getValidatedData(?string $attribute = null): array|string|null
    {
        return $attribute ? ($this->validatedData[$attribute] ?? null) : $this->validatedData;
    }

    /**
     * @return array
     */
    abstract protected function getRules(): array;
}
