<?php
/**
 * This file is part of the PMT package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMT\CoreBundle\Entity\Project;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;

/**
 * @ORM\Entity
 * @ORM\Table(name="projects", uniqueConstraints={@ORM\UniqueConstraint(name="code_idx", columns={"code"})})
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class Project
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 *
	 * @var int
	 */
	private $id;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank()
	 *
	 * @var string
	 */
	private $name;

	/**
	 * @ORM\Column(type="string")
	 * @Assert\NotBlank()
	 * @var string
	 */
	private $code;


	private $creator;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 *
	 * @var string
	 */
	private $description;

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $creator
	 */
	public function setCreator($creator)
	{
		$this->creator = $creator;
	}

	/**
	 * @return mixed
	 */
	public function getCreator()
	{
		return $this->creator;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $summary
	 */
	public function setSummary($summary)
	{
		$this->summary = $summary;
	}

	/**
	 * @return string
	 */
	public function getSummary()
	{
		return $this->summary;
	}
}