<?php

namespace AppBundle\Controller\Place;

use AppBundle\Entity\Address;
use AppBundle\Entity\Place;
use AppBundle\Form\PlaceType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaceController extends Controller
{
    /**
     * @Rest\Get(
     *     "/places"
     * )
     * @Rest\View(serializerGroups={"place"})
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->getDoctrine()
            ->getRepository('AppBundle:Place')
            ->findAll();

        return $places;
    }

    /**
     *
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     *
     * @Rest\Post(
     *     "/places"
     * )
     *
     * @param Request $request
     * @return Address|\Symfony\Component\Form\Form
     */
    public function postPlacesAction(Request $request)
    {
        $place = new Place();

        $form = $this->createForm(PlaceType::class, $place);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($place);
            $em->flush();
            return $place;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT, serializerGroups={"place"})
     * @Rest\Delete("/places/{id}")
     * @param Request $request
     */
    public function removePlaceAction(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Place');
        $place = $repo->find($request->get('id'));

        if (!$place) {
            return;
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($place);
        $em->remove($place->getAddress());
        $em->flush();
    }

}
