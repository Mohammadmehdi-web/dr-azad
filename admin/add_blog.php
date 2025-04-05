<?php
include 'check_session.php';
?>
<?php
    include('header.php');
?>
<!-- END SIDEBAR-->
<div class="content-wrapper">

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Blog</div>
                    </div>
                    <div class="ibox-body">
                        <form method="post" action="blog_insert.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Blog URL</label>
                                    <input class="form-control" type="text" name="blog_url" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Blog Heading</label>
                                    <input class="form-control" type="text" name="blog_heading"
                                        placeholder="Enter Blog Heading" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Blog Title (SEO)</label>
                                    <textarea name="blog_desc_first" id="blog_desc_first" class="form-control"
                                        placeholder="Enter Blog Title.."></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Blog Meta Description</label>
                                    <textarea name="blog_desc_second" id="blog_desc_second" class="form-control"
                                        placeholder="Enter Blog Meta Desc.."></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Blog Meta Keywords</label>
                                    <textarea name="blog_point_one" id="blog_point_one" class="form-control" type="text" name=""
                                        placeholder="Enter Blog Meta Kewords.."></textarea>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Main Image</label>
                                    <input class="form-control" type="file" name="images[]" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Main Image Name</label>
                                    <input class="form-control" type="text" name="blog_point_two" placeholder="Enter image name">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Choose Multiple Images</label>
                                    <input class="form-control" type="file" name="logos[]" multiple required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="ibox-body col-lg-12 form-group" id="" id="summernote" data-plugin="summernote" data-air-mode="true" >
                                    <label for="blog_desc_two mb-2">Blog Details</label>
                                     <textarea name="blog_desc_two" id="summernote"></textarea>
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