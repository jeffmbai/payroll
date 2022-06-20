<?php
    $CI = &get_instance();
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <button class="pull-left backbtn" title="Back" onclick="window.history.back()"><i class="fa fa-arrow-left" aria-hidden="true">  </i></button>
                <?php echo $page;?>
            </h3>
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
        
        <?php if($CI->permissions('sms_add')):?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Template </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link" ><i class="fa fa-chevron-down"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: none;">
                    <form role="form" action="<?php echo site_url('sms/add_template');?>" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name/Title <span class="text text-danger">*</span> </label>
                                        <input type="text" name="template_name" class="form-control" required placeholder="Template name" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Organization <span class="text text-danger">*</span> </label>
                                        <select class="form-control select2_single" name="org_id" required >
                                            <option value="">~Select organization~</option>
                                            <?php
                                                $orgs = $this->db->from('orgs')->get()->result(); 
                                                foreach($orgs as $org) echo '<option value="'.$org->org_id.'"> '.$org->org_name.' </option>'
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="narrative" placeholder="Detailed description here..."></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <br/>
                                        <label>Active
                                            <input type="checkbox" name="active" id="active" value="1" />
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-12" style="text-align: right;"><br/>
                                <button type="submit" class="pull-right btn btn-info" name="" >Save <span class="fa fa-save"></span></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif;?>

        <?php if($CI->permissions('sms_view')):?>
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <table id="example" class="table table-condensed table-responsive jambo_table">
                        <thead>
                            <tr>
                                <th style="width: 20%">Name</th>
                                <th>Organization</th>
                                <th>Active</th>
                                <th>Narrative</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-data">
                        <?php
                            foreach($templates as $dt) {                                                
                                ?>
                                <tr>
                                    <td><?=$dt->template_name?></td>
                                    <td><?=$dt->org_name?></td> 
                                    <td>
                                        <?php 
                                            if($dt->active == 1) echo "<span class='badge badge-success'>Active</span>";
                                            else echo "<span class='badge badge-danger'>Inactive</span>";
                                        ?>
                                    </td>
                                    <td><?=$dt->narrative?></td> 
                                    <td>
                                        <?php if($CI->permissions('sms_view')):?>
                                        <!-- <a href="<?php echo site_url();?>" class="btn btn-xs btn-rgp" title="View Tempate" ><span class="fa fa-eye"></span></a> -->
                                        <?php endif;?>
                                        <?php if($CI->permissions('sms_edit') && $dt->template_id > 2):?>
                                        <button type="button" class="btn btn-xs btn-rgs" onclick="get_sms('<?php echo $dt->template_id;?>')" title="Edit Template" ><span class="fa fa-edit"></span></button>
                                        <?php endif;?>
                                        <?php if($CI->permissions('sms_delete') && $dt->template_id > 2):?>
                                        <a href="<?php echo site_url('sms/delete_template/'.$dt->template_id);?>" class="btn btn-xs btn-rgd" title="Delete Template" ><span class="fa fa-trash"></span></a>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <?php endif;?>


        <br />
        <br />
        <br />

    </div>
</div>


<!-- Modal Start -->
<div id="templatedetails" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit project details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
            <form role="form" action="<?php echo site_url('sms/update_template');?>" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6">
                        <label>Name/Title <span class="text text-danger">*</span> </label>
                        <input type="text" name="template_name" id="template_name" class="form-control" required placeholder="Template name" />
                        <input type="hidden" name="template_id" id="template_id" required/>
                    </div>
                    <div class="col-md-6">
                        <label>Organization <span class="text text-danger">*</span> </label>
                        <select class="form-control select2_single" name="org_id" id="org_id" required >
                            <option value="">~Select organization~</option>
                            <?php
                                $orgs = $this->db->from('orgs')->get()->result(); 
                                foreach($orgs as $org) echo '<option value="'.$org->org_id.'"> '.$org->org_name.' </option>'
                            ?>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea class="form-control" name="narrative" id="narrative" placeholder="Detailed description here..."></textarea>
                    </div>

                    <div class="col-md-12">
                        <br/>
                        <label>Active
                            <input type="checkbox" name="active" id="active" value="1" />
                        </label>
                    </div>
                                        

                    <div class="col-md-12" style="text-align: right;"><br/>
                        <button type="button" class="pull-right btn btn-danger" data-dismiss="modal" >Close</button>
                        <button type="submit" class="pull-right btn btn-info" >Update</button>
                    </div>

                </div>
            </form>
        </div>
        <!-- <div class="modal-footer">
            
        </div> -->
        </div>

    </div>
</div>
<!-- Modal End -->




<?php if($CI->permissions('sms_view')):?>
  <script>
      function get_sms(id) {
          //get project info and update
          $.ajax({
            url: '<?php echo site_url();?>sms/get_template', //this is the submit URL
            type: 'POST',
            data: { data : id },
            success: function(data){
                console.log("Response: " + data);
                var obj = JSON.parse(data);
                if(obj.resp == '1') {
                    $("#template_id").val(obj.template_id);
                    $("#template_name").val(obj.template_name);
                    $("#narrative").val(obj.narrative);
                    $("#org_id").val(obj.org_id).change;

                    if(obj.active == '1') {
                        $('#active')[0].checked = true;
                    } else { $('#active')[0].checked = false; }

                    $("#templatedetails").modal("show");
                } else {
                    swal({
                    icon: 'error',
                    title: 'Failed',
                    text: obj.message
                    });
                }
                //action_buttons
                    
            }
        }); //end registration
      }
  </script>
<?php endif;?>














