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
                        <div class="ibox-title">Query List</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../db_con.php');
                                        $fetch_query = "SELECT * FROM contact";
                                        $result = mysqli_query($con, $fetch_query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['message']; ?></td>

                                        <td>
                                        <form method="POST" action="contact_dlt.php">
                                            <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"name="delete" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></button>
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