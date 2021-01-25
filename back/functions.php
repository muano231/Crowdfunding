<?php
class Utilisateur
{
  private $_id;
  private $_nom;
  private $_forcePerso;
  private $_degats;
  private $_niveau;
  private $_experience;

  public function hydrate(array $donnees)
  {
 
  }

  public function id() { return $this->_id; }
  public function nom() { return $this->_nom; }
  public function forcePerso() { return $this->_forcePerso; }
  public function degats() { return $this->_degats; }
  public function niveau() { return $this->_niveau; }
  public function experience() { return $this->_experience; }

  public function setId($id)
  {
    $this->_id = (int) $id;
  }
        
  public function setNom($nom)
  {
    if (is_string($nom) && strlen($nom) <= 30)
    {
      $this->_nom = $nom;
    }
  }

  public function setForcePerso($forcePerso)
  {
    $forcePerso = (int) $forcePerso;
            
    if ($forcePerso >= 0 && $forcePerso <= 100)
    {
      $this->_forcePerso = $forcePerso;
    }
  }

  public function setDegats($degats)
  {
    $degats = (int) $degats;

    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;

    if ($niveau >= 0)
    {
      $this->_niveau = $niveau;
    }
  }

  public function setExperience($exp)
  {
    $exp = (int) $exp;

    if ($exp >= 0 && $exp <= 100)
    {
      $this->_experience = $exp;
    }
  }
}


//
class UtilisateurInteractions
{
  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function ajouter(Utilisateur $perso)
  {
    $q = $this->_db->prepare('INSERT INTO utilisateur(nom, prenom, login, mot_de_passe, email, date_inscription, solde)
        VALUES(:nom, :prenom, :login, :mot_de_passe, :email, :date_inscription, :solde)');

    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':prenom', $perso->nom());
    $q->bindValue(':login', $perso->nom());
    $q->bindValue(':mot_de_passe', $perso->nom());
    $q->bindValue(':email', $perso->nom());
    $q->bindValue(':date_inscription', $perso->nom());
    $q->bindValue(':solde', $perso->nom());

    $q->execute();
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Utilisateur($donnees);
  }

  public function getList()
  {
    $persos = [];

    $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $persos[] = new Utilisateur($donnees);
    }

    return $persos;
  }

  public function update(Utilisateur $perso)
  {
    $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}