<?php

namespace App\Controller\API;


use App\Entity\Pet\Pet;
use App\Form\Pet\PetType as FormPetType;
use App\Model\ApiQuery;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

class PetController extends ApiController implements ClassResourceInterface
{
    /**
     * @Get("/pets")
     */
    public function cgetAction(ApiQuery $apiQuery)
    {
        $data = $this->getElasticaRepository(Pet::class)->search($apiQuery);

        return $this->handleData($data);
    }

    /**
     * @Get("/pets/form")
     */
    public function getAction()
    {
        return $this->render('@front/form/pets.html.twig', [
            'form' => $this->createForm(FormPetType::class)->createView(),
        ]);
    }

    /**
     * @Get("/pets/{id}")
     */
    public function showAction(Pet $pet)
    {
        return $this->handleData($pet);
    }

    /**
     * @Security("is_fully_authenticated()")
     * @Post("/pets")
     */
    public function postAction(Request $request)
    {
        $pet = new Pet();
        $form = $this->createForm(FormPetType::class, $pet);

        $form->submit($request->request->all());

        if (!$form->isValid()) {
            $this->handleData($form->getErrors());
        }

        $em = $this->getDoctrine()->getManager();

        return $this->handleData($request->request->all());
        die;

        $em->persist($pet);
        $em->flush();

        return $this->handleData($pet);
    }


}