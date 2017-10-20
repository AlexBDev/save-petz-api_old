<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 20/10/17
 * Time: 10:58
 */

namespace App\ArgumentResolver;


use App\Model\ApiQuery;
use App\Resolver\ApiQueryResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class ApiQueryValueResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return ApiQuery::class === $argument->getType();
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield ApiQueryResolver::resolve($request);
    }
}