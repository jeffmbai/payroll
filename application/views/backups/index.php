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
                <h1 class="m-0 text-dark"><?php echo $page;?></h1>
                <?php if($CI->permissions('backup_add')):?>
                <a href="<?php echo site_url('backups/new_backup');?>" class="btn btn-rgp" name="" >New Backup</a> 
                <?php endif;?>
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

                <?php if($CI->permissions('backup_view')):?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Backup list</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12"> <br/>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="headings">
                                            <th>#</th>
                                            <th>Backup</th>
                                            <th>Time Stamp</th>
                                            <th>Action</span></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $x = 0;
                                        $data = $this->db->get('db_backups')->result();
                                        foreach($data as $dt) {
                                            $x++;
                                            ?>
                                            <tr>
                                                <td><?=$x?></td>
                                                <td><?=$dt->backup_name?></td>
                                                <td><?=$dt->time_stamp?></td>
                                                <td>
                                                    <?php //if($CI->permissions('backup_download')):?>
                                                    <?php if($_SESSION['userrole'] == 1 && ($_SESSION['userid'] == 1 || $_SESSION['userid'] == 2)):?>
                                                    <a href="<?php echo base_url('database/backups/'.$dt->backup_name)?>" class="btn btn-xs btn-rgp"  title="Download file" download >Download file <i class="fa fa-download"></i> </a>
                                                    <?php endif;?>
                                                    <?php if($CI->permissions('backup_delete')):?>
                                                    <a href="<?php echo site_url('backups/delete/'.$dt->id)?>" class="btn btn-xs btn-rgd"  title="Delete file" >Delete <i class="fa fa-trash"></i> </a>
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



  


