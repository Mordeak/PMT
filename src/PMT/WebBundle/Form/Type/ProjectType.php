<?php
/**
 * This file is part of the PMT package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMT\WebBundle\Form\Type;

use Doctrine\Common\Persistence\ObjectManager;
use PMT\CoreBundle\Form\DataTransformer\TagsTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectType extends AbstractType
{
	protected $om;

	/**
	 * @param ObjectManager $om
	 */
	public function __construct(ObjectManager $om)
	{
		$this->om = $om;
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add(
				'managerId',
				'entity',
				array(
					'class' => 'PMT\CoreBundle\Entity\User',
					'property' => 'username',
					'empty_value' => 'Choose a project manager',
					'label' => 'Project Manager'
				)
			)
			->add('name', 'text')
			->add('code', 'text')
			->add('description', 'textarea');
	}

	public function getName()
	{
		return 'project';
	}
}