<?php

namespace Application\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Application\MainBundle\Form\ContinentType;
use Application\MainBundle\Form\CountryType;

class IndexController extends Controller {

    /**
     * Renders the index page and handles the form submission
     * 
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request) {

        // Handle the form
        $form = $this->createForm(new ContinentType());
        $form->handleRequest($request);

        // Handle the submission
        if ($form->isValid()) {

            // Get the parameters array from the request
            $result = $request->request->all()[$form->getName()];

            // Find the continent
            $continent = $this->getDoctrine()
                    ->getRepository('ApplicationMainBundle:Continent')
                    ->find($result['continent']);

            if (isset($result['country'])) {
                // Find the country
                $country = $this->getDoctrine()
                        ->getRepository('ApplicationMainBundle:Country')
                        ->find($result['country']);
            } else {
                $country = null;
            }

            return $this->render('ApplicationMainBundle:Index:result.html.twig', ['continent' => $continent, 'country' => $country]);
        }

        return $this->render('ApplicationMainBundle:Index:index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * Renders Country dropdown based on the continent id
     * 
     * @param Request $request
     * @return Response
     */
    public function getCountriesAction(Request $request) {
        // Get the continent id from the request
        $continent_id = $request->request->all()[$request->request->keys()[0]]['continent'];

        // Render the form
        $form = $this->createForm(new CountryType($continent_id));
        $form->handleRequest($request);

        return $this->render('ApplicationMainBundle:Index:countries.html.twig', ['form' => $form->createView()]);
    }

}
