<?php
include '../db_con.php';

if (isset($_POST['submit'])) {
    $id = intval($_POST['id']);
    $blog_url_first = $_POST['blog_url'];
    $blog_url = str_replace(' ', '-', $blog_url_first);
    $blog_heading = $_POST['blog_heading'];
    
    $blog_desc_first = $_POST['blog_desc_first'];
    $blog_desc_second = $_POST['blog_desc_second'];
    $blog_point_one = $_POST['blog_point_one'];
    $blog_point_two = $_POST['blog_point_two'];

    $blog_desc_two = $_POST['blog_desc_two'];

    // Update query
    $query = "UPDATE blogs SET blog_url = ?, blog_heading = ?, blog_desc_first = ?, blog_desc_second = ?, blog_point_one = ?, blog_point_two = ?, blog_desc_two = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssssss", $blog_url, $blog_heading, $blog_desc_first, $blog_desc_second, $blog_point_one, $blog_point_two, $blog_desc_two, $id);
    
    // Execute the update query
    $stmt->execute();

    // Handle logo uploads
    if (!empty($_FILES['logos']['name'][0])) {
        // Delete existing logos for the blog
        $delete_logos_query = "DELETE FROM blogs_images WHERE blog_id = '$id' AND logos IS NOT NULL";
        mysqli_query($con, $delete_logos_query);

        // Loop through uploaded logos and insert them
        foreach ($_FILES['logos']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['logos']['name'][$key];
            $file_tmp = $_FILES['logos']['tmp_name'][$key];

            // Move the uploaded logo to the desired directory
            move_uploaded_file($file_tmp, "../blog/blog_uploads/" . $file_name);

            // Insert new logo into the database
            $insert_logo_query = "INSERT INTO blogs_images (blog_id, logos) VALUES ('$id', '$file_name')";
            mysqli_query($con, $insert_logo_query);
        }
    }

    // Handle image uploads
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];

            // Move the uploaded image to the desired directory
            move_uploaded_file($file_tmp, "../blog/blog_uploads/" . $file_name);

            // Check if the image already exists in the database
            $check_image_query = "SELECT id FROM blogs_images WHERE blog_id = '$id' AND image IS NOT NULL LIMIT 1";
            $result = mysqli_query($con, $check_image_query);
            
            if (mysqli_num_rows($result) > 0) {
                // Update existing image in the database
                $update_image_query = "UPDATE blogs_images SET image = '$file_name' WHERE blog_id = '$id'";
                mysqli_query($con, $update_image_query);
            } else {
                // Insert new image into the database if no existing image
                $insert_image_query = "INSERT INTO blogs_images (blog_id, image) VALUES ('$id', '$file_name')";
                mysqli_query($con, $insert_image_query);
            }
        }
    }

    // Redirect or display success message
    header("Location: blog_list");
    exit();
}
?>
