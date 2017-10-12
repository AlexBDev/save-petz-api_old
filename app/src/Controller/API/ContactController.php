<?php

namespace App\Controller\API;


use App\Entity\Contact;
use FOS\RestBundle\Routing\ClassResourceInterface;

class ContactController extends ApiController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $data = $this->getDoctrine()->getManager()->getRepository(Contact::class)->findAll();

        return $this->handleData($data);
    }
}