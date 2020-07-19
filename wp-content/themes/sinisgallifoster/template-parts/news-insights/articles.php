<div class="news-articles-section" id="below-fold">
  <div class="news-articles">
    <?php foreach($newsArticles as $key=>$value): ?>
      <div class="news-article">
        <span class="news-article-service"><?php echo $value->service; ?></span>
        <div class="news-article-image" style="<?php echo 'background-image: url(' . $value->image . ')' ?>"></div>
        <div class="news-article-content">
          <h3 class="news-article-title"><?php echo $value->title; ?></h3>
          <h4 class="news-article-date"><?php echo $value->date; ?></h4>
          <span class="news-article-blurb"><?php echo $value->blurb; ?></span>
          <a class="news-article-link" href="<?php echo $value->link; ?>">Read article</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="subscribe-section">
    <h2 class="subscribe-heading">Get our newsletter</h2>
    <span class="subscribe-subheading">Stay up to date with the latest legal insights and news</span>
    <button class="subscribe-button" onClick="toggleSubscribeModal()">Sign up</button>
  </div>
</div>

<div class="subscribe-modal-wrapper" id="subscribe-modal">
  <div class="subscribe-modal">
    <div class="subscribe-modal-form-container">
      <h2 class="subscribe-modal-heading">Subscribe to our newsletter</h2>
      <form class="subscribe-modal-form" onSubmit="subscribeEmail(event)">
        <label for="name">Full name:</label>
        <input class="subscribe-modal-input" type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input class="subscribe-modal-input" type="email" id="email" name="email" required>
        <input class="subscribe-modal-button" type="submit" value="Subscribe">
      </form>
      <div class="subscription-status" id="subscription-status">
        <div class="subscription-status-sending">Subscribing, please don't navigate away from the page.</div>
        <div class="subscription-status-successful">Successfully subscribed!</div>
        <div class="subscription-status-error">Sorry you couldn't be subscribed right now. Please email info@sinisgallifoster.com.au to subscribe.</div>
      </div>
    </div>
    <button class="close-subscribe-modal" onclick="toggleSubscribeModal()"></button>
  </div>
</div>

<script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
  function toggleSubscribeModal() {
    var subscribe_modal = document.getElementById("subscribe-modal");
    if (subscribe_modal.className.includes("open")) {
      subscribe_modal.className = "subscribe-modal-wrapper";
    } else {
      subscribe_modal.className = "subscribe-modal-wrapper open";
    }
  }

  function subscribeEmail(event) {
    event.preventDefault();

    var subscribe_status = document.getElementById("subscription-status");
    subscribe_status.className = "subscription-status sending";

    var name = event.target[0].value;
    var email = event.target[1].value;

    var host = "<?php echo $email_smpt->host; ?>";
    var username = "<?php echo $email_smpt->username; ?>";
    var password = "<?php echo $email_smpt->password; ?>";
    var from = "<?php echo $email_smpt->from; ?>";

    Email.send({
      Host: host,
      Username: username,
      Password: password,
      To: 'katya.foster.96@gmail.com',
      From: from,
      Subject: "New Subscription",
      Body: name + " has subscribed, email: " + email
    }).then(
      function(message) {
        if (message === "OK") {
          subscribe_status.className = "subscription-status successful";
        } else {
          subscribe_status.className = "subscription-status error";
        }
      }
    );
  }
</script>
