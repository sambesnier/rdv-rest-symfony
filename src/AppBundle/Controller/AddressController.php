<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Form\AddressType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * @Rest\Get(
     *     "/address"
     * )
     * @Rest\View()
     */
    public function getAddressAction(Request $request)
    {
        $places = $this->getDoctrine()->getRepository('AppBundle:Address')->findAll();

        return $places;
    }

    /**
     *
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     *
     * @Rest\Post(
     *     "/address"
     * )
     *
     * @param Request $request
     * @return Address|\Symfony\Component\Form\Form|JsonResponse
     */
    public function postAddressAction(Request $request)
    {
        $address = new Address();

        $form = $this->createForm(AddressType::class, $address);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($address);
            $em->flush();
            return $address;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     *
     * @Rest\Delete(
     *     "/address/{id}"
     * )
     *
     * @param Request $request
     */
    public function removeAddressAction(Request $request)
    {
        $address = $this->getDoctrine()
                        ->getRepository("AppBundle:Address")
                        ->find($request->get('id'));

        $em = $this->getDoctrine()->getManager();
        if ($address) {
            $em->remove($address);
            $em->flush();
        }
    }

}
