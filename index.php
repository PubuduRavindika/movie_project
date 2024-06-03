<?php
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
session_unset(); // Clear session data
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Movie Project</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- toggle menu -->
  <div class="menuItems" id="menuItems">
    <div class="menu-close">
      <img src="assets/close.png" onclick="menutoggle()" />
    </div>
    <div class="item">
      <a href="#home">Home</a>
      <a href="#">OUR SCREENS</a>
      <a href="#">SCHEDULE</a>
      <a href="#movies">MOVIE LIBRARY</a>
      <a href="#">LOCATION AND CONTACT</a>
    </div>
  </div>
  <!-- navbar -->
  <div class="navbar">
    <div>
      <a href=""><img src="assets/Logo.png" alt="" /></a>
    </div>
    <nav class="navbar-links">
      <a href="#home" class="active">HOME</a>
      <a href="#">OUR SCREENS</a>
      <a href="#">SCHEDULE</a>
      <a href="#movies">MOVIE LIBRARY</a>
      <a href="#contact">LOCATION AND CONTACT</a>
      <img src="assets/menu.png" onclick="menutoggle()" />
    </nav>
  </div>

  <div class="container" id="home">
    <!-- banner section -->
    <section class="bnner fade-in">
      <img src="assets/banner.png" alt="" />
    </section>

    <div class="intro">
      <div class="intro-div">
        <h1>MOVIE LIBRARY</h1>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam
          molestiae ad optio alias aspernatur quis consequatur odio.
        </p>
      </div>
    </div>

    <!-- movies section -->
    <section class="moveies" id="movies">
      <div class="top">
        <p>Collect your favorite</p>
        <div class="search-suggest-div">
          <div class="search-div">
            <img src="./assets/search.png" alt="" />
            <input type="text" id="searchInput" placeholder="Search title and add to grid" autocomplete="off" />
          </div>
          <div id="suggestions" class="suggestions"></div>
        </div>
      </div>

      <div class="bottom">
        <!-- movie cards -->
        <div class="card fade-in">
          <div class="card-img">
            <img src="assets/img_01.png" />
            <div class="close">
              <img src="assets/close.png" onclick="removeElement(this)" />
            </div>
          </div>
          <div class="card-text">
            <h3>Batman Returns</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis impedit eligendi voluptates, ratione eius autem
              molestiae nesciunt harum ad doloremque.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card-img">
            <img src="assets/img_02.png" />
            <div class="close">
              <img src="assets/close.png" onclick="removeElement(this)" />
            </div>
          </div>
          <div class="card-text">
            <h3>Wild Wild West</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis impedit eligendi voluptates, ratione eius autem
              molestiae nesciunt harum ad doloremque.
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card-img">
            <img src="assets/img_03.png" />
            <div class="close">
              <img src="assets/close.png" onclick="removeElement(this)" />
            </div>
          </div>
          <div class="card-text">
            <h3>The Amazing Spiderman</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Blanditiis impedit eligendi voluptates, ratione eius autem
              molestiae nesciunt harum ad doloremque.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- contact section -->
    <div class="contact" id="contact">
      <div class="contact-top">
        <h1>How toreach us</h1>
        <p>Lorem ipsum dolor, sit amet consectetur</p>
      </div>

      <div class="contact-bottom">
        <div class="left">
          <form action="backend/submit_form.php" method="post">
            <?php
            if (count($errors) > 0) {
              echo '<ul>';
              foreach ($errors as $error) {
                echo "<li>$error</li>";
              }
              echo '</ul>';
            }
            ?>
            <div class="form-group">
              <div class="form-input">
                <label for="first_name">First Name *</label>
                <input id="first_name" name="first_name" type="text" autocomplete="off" required />
              </div>

              <div class="form-input">
                <label for="first_name">Last Name *</label>
                <input id="last_name" name="last_name" type="text" autocomplete="off" required />
              </div>
            </div>

            <div class="form-input">
              <label for="email">Email *</label>
              <input id="email" name="email" type="email" autocomplete="off" />
            </div>

            <div class="form-input">
              <label for="telephone">Telephone</label>
              <input id="telephone" name="telephone" type="tel" autocomplete="off" />
            </div>

            <div class="form-input">
              <label for="message">Message *</label>
              <textarea id="message" name="message" type="text" autocomplete="off" required></textarea>
              <p>*required fields</p>
            </div>

            <div class="checkbox">
              <input type="checkbox" id="checkbox" name="checkbox" />
              <label for="checkbox" class="contact-form-label">
                I agree to the
                <span class="text-white">Terms & Conditions</span>
              </label>
            </div>

            <div class="button-div">
              <input type="submit" value="SUBMIT" />
            </div>
          </form>
        </div>

        <!-- map -->
        <div class="right">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3807403172596!2d79.940426!3d6.8448775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25069caa2f53b%3A0xe7eae3a8b1f1214d!2seBEYONDS%20eBusiness%20%26%20Digital%20Solutions!5e0!3m2!1sen!2slk!4v1717274447183!5m2!1sen!2slk" width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

    <!-- footer section -->
    <div class="footer">
      <div class="footer-top">
        <div class="footer-top-left">
          <p><b>IT Group</b></p>
          <p>C. Salvador de Madariaga, 1</p>
          <p>28027 Madrid</p>
          <p>Spain</p>
        </div>
        <div class="footer-top-right">
          <p>Follow us on</p>
          <img src="assets/twitter.png" alt="" />
          <img src="assets/youtube.png" alt="" />
        </div>
      </div>
      <div class="footer-bottom">
        <p>Copyright © 2022 IT Hotels. All rights reserved.</p>
        <p>
          Photos by Felix Mooneeram &
          <span>Serge Kutuzov</span> on
          <span>Unsplash</span>
        </p>
      </div>
    </div>
  </div>

  <script src="scripts/script.js"></script>
</body>

</html>