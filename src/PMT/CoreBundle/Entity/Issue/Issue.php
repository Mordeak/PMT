<?php
/**
 * This file is part of the PMT package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMT\CoreBundle\Entity\Issue;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use PMT\CoreBundle\Entity\Project\Project;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="issues")
 * @ORM\Entity(repositoryClass="PMT\CoreBundle\Entity\Issue\IssueRepository")
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class Issue
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
	private $summary;

	private $creator;

	private $assignee;

	/**
	 * @ORM\ManyToOne(targetEntity="PMT\CoreBundle\Entity\Issue\Type")
	 * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
	 *
	 * @var Type
	 */
	private $type;

	/**
	 * @ORM\ManyToOne(targetEntity="PMT\CoreBundle\Entity\Project\Project", inversedBy="issues")
	 * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
	 *
	 * @var Project
	 */
	private $project;

	private $priority;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 *
	 * @var string
	 */
	private $description;

	/**
	 * @ORM\ManyToMany(targetEntity="PMT\CoreBundle\Entity\Tag")
	 * @ORM\JoinTable(name="issue_tags",
	 *   joinColumns={@ORM\JoinColumn(name="issue_id", referencedColumnName="id")},
	 *   inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
	 * )
	 *
	 * @var ArrayCollection
	 */
	private $tags;

	public function __construct()
	{
		$this->tags = new ArrayCollection();
	}

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
	 * @param mixed $priority
	 */
	public function setPriority($priority)
	{
		$this->priority = $priority;
	}

	/**
	 * @return mixed
	 */
	public function getPriority()
	{
		return $this->priority;
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

	/**
	 * @param mixed $tags
	 */
	public function setTags($tags)
	{
		$this->tags = $tags;
	}

	/**
	 * @return mixed
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param \PMT\CoreBundle\Entity\Project\Project $project
	 */
	public function setProject($project)
	{
		$this->project = $project;
	}

	/**
	 * @return \PMT\CoreBundle\Entity\Project\Project
	 */
	public function getProject()
	{
		return $this->project;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->summary;
	}
}
