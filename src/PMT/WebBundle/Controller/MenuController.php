<?php

namespace PMT\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MenuController extends Controller
{
	/**
	 * @Template()
	 */
	public function primaryAction()
    {
	    $projects = $this->getDoctrine()
		    ->getRepository('PMT\CoreBundle\Entity\Project\Project')
		    ->findAllForUser();

        return array(
	        'projects' => $projects,
        );
    }
}
