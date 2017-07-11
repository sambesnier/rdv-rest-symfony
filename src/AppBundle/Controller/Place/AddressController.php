<?php

namespace AppBundle\Controller\Place;

use AppBundle\Entity\Address;
use AppBundle\Form\AddressType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * @Rest\Get(
     *     "/places/{id}/address"
     * )
     * @Rest\View(serializerGroups={"address"})
     * @param Request $request
     * @return Address[]|array
     */
    public function getAddressAction(Request $request)
    {
        $place = $this->getDoctrine()
            ->getRepository('AppBundle:Place')
            ->find($request->get('id'));

        if (empty($place)) {
            return $this->placeNotFound();
        }

        return $place->getAddress();
    }

    /**
     * @Rest\Post(
     *     "/places/{id}/address"
     * )
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @param Request $request
     * @return \Symfony\Component\Form\Form|static
     */
    public function postAddressAction(Request $request)
    {
        $place = $this->getDoctrine()
            ->getRepository('AppBundle:Place')
            ->find($request->get('id'));

        if (empty($place)) {
            return $this->placeNotFound();
        }

        $address = new Address();
        $form = $this->createForm(
            AddressType::class,
            $address
        );

        $address->addPlace($place);

        $place->setAddress($address);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();
        } else {
            return $form;
        }
    }

    private function placeNotFound()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
    }
}
