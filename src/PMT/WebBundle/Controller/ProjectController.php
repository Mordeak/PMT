<?php

namespace PMT\WebBundle\Controller;

use Doctrine\ORM\EntityRepository;
use PMT\CoreBundle\Entity\Project\Project;
use PMT\WebBundle\Form\Type\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
	/**
	 * @Template()
	 * @Route("/{code}/summary", name="project_summary")
	 */
	public function summaryAction($code)
    {
	    $project = $this->getProject($code);

        return array(
	        'project' => $project,
        );
    }

	/**
	 * @Template()
	 * @Route("/{code}/issues", name="project_issues")
	 */
	public function issuesAction($code)
	{
		$project = $this->getProject($code);

		return array(
			'project' => $project,
		);
	}

	/**
	 * @Template()
	 * @Route("/{code}/new", name="project_new")
	 */
	public function newAction(Request $request)
	{
		$project = new Project();

		$form = $this->createForm(new ProjectType($this->getDoctrine()->getManager()), $project);

		return array(
			'form' => $form->createView(),
		);
	}

	private function getProject($code)
	{
		$project = $this->getDoctrine()->getRepository('PMT\CoreBundle\Entity\Project\Project')
			->findByCode($code);

		if (!$project) {
			throw $this->createNotFoundException('Project could not be found.');
		}

		return $project;
	}
}
