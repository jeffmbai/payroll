<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
            <button class="pull-left backbtn" title="Back" style="border-radius: 10rem;border:white;font-size: 2rem;margin: 5px;padding-right: 3rem;color: #527cf2;background-color: transparent;" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true">  </i></button>
            Item Brands</h3>
            <script>
                function goBack() {
                window.history.back();
                }
            </script>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_SESSION['alert'])) {
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
            ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Register Brand </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form action="<?php echo site_url('submitform/add_brand');?>" method="post">
                            <div class="col-md-12">
                                <label for="">Brand Name <span class="text text-danger">*</span> </label>
                                <input type="text" name="brand_name" class="form-control" required />
                            </div>
                            <div class="col-md-3">
                                <label> Active </label>
                                <p>
                                    <input type="checkbox" class="flat" value="1" name="active">
                                </p>
                            </div> <div class="col-md-12">
                                <label for="">Narrative </label>
                                <textarea name="narrative" id="" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registered Brands </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>Brand Name</th>
                                <th>Narrative </th>
                                <th>Active </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $c = 0;
                            foreach($all_brands as $brand) {
                                $c++;
                                ?>
                                    <tr class="even pointer">
                                        <td class=" "><?php echo $brand->brand_name;?></td>
                                        <td class=" "><?php echo $brand->narrative;?></td>
                                        <td class="a-right a-right ">
                                            <?php
                                                if($brand->active == 1) echo "True";
                                                else echo "False";
                                            ?>
                                        </td>
                                        <td class=" last">
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $brand->brand_id;?>"> <span class="fa fa-pencil"></span> </button>
                                            <a href="<?php echo site_url('delete/brand/'.$brand->brand_id);?>" class="btn btn-xs btn-danger"><span class="fa fa-close"></span></a>
                                        </td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $brand->brand_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Brand</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form action="<?php echo site_url('submitform/update_brand/'.$brand->brand_id);?>" method="post">
                                                                <div class="col-md-12">
                                                                    <label for="">Brand Name <span class="text text-danger">*</span> </label>
                                                                    <input type="text" name="brand_name" class="form-control" value="<?php echo $brand->brand_name;?>" required />
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label> Active </label>
                                                                    <p>
                                                                        <input type="checkbox" class="" value="1" name="active" <?php if($brand->active == 1) echo "checked";?> >
                                                                    </p>
                                                                </div> <div class="col-md-12">
                                                                    <label for="">Narrative </label>
                                                                    <textarea name="narrative" id="" class="form-control"><?php echo $brand->narrative;?></textarea>
                                                                </div>
                                                                <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="Submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
