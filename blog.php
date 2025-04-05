<?php
include 'db_con.php';

if (isset($_GET['page_url']))
{

  $page_url = mysqli_real_escape_string($con, $_GET['page_url']);

  $blog_query = "SELECT * FROM blogs WHERE blog_url = '$page_url'";
  $blog_result = mysqli_query($con, $blog_query);

  if ($blog_result && mysqli_num_rows($blog_result) > 0)
  {
    $blog = mysqli_fetch_assoc($blog_result);

    $image_query = "SELECT * FROM blogs_images WHERE blog_id = '{$blog['id']}'";
    $image_result = mysqli_query($con, $image_query);

    ?>


<?php
  } else
  {

    echo "<p>Product not found.</p>";
  }
} else
{

  echo "<p>No product URL provided.</p>";
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $blog['blog_desc_first'] ?></title>
    <meta name="description" content="<?php echo $blog['blog_desc_second'] ?>">
    <meta name="keywords" content="<?php echo $blog['blog_point_one'] ?>">
    <link rel="icon" href="../assets/img/favicon.png">
    <!-- Site Title -->

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/odometer.css">
    <link rel="stylesheet" href="../assets/css/slick.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
    .cs_post_details.cs_style_1 p {
        margin-bottom: 20px;
        text-align: justify;
    }

    .cs_post_details.cs_style_1 .cs_post_thumb_thumbnail img {
        width: 100%;
        height: 440px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <?php
  include('header.php');
  ?>
    <!-- End Header Section -->
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center" data-src="../assets/img/page_heading_bg.jpg">
        <div class="container">
            <h1 class="cs_page_title">Blog Details</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                <li class="breadcrumb-item active">Blog Details</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Blog Details Section -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cs_post_details cs_style_1">
                        <div class="cs_post_thumb_thumbnail">
                            <?php
              $image_row = mysqli_fetch_assoc($image_result);
              if ($image_row)
              {
                echo "<img src='blog_uploads/{$image_row['image']}' >";
              } else
              {
                echo "<p>No Blog images available.</p>";
              }
              ?>
                        </div>
                        <ul class="cs_post_meta cs_mp0">
                            <li><i
                                    class="fa-regular fa-calendar-days"></i><?php echo date("j F Y", strtotime($blog['created_at'])); ?>
                            </li>
                        </ul>
                        <h3 class="cs_iconbox_title text-black"> <?php echo $blog['blog_heading'] ?></h3>
                        <p><?php echo $blog['blog_desc_two'] ?></p>
                       
                        <div class="cs_height_27 cs_height_lg_10"></div>
                    </div>
                </div>
                <aside class="col-lg-4">
                    <div class="cs_height_0 cs_height_lg_50"></div>
                    <div class="cs_sidebar cs_style_1">
                        <div class="cs_sidebar_widget cs_service cs_bg_filed"
                            data-src="../assets/img/suegery_overlay.jpg">
                            <div class="cs_iconbox cs_style_11">
                                <div class="cs_iconbox_icon cs_center">
                                    <img src="../assets/img/icons/service_icon_19.png" alt="Icon">
                                </div>
                                <h3 class="cs_iconbox_title cs_white_color">Connect with Us</h3>
                                <p class="cs_iconbox_subtitle cs_white_color">Take the first step towards a healthier,
                                    happier you.
                                    Contact us today and experience the difference at Dr. Azad Clinic.</p>
                                <a class='cs_iconbox_btn cs_center' href='service-details.html'><i
                                        class="fa-solid fa-circle-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="cs_sidebar_widget cs_radius_15">
                            <h3 class="cs_sidebar_title">Recent Blogs</h3>
                            <?php
                                    include('db_con.php');
                                    $sql = "SELECT blogs.blog_heading AS heading, 
                                            blogs_images.image, 
                                            blogs.blog_url,
                                            blogs.created_at
                                            FROM blogs
                                            INNER JOIN blogs_images ON blogs.id = blogs_images.blog_id
                                            GROUP BY blogs.id  
                                            ORDER BY blogs.created_at DESC LIMIT 4";

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
                            <div class="cs_post cs_style_2">
                                <a href="<?php echo $blog_url; ?>" class="cs_post_thumb_thumbnail">
                                    <img src="blog_uploads/<?php echo $image; ?>" alt="Image" class="cs_zoom_in">
                                </a>
                                <div class="cs_post_info">
                                    <div class="cs_post_meta"><i class="fa-regular fa-calendar-days"></i>
                                    <?php echo date("j F Y", strtotime($blog['created_at'])); ?></div>
                                    <h3 class="cs_post_title mb-0"><a href='<?php echo $blog_url; ?>'> <?php echo $heading; ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php
                                        }
                                    } else
                                    {

                                        echo "<p class='text-black;bg-pink'>No blog found for today</p>";
                                    }
                                    ?>
                        </div>
                </aside>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Details Section -->
    <!-- Start Footer -->
    <?php
  include('footer.php');
  ?>
    <!-- End Footer -->
    <!-- Start Scroll Up Button -->
    <span class="cs_scrollup">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor" />
        </svg>
    </span>
    <!-- End Scroll Up Button -->

    <!-- Script -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/jquery.slick.min.js"></script>
    <script src="../assets/js/odometer.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>