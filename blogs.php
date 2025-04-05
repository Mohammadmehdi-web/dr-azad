<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeServices">
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/favicon.png">
  <!-- Site Title -->
  <title>Sex Problem Treatment | Blogs</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/odometer.css">
  <link rel="stylesheet" href="assets/css/slick.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .cs_post.cs_style_1 .cs_post_thumbnail {
      display: inline-block;
      padding: 0 0px;
      margin-bottom: -8px;
    }

    .blog-not-fount {
      margin-top: 17px;
      background: #ff4d4d38;
      padding: 8px;
      color: black;
      font-size: 15px;
      font-weight: bold;
      color: black;
    }

    .cs_post.cs_style_1 .cs_posted_by {
      width: 140px;
      height: 42px;
    }
  </style>
</head>

<body>
  <?php
  include('header.php');
  ?>
  <!-- End Header Section -->
  <!-- Start Page Heading -->
  <section class="cs_page_heading cs_bg_filed cs_center" data-src="assets/img/page_heading_bg.jpg">
    <div class="container">
      <h1 class="cs_page_title">Blogs</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
        <li class="breadcrumb-item active">Blogs</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <!-- Start Blog Section -->
  <section>
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_section_heading cs_style_1 text-center">
        <p class="cs_section_subtitle cs_accent_color wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.25s">
          <span class="cs_shape_left"></span>OUR LARGEST BLOG<span class="cs_shape_right"></span>
        </p>
        <h2 class="cs_section_title">Latest Blogs</h2>
      </div>
      <div class="cs_height_50 cs_height_lg_50"></div>
      <div class="cs_slider cs_style_1 cs_slider_gap_24">
        <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"
          data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2"
          data-md-slides="3" data-lg-slides="3" data-add-slides="3">
          <div class="cs_slider_wrapper">
            <?php
            include('db_con.php');
            $sql = "SELECT blogs.blog_heading AS heading, 
                            blogs_images.image, 
                            blogs.blog_url,
                            blogs.created_at
                            FROM blogs
                            INNER JOIN blogs_images ON blogs.id = blogs_images.blog_id
                            GROUP BY blogs.id  
                            ORDER BY blogs.created_at";
            $result = $con->query($sql);
            if ($result->num_rows > 0)
            {
              while ($row = $result->fetch_assoc())
              {
                $heading = $row['heading'];
                $image = $row['image'];
                $blog_url = $row['blog_url'];
                $created_at = $row['created_at'];
                $formatted_date = date("j F Y", strtotime($created_at));
                ?>
                <div class="cs_slide">
                  <article class="cs_post cs_style_1">
                    <a class="cs_post_thumbnail position-relative" href="blog/<?php echo $blog_url; ?>">
                      <img src="blog/blog_uploads/<?php echo $image; ?>" alt="post Thumbnail">
                      <div class="cs_post_category position-absolute">Medical</div>
                    </a>
                    <div class="cs_post_content position-relative">
                      <div class="cs_post_meta_wrapper">
                        <div class="cs_posted_by cs_center position-absolute"><?php echo $formatted_date; ?></div>
                        <div class="cs_post_meta_item">
                          <img src="assets/img/icons/post_user_icon.png" alt="Icon">
                          <span>By: Dr. Azad</span>
                        </div>

                      </div>
                      <h3 class="cs_post_title"><a href="blog/<?php echo $blog_url; ?>"><?php echo $heading; ?>
                          </a>
                      </h3>

                      <a class="cs_post_btn" href="blog/<?php echo $blog_url; ?>">
                        <span>Read More</span>
                        <span><i class="fa-solid fa-angle-right"></i></span>
                      </a>
                      <div class="cs_post_shape position-absolute"></div>
                    </div>
                  </article>
                </div>
                <?php
              }
            } else
            {

              echo "<p class='text-black mt-2 text-center blog-not-fount mt-4'>No blog found for today</p>";
            }
            ?>
          </div>
        </div>
        <div class="cs_pagination cs_style_2"></div>
      </div>
    </div>
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
  <!-- End Blog Section -->
  <!-- Start Footer -->
  <?php
  include('footer.php');
  ?>
  <!-- End Footer -->
  <!-- Start Scroll Up Button -->
  <span class="cs_scrollup">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z" fill="currentColor" />
    </svg>
  </span>
  <!-- End Scroll Up Button -->

  <!-- Script -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/jquery.slick.min.js"></script>
  <script src="assets/js/odometer.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>