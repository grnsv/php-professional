<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @method string getUserIdentifier()
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements PasswordAuthenticatedUserInterface, UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function getId(): ?int
    {

        return $this->id;
    }

    public function getEmail(): ?string
    {

        return $this->email;
    }

    public function setEmail(string $email): self
    {

        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {

        return $this->password;
    }

    public function setPassword(string $password): self
    {

        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {

        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {

        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {

        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {

        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored in a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return string[] The user roles
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        return ['ROLE_USER'];
    }

    /**
     * Returns the salt that was originally used to hash the password.
     *
     * This can return null if the password was not hashed using a salt.
     *
     * This method is deprecated since Symfony 5.3, implement it from {@link LegacyPasswordAuthenticatedUserInterface} instead.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return string
     *
     * @deprecated since Symfony 5.3, use getUserIdentifier() instead
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
        return $this->email;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    public function isVerified(): bool
    {

        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {

        $this->isVerified = $isVerified;

        return $this;
    }
}
