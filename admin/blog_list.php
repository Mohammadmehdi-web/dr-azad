<?php
    include 'check_session.php';
    include('header.php');
?>
<!-- END SIDEBAR-->
<div class="content-wrapper">
    <!-- START PAGE CONTENT-->

    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Blog List</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Image</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Blog Url</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            include '../db_con.php';                                           
                            $sel_que = "SELECT * FROM blogs";
                            $res = mysqli_query($con, $sel_que);
                            $i = 1;

                            while ($row = mysqli_fetch_array($res)) {
                                $image_query = "SELECT * FROM blogs_images WHERE blog_id = '{$row['id']}' LIMIT 1";
                                $image_result = mysqli_query($con, $image_query);
                                $image_row = mysqli_fetch_array($image_result);
                                $image_path = isset($image_row['image']) ? $image_row['image'] : 'default-image.jpg';

                        ?>
                                        
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img src="../blog/blog_uploads/<?php echo $image_path; ?>" alt="Image" class="img-thumbnail" style="max-width: 200px; height: 30px;"></td>
                            <td><?php echo $row['blog_heading']; ?></td>
                            <td><?php echo $row['blog_desc_first']; ?></td>
                            <td><?php echo $row['blog_url']; ?></td>
                            <td>
                                <a type="submit" class="btn btn-primary shadow btn-xs sharp me-1" href="blog_edit?user_id=<?php echo $row['id']; ?>" style="color:white;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form method="POST" action="blog_dlt" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp" name="delete" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            $i++;
                             }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <style>
    .dataTables_length {
        display: none;
    }

    .dataTables_filter {
        display: none;
    }
    </style>
    <?php
                include('footer.php');
           ?>