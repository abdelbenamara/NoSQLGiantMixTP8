<?php

class Client
{
    /**
     * @var string
     */
    private string $idClient;

    /**
     * @var string
     */
    private string $nom;


    /**
     * @var string
     */
    private string $prenom;


    /**
     * @var string
     */
    private string $password;

    /**
     * @var string
     */
    private string $mail;


    /**
     * @return string
     */
    public function getIdClient(): string
    {
        return $this->idClient;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $username
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

}
