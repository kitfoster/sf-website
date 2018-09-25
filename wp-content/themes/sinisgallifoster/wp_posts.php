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

  class Service {
    public $title;
    public $description;

    public function __construct($title, $description) {
      $this->title = $title;
      $this->description = $description;
    }
  }

  function newService() {
    $title = get_field("service_title");
    $description = get_field("service_description");

    $service = new Service($title, $description);
    return $service;
  }

  class Contact {
    public $businessEmail;
    public $phone;
    public $addressLine1;
    public $addressLine2;
    public $enquiriesText;

    public function __construct($businessEmail, $phone, $addressLine1, $addressLine2, $enquiriesText) {
      $this->businessEmail = $businessEmail;
      $this->phone = $phone;
      $this->addressLine1 = $addressLine1;
      $this->addressLine2 = $addressLine2;
      $this->enquiriesText = $enquiriesText;
    }
  }

  function newContact() {
    $businessEmail = get_field("business_enquiry_email");
    $phone = get_field("phone");
    $addressLine1 = get_field("address_line_1");
    $addressLine2 = get_field("address_line_2");
    $enquiriesText = get_field("enquiries_text");

    $contact = new Contact($businessEmail, $phone, $addressLine1, $addressLine2, $enquiriesText);
    return $contact;
  }

  // The variables
  $team = array();
  $services = array();
  $homepageParagraph;
  $homepageImage;
  $statementText;
  $contact;

  $args = array(
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1,
  );
  $wp_query = new WP_Query($args);

  while ( $wp_query->have_posts() ) :
    $wp_query->the_post();

    foreach((get_the_category()) as $category) {
      if ($category->name == "Employee") {
        $employee = newEmployee();
        array_push($team, $employee);
      }
      elseif ($category->name == "Service") {
        $service = newService();
        array_push($services, $service);
      }
      elseif ($category->name == "Homepage") {
        $homepageParagraph = get_field("homepage_text");
        $homepageImage = get_field("homepage_image");
      }
      elseif ($category->name == "Statement") {
        $statementText = get_field("statement_text");
      }
      elseif ($category->name == "Contact") {
        $contact = newContact();
      }
    }
  endwhile;
?>