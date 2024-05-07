<?php declare(strict_types=1);

namespace App\Request;

use App\Trait\StringFormatter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractJsonRequest
{
    use StringFormatter;

    public function __construct(
        protected ValidatorInterface $validator,
        protected RequestStack $requestStack,
    ) {
        $this->populate();
        $this->validate();
    }

    public function getRequest(): Request
    {
        return $this->requestStack->getCurrentRequest();
    }

    protected function populate(): void
    {
        $request = $this->getRequest();
        $reflection = new \ReflectionClass($this);

        foreach ($request->toArray() as $property => $value) {
            $attribute = $this->camelCase($property);
            if (property_exists($this, $attribute)) {
                $reflectionProperty = $reflection->getProperty($attribute);
                $reflectionProperty->setValue($this, $value);
            }
        }
    }

    protected function validate(): void
    {
        $violations = $this->validator->validate($this);
        if (1 > count($violations)) {
            return;
        }

        $errors = [];
        /** @var \Symfony\Component\Validator\ConstraintViolation */
        foreach ($violations as $violation) {
            $attribute = $this->snakeCase($violation->getPropertyPath());
            $errors[] = [
                'property' => $attribute,
                'value' => $violation->getInvalidValue(),
                'message' => $violation->getMessage(),
            ];
        }

        $response = new JsonResponse([
            'success' => false,
            'message' => 'An error(s) occured while processing request',
            'errors' => $errors
        ], 400);

        $response->send();

        exit;
    }
}