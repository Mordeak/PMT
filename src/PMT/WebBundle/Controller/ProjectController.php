<?php

namespace PMT\WebBundle\Controller;

use PMT\CoreBundle\Entity\Project\Project;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
	public function newAction($code)
	{
		$project = new Project();

		$form = $this->createFormBuilder($project)
			->add('name', 'text', array(
				'attr' => array('class' => 'input-xxlarge')
			))
			->add('code', 'text')
			->add('description', 'textarea')
			->getForm();

		return array(
			'form' => $form->createView(),
			'project' => $project
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
