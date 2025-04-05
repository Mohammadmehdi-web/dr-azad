
<?php
    include 'check_session.php';
    include('../db_con.php');
    include('header.php');


$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

if ($user_id > 0) {
    $query = "SELECT * FROM blogs WHERE id = $user_id"; 
    $res = mysqli_query($con, $query);

    $blog = mysqli_fetch_array($res);

    if (!$blog) {
        echo "Blog not found.";
        exit;
    }
} else {
    echo "Invalid user ID.";
    exit;
}
?>
<!-- END SIDEBAR-->
<div class="content-wrapper">

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Update Blog</div>
                    </div>
                    <div class="ibox-body">
                        <form method="post" action="blog_update" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                <div class="col-sm-6 form-group">
                                    <label>Blog URL</label>
                                    <input class="form-control" type="text" id="blog_url" name="blog_url" placeholder="Enter Blog URL"  placeholder="Enter Blog URL" value="<?php echo str_replace('-',' ',$blog['blog_url'] ); ?>" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Blog Heading</label>
                                    <input class="form-control" type="text" name="blog_heading" id="blog_heading"
                                        placeholder="Enter Blog Heading" required value="<?php echo htmlspecialchars($blog['blog_heading']); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Blog Title (SEO)</label>
                                    <textarea name="blog_desc_first" id="blog_desc_first" class="form-control"
                                        placeholder="Enter Blog Title.."><?php echo htmlspecialchars($blog['blog_desc_first']); ?></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Blog Meta Description</label>
                                    <textarea name="blog_desc_second" id="blog_desc_second" class="form-control"
                                        placeholder="Enter Blog Meta Desc.."><?php echo htmlspecialchars($blog['blog_desc_second']); ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Blog Meta Keywords</label>
                                    <textarea name="blog_point_one" id="blog_point_one" class="form-control" type="text" name=""
                                        placeholder="Enter Blog Meta Kewords.."><?php echo htmlspecialchars($blog['blog_point_one']); ?></textarea>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Main Image</label>
                                    <input class="form-control" type="file" name="images[]">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Main Image Name</label>
                                    <input class="form-control" type="text" name="blog_point_two" placeholder="Enter image name" value="<?php echo htmlspecialchars($blog['blog_point_two']); ?>">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Choose Multiple Images</label>
                                    <input class="form-control" type="file" name="logos[]" multiple>
                                </div>
                            </div>
                            <div class="row">
                                <div class="ibox-body col-lg-12 form-group" id="" id="summernote" data-plugin="summernote" data-air-mode="true" >
                                    <label for="blog_desc_two mb-2">Blog Details</label>
                                     <textarea name="blog_desc_two" id="summernote"><?php echo htmlspecialchars($blog['blog_desc_two']); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .note-editable{
            height: 400px;
        }
    </style>
    <?php
    include('footer.php');
?>