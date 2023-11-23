<?php

namespace App\Entity\JobApplication;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ApiResource(operations: [new Post(uriTemplate: JobApplication::ENDPOINT), new Get(uriTemplate: JobApplication::ENDPOINT_ID), new GetCollection(uriTemplate: JobApplication::ENDPOINT_COLLECTION_NEW, paginationPartial: false, order: ['id', 'firstName'],), new GetCollection(uriTemplate: JobApplication::ENDPOINT_COLLECTION_OLD, paginationPartial: false, order: ['id', 'firstName'],),],)]
#[ApiFilter(OrderFilter::class, properties: ['id' => 'ASC', 'firstName' => 'DESC'])]
class JobApplication
{
    const ENDPOINT = 'job_application/';
    const ENDPOINT_ID = self::ENDPOINT . '{id}';
    const ENDPOINT_COLLECTION_NEW = self::ENDPOINT . 'collection/new';
    const ENDPOINT_COLLECTION_OLD = self::ENDPOINT . 'collection/old';


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ApiProperty(identifier: true)]
    #[Groups(['conference:list', 'conference:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    #[Assert\NotBlank]
    #[Assert\Length(min: 9, max: 15, minMessage: "Phone number must be at least {{ limit }} characters long", maxMessage: "Phone number cannot be longer than {{ limit }} characters")]
    #[Assert\Regex(pattern: "/^(\+\d{1,3})?\d{9,15}$/", message: "Invalid phone number format")]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    private ?string $position = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    private ?int $level = null;

    #[ORM\Column(length: 255)]
    #[Groups(['conference:list', 'conference:item'])]
    private ?int $expectedSalary = null;

    #[ORM\Column]
    #[Groups(['conference:list', 'conference:item'])]
    private ?bool $isNew = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address');
        }

        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        // Dodatkowa weryfikacja przy użyciu wyrażenia regularnego
        if (!preg_match("/^(\+\d{1,3})?\d{9,15}$/", $phone)) {
            throw new InvalidArgumentException("Invalid phone number format");
        }

        $this->phone = $phone;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getExpectedSalary(): int
    {
        return $this->expectedSalary;
    }

    public function setExpectedSalary(int $expectedSalary): void
    {
        $this->expectedSalary = $expectedSalary;
    }

    public function getIsNew(): int
    {
        return $this->isNew;
    }

    public function setIsNew(int $isNew): void
    {
        $this->isNew = $isNew;
    }

}