<?php
  class Person {
    public $name;
    public $role;
    public $photo;
    public $accreditations;
    public $bio;
    public $contact_number;
    public $email;
    public $linked_in;

    public function __construct($name, $role, $photo, $accreditations, $bio, $contact_number, $email, $linked_in) {
      $this->name = $name;
      $this->role = $role;
      $this->photo = $photo;
      $this->accreditations = $accreditations;
      $this->bio = $bio;
      $this->contact_number = $contact_number;
      $this->email = $email;
      $this->linked_in = $linked_in;
    }
  }

  // The variables
  $team = array();
  $homepageParagraph;
  $homepageImage;
  $statementText;

  function newEmployee() {
    $name = get_field("name");
    $role = get_field("role");
    $photo = get_field("photo");
    $accreditations = get_field("accreditations");
    $bio = get_field("bio");
    $contact_number = get_field("contact_number");
    $email = get_field("email");
    $linked_in = get_field("linked_in");

    $employee = new Person($name, $role, $photo, $accreditations, $bio, $contact_number, $email, $linked_in);
    return $employee;
  }

  while ( have_posts() ) :
    the_post();

    foreach((get_the_category()) as $category) {
      if ($category->name == "Employee") {
        $employee = newEmployee();
        array_push($team, $employee);
      }
      elseif ($category->name == "Homepage") {
        $homepageParagraph = get_field("homepage_text");
        $homepageImage = get_field("homepage_image");
      }
      elseif ($category->name == "Statement") {
        $statementText = get_field("statement_text");
      }
    }
  endwhile;
?>