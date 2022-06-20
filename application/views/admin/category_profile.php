<?php
$category_id = null;
$name = null;
$active = null;
$narrative = null;

foreach ($this_category as $category) {
$category_id = $category->cat_id;
$name = $category->cat_name;
$active = $category->active;
$narrative = $category->narrative;
}
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                Category Profile
                <small>
                    Category details
                </small>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php
            if (isset($_SESSION['alert'])) {
                echo $_SESSION['alert'];
                unset($_SESSION['alert']);
            }
            ?>
        </div>

        <div class="col-md-7 col-sm-7 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Category details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="<?php echo site_url('sys/categories');?>" class="btn btn-primary btn-xs">See categories </a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-repsonsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Category Name</b></td>
                                    <td class="rm_border_top bd_left"><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b>Active</b></td>
                                    <td class="rm_border_top bd_left"><?php if($active == 1) echo "True"; else echo "False"; ?></td>
                                </tr>
                                <tr>
                                    <td class="rm_border_top pd_right"><b><b>Narrative</b></b></td>
                                    <td class="rm_border_top bd_left"><?php echo $narrative; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="x_title">
                    <h2>Update details</h2>
                    <div class="clearfix"></div>
                </div>
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                    <form action="<?php echo site_url('submitform/update_category/'.$category_id);?>" method="post">
                        <div class="col-md-12">
                            <label for="">Category Name <span class="text text-danger">*</span> </label>
                            <input type="text" name="cat_name" class="form-control" value="<?php echo $name;?>" required />
                        </div>
                        <div class="col-md-3">
                            <label> Active </label>
                            <p>
                                <input type="checkbox" class="flat" value="1" name="active" <?php if($active == 1) echo "checked";?>  >
                            </p>
                        </div> <div class="col-md-12">
                            <label for="">Narrative </label>
                            <textarea name="narrative" id="" class="form-control"> <?php if($narrative != '')echo $narrative;?> </textarea>
                        </div>
                        <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <br />
        <br />

    </div>



</div>
