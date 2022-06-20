<?php
    $CI = &get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
                <button class="pull-left backbtn" title="Back" onclick="window.history.back()"><i class="fa fa-arrow-left" aria-hidden="true">  </i></button>
                <?php echo $page;?>
            </h1>
            <?php if($CI->permissions('roles_add')){?>
            <a href="<?php echo site_url('systemroles/new_role')?>" class="btn btn-sm btn-primary" >Add role</a>
            <?php }?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                        if(isset($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                            unset($_SESSION['alert']);
                        }
                    ?>
                </div>
            </div>

        <div class="row">

            <?php if($CI->permissions('roles_view')):?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title">Roles List</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12"> <br/>
                            <table id="example1" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="headings">
                                        <th>Role Name</th>
                                        <th>Active </th>
                                        <th>Narrative </th>
                                        <th>Timestamp </th>
                                        <th class=" no-link last"><span class="nobr">Action</span></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $c = 0;
                                    foreach($roles as $dt) {
                                        $c++;
                                        ?>
                                        <tr class="even pointer">
                                            <td><?php echo $dt->role_name;?></td>
                                            <td class="a-right a-right ">
                                                <?php
                                                    if($dt->active == 't' || $dt->active == '1') echo "True";
                                                    else echo "False";
                                                ?>
                                            </td>
                                            <td><?php echo $dt->narrative;?></td>
                                            <!-- <td style="filter: blur(1.5px);" ><?php echo str_replace("[","",mb_strimwidth($dt->permission, 0, 100, "..."));?></td> -->
                                            <td><?=$dt->time_stamp;?></td>
                                            <td class=" last">
                                                <?php if($CI->permissions('roles_edit')):?>
                                                <a href="<?php echo site_url('systemroles/edit_role/'.$this->CI->encryptStringArray($dt->role_id));?>" class="btn btn-xs btn-rgp" > <span class="fa fa-edit"></span> </a>
                                                <?php endif;?>

                                                <?php if($CI->permissions('roles_delete')):?>
                                                <?php 
                                                    if($dt->role_id != 1) { //Administrator role cannot be deleted
                                                        ?>
                                                        <a href="<?php echo site_url('systemroles/delete/'.$this->CI->encryptStringArray($dt->role_id));?>" class="btn btn-xs btn-rgd" > <span class="fa fa-trash"></span> </a>
                                                        <?php
                                                    }
                                                ?>
                                                <?php endif;?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>


                            </table>
                        </div>
                    </div><!-- /.card-body -->
                </div>

            </div>
            <?php endif;?>

            <br />
            <br />
            <br />

        </div>


        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  