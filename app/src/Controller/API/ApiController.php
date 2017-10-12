<?php

namespace App\Controller\API;


use App\Controller\BaseControllerTrait;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends FOSRestController
{
    use BaseControllerTrait;

    /**
     * Creates a view.
     *
     * Convenience method to allow for a fluent interface.
     *
     * @param mixed  $data
     * @param string $template
     * @param int    $statusCode
     * @param array  $headers
     *
     * @return Response
     */
    protected function handleData($data = null, string $template = null, $statusCode = null, array $headers = []): Response
    {
        $view = View::create($data, $statusCode, $headers);

        if ($template !== null) {
            $view->setTemplate($template);
        }

        return $this->handleView($view);
    }
}