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
    public $enquiryText;

    public function __construct($businessEmail, $phone, $addressLine1, $addressLine2, $enquiryText) {
      $this->businessEmail = $businessEmail;
      $this->phone = $phone;
      $this->addressLine1 = $addressLine1;
      $this->addressLine2 = $addressLine2;
      $this->enquiryText = $enquiryText;
    }
  }

  function newContact() {
    $businessEmail = get_field("business_enquiry_email");
    $phone = get_field("phone");
    $addressLine1 = get_field("address_line_1");
    $addressLine2 = get_field("address_line_2");
    $enquiryText = get_field("enquiry_text");

    $contact = new Contact($businessEmail, $phone, $addressLine1, $addressLine2, $enquiryText);
    return $contact;
  }

  class SafeCustody {
    public $text;

    public function __construct($text) {
      $this->text = $text;
    }
  }

  function newSafeCustody() {
    $text = get_field("safe_custody_text");

    $safeCustody = new SafeCustody($text);
    return $safeCustody;
  }

  class NewsArticle {
    public $title;
    public $date;
    public $service;
    public $blurb;
    public $link;
    public $image;

    public function __construct($title, $date, $service, $blurb, $link, $image) {
      $this->title = $title;
      $this->date = $date;
      $this->service = $service;
      $this->blurb = $blurb;
      $this->link = $link;
      $this->image = $image;
    }
  }

  function newNewsArticle() {
    $title = get_field("news_article_title");
    $date = get_field("news_article_date");
    $service = get_field("news_article_service");
    $blurb = get_field("news_article_blurb");
    $link = get_field("news_article_link");
    $image = get_field("news_article_image");

    $newsArticle = new NewsArticle($title, $date, $service, $blurb, $link, $image);
    return $newsArticle;
  }

  class EmailSMPT {
    public $host;
    public $username;
    public $password;
    public $from;

    public function __construct($host, $username, $password, $from) {
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->from = $from;
    }
  }

  function newEmailSMPT() {
    $host = get_field("email_smpt_host");
    $username = get_field("email_smpt_username");
    $password = get_field("email_smpt_password");
    $from = get_field("email_smpt_from");

    $emailSMPT = new EmailSMPT($host, $username, $password, $from);
    return $emailSMPT;
  }

  // The variables
  $team = array();
  $services = array();
  $newsArticles = array();
  $homepageParagraph;
  $homepageImage;
  $statementText;
  $contact;
  $safeCustody;
  $pageForEmployee;
  $email_smpt;

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
      elseif ($category->name == "Safe Custody") {
        $safeCustody = newSafeCustody();
      }
      elseif ($category->name == "News Article") {
        $newsArticle = newNewsArticle();
        if (array_key_exists($newsArticle->service, $newsArticles)) {
          array_push($newsArticles[$newsArticle->service], $newsArticle);
        } else {
          $newsArticles[$newsArticle->service] = array($newsArticle);
        }
      }
      elseif ($category->name == "Email SMPT") {
        $email_smpt = newEmailSMPT();
      }
    }
  endwhile;

  // Sort articles
  foreach($newsArticles as $key=>$articlesForService) {
    usort($articlesForService, function ($a, $b) {
      return strtotime($b->date) - strtotime($a->date);
    });
    $newsArticles[$key] = $articlesForService;
  }

  $page = preg_replace("/[^a-zA-Z0-9]/", "", $_SERVER['REQUEST_URI']);
  foreach($team as $employee) {
    $employeePage = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $employee->name));
    if (strcmp($page, $employeePage) === 0) {
      $pageForEmployee = $employee;
    }
  };
?>
