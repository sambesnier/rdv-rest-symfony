<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Place;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PlaceController extends Controller
{
    /**
     * @Rest\Get(
     *     "/places"
     * )
     * @Rest\View()
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->getDoctrine()->getRepository('AppBundle:Address')->findAll();

        return $places;
    }

    /**
     * @Route(
     *     "/new-place",
     *     name="new_place"
     * )
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postAction(Request $request)
    {
        return new JsonResponse([$request->get('test')]);
    }

}
