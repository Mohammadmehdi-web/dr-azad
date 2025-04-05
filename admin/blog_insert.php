<?php
// Include your database connection file
include('../db_con.php');

if (isset($_POST['submit'])) {
    // Start transaction
    $con->begin_transaction();

    try {
        // Retrieve form data
        $blog_url_first = $_POST['blog_url'];
        $blog_url = str_replace(' ', '-', $blog_url_first);
        $blog_heading = $_POST['blog_heading'];

        $blog_desc_first = $_POST['blog_desc_first'];
        $blog_desc_second = $_POST['blog_desc_second'];
        $blog_point_one = $_POST['blog_point_one'];
        $blog_point_two = $_POST['blog_point_two'];
        $blog_desc_two = $_POST['blog_desc_two'];

        // Insert product data into blogs table
        $sql = "INSERT INTO blogs (blog_url, blog_heading, blog_desc_first, blog_desc_second, blog_point_one, blog_point_two, blog_desc_two)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssss", $blog_url, $blog_heading, $blog_desc_first, $blog_desc_second, $blog_point_one, $blog_point_two, $blog_desc_two);

        if (!$stmt->execute()) {
            throw new Exception("Error inserting product: " . $stmt->error);
        }

        // Get the last inserted blog ID
        $product_id = $stmt->insert_id;

        // Handle multiple file uploads for images
        $target_dir = "../blog/blog_uploads/";
        foreach ($_FILES['images']['name'] as $key => $image_name) {
            $target_file = $target_dir . basename($image_name);

            // Move the uploaded file to the server
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                // Insert image data into blogs_images table
                $sql = "INSERT INTO blogs_images (blog_id, image) VALUES (?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("is", $product_id, $image_name);

                if (!$stmt->execute()) {
                    throw new Exception("Error inserting image: " . $stmt->error);
                }
            } else {
                throw new Exception("Error uploading image: $image_name");
            }
        }

        // Handle multiple file uploads for logos (same product_id is used)
        if (isset($_FILES['logos'])) {
            foreach ($_FILES['logos']['name'] as $key => $logo_name) {
                // Check if the file is uploaded successfully
                if ($_FILES['logos']['error'][$key] == 0) {
                    $logo_target_file = $target_dir . basename($logo_name);
                    
                    // Move the uploaded logo to the server
                    if (move_uploaded_file($_FILES['logos']['tmp_name'][$key], $logo_target_file)) {
                        // Insert logo into blogs_images table with the same product_id
                        $sql = "INSERT INTO blogs_images (blog_id, logos) VALUES (?, ?)"; // Change 'logos' to 'logo'
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("is", $product_id, $logo_name);  // Use $product_id here
                        
                        if (!$stmt->execute()) {
                            throw new Exception("Error inserting logo: " . $stmt->error);
                        }
                    } else {
                        throw new Exception("Error uploading logo: $logo_name");
                    }
                } else {
                    throw new Exception("Error uploading logo: " . $_FILES['logos']['error'][$key]);
                }
            }
        }

        // Commit transaction
        $con->commit();
        header('location:blog_list');
    } catch (Exception $e) {
       
        $con->rollback();
        echo "Failed to insert product and images: " . $e->getMessage();
    }
    $stmt->close();
    $con->close();
}
?>