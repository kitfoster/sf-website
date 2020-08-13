<div class="news-articles-section" id="below-fold">
  <div class="news-articles">
    <?php $index=0; foreach($newsArticles as $key=>$service): ?>
      <h2 class="news-articles-service-title"><?php echo $key; ?></h2>
      <div class="glide" id="glide-<?php echo $index; ?>" >
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <?php foreach($service as $key=>$article): ?>
              <li class="news-article glide__slide">
                <a href="<?php echo $article->link; ?>" target=”_blank”>
                  <div class="news-article-image" style="<?php echo 'background-image: url(' . $article->image . ')' ?>"></div>
                  <h3 class="news-article-title"><?php echo $article->title; ?></h3>
                  <h4 class="news-article-date"><?php echo $article->date; ?></h4>
                  <span class="news-article-blurb"><?php echo $article->blurb; ?></span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
          <?php foreach($service as $key=>$article): ?>
            <button class="glide__bullet" data-glide-dir="=<?php echo $key; ?>"></button>
          <?php endforeach; ?>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
          <button class="slider__arrow slider__arrow--prev glide__arrow glide__arrow--prev" data-glide-dir="<" aria-label="previous"></button>
          <button class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next" data-glide-dir=">" aria-label="next"></button>
        </div>
      </div>
    <?php $index++; endforeach; ?>
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

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/glide.min.js"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script>
  var countNewsArticles = <?php echo count($newsArticles); ?>;
  for(i = 0; i < countNewsArticles; i++) {
    new Glide('#glide-' + i, {
      perView: 4,
      breakpoints: {
        1200: {
          perView: 3
        },
        800: {
          perView: 2
        },
        600: {
          perView: 1
        }
      },
      gap: 20,
      bound: true
    }).mount();
  }

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
