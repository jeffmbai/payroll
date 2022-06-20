  <?php
      $CI = &get_instance();
  ?>  

  <?php
      $code = $this->uri->segment(3); 
      $data = $this->db->select('a.*, b.client_name')->from('projects as a')->join('clients as b','a.client_id = b.client_id')->where('project_code', $code)->get()->row();
      $priority = $data->priority;
      $statusid = $data->status_id;
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
              <?php echo $page;?> [<u><?php print $data->project_title;?></u>]
            </h1>
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

            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                  <div class="info-box-content">
                    <h5 class="mb-1"><b>Client</b></h5>
                    <span class="info-box-text"><?php print $data->client_name;?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-calendar-alt"></i></span>

                  <div class="info-box-content">
                    <h5 class="mb-1"><b>Start Date</b></h5>
                    <span class="info-box-text"><?php print $data->start_date;?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-ticket-alt"></i></span>

                  <div class="info-box-content">
                    <h5 class="mb-1"><b>End Date</b></h5>
                    <span class="info-box-text"><?php print $data->end_date;?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-qrcode"></i></span>

                  <div class="info-box-content">
                    <h5 class="mb-1"><b><?php print $data->project_code;?></b></h5>
                    <span class="info-box-text">Project Code</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row animated fadeInRight">
              <div class="col-md-12">
                <div class="card m-b-20">
                  <div class="card-body">
                    <div class="row m-t-20">
                      <div class="col-md-2">
                        <h5 class="">Status</h5>
                        <p class="text-muted">
                          <?php 
                              if($data->status_id == 1) echo "<span class='badge badge-success'>Completed</span>";
                              elseif($data->status_id == 2) echo "<span class='badge badge-info'>Approved</span>";
                              elseif($data->status_id == 3) echo "<span class='badge badge-warning'>Pending</span>";
                              elseif($data->status_id == 4) echo "<span class='badge badge-danger'>Cancelled</span>";
                              elseif($data->status_id == 5) echo "<span class='badge badge-danger'>Suspended</span>";
                          ?>
                        </p>
                      </div>
                      <div class="col-md-2">
                            <h5 class="">Priority</h5>
                            <p class="text-muted">
                              <?php
                                  if($data->priority == 'Highest') echo "<span class='badge badge-success'>Highest</span>";
                                  elseif($data->priority == 'High') echo "<span class='badge badge-info'>High</span>";
                                  elseif($data->priority == 'Medium') echo "<span class='badge badge-warning'>Medium</span>";
                                  elseif($data->priority == 'Low') echo "<span class='badge badge-danger'>Low</span>";
                              ?>
                            </p>
                          </div>
                          <div class="col-md-2">
                            <h5 class="">Budget hours</h5>
                            <p class="text-muted"><?php print $data->budget_hours;?></p>
                          </div>
                          <div class="col-md-2">
                            <h5 class="">Estimate Cost</h5>
                            <p class="text-muted"><?php print number_format($data->estimated_cost, 2);?></p>
                          </div>
                      <div class="col-md-4">
                        <h5 class="">Project Overall Progress</h5>
                          <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                            aria-valuenow="<?=$data->progress;?>" aria-valuemin="0" aria-valuemax="100" style="width:40%; background-color: green !important">
                            <?=$data->progress;?>% Complete
                            </div>
                          </div>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row animated">

            <style>
              .nav-reag {
                border-bottom: 1px solid #dee2e6 !important;
                color: #555555 !important;
                font-family: Poppins, sans-serif !important;
                font-size: 14px;
                font-weight: bold !important;
              }
              .nav-tabs.flex-column .nav-link.active {
                border-bottom: 1px solid green !important;
                background-color: #F5F7FA !important;
              }
            </style>

              <!-- Left Side Inner Navigation Start -->
              <div class="col-md-2">
                <div class="card m-b-20">
                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active nav-reag" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true"> <span class="fa fa-home"></span> Overview</a>
                    <a class="nav-link nav-reag" id="vert-tabs-assigned-tab" data-toggle="pill" href="#vert-tabs-assigned" role="tab" aria-controls="vert-tabs-assigned" aria-selected="false"> <span class="fa fa-users"></span> Assigned To</a>
                    <a class="nav-link nav-reag" id="vert-tabs-progress-tab" data-toggle="pill" href="#vert-tabs-progress" role="tab" aria-controls="vert-tabs-progress" aria-selected="false"> <span class="fas fa-spinner"></span> Progress</a>
                    <a class="nav-link nav-reag" id="vert-tabs-tasks-tab" data-toggle="pill" href="#vert-tabs-tasks" role="tab" aria-controls="vert-tabs-tasks" aria-selected="false"> <span class="fa fa-tasks"></span> Tasks</a>
                    <a class="nav-link nav-reag" id="vert-tabs-variation-tab" data-toggle="pill" href="#vert-tabs-variation" role="tab" aria-controls="vert-tabs-variation" aria-selected="false"> <span class="fas fa-dice-d20"></span> Variations</a>
                    <a class="nav-link nav-reag" id="vert-tabs-timelogs-tab" data-toggle="pill" href="#vert-tabs-timelogs" role="tab" aria-controls="vert-tabs-timelogs" aria-selected="false"> <span class="fas fa-history"></span> Time Logs</a>
                    <a class="nav-link nav-reag" id="vert-tabs-files-tab" data-toggle="pill" href="#vert-tabs-files" role="tab" aria-controls="vert-tabs-files" aria-selected="false"> <span class="fa fa-file-alt"></span> Files</a>
                    <!-- <a class="nav-link nav-reag" id="vert-tabs-discussion-tab" data-toggle="pill" href="#vert-tabs-discussion" role="tab" aria-controls="vert-tabs-discussion" aria-selected="false"> <span class="fas fa-comments"></span> Discussions</a> -->
                  </div>
                </div>
              </div> 
              <!-- Left Side Inner Navigation End -->

              <!-- Right Side Inner Content Start -->
              <div class="col-md-10">
                <div class="row animated fadeInRight">
                  <div class="col-md-12">
                    <div class="card m-b-20">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">

                          <div class="tab-content" id="vert-tabs-tabContent">

                            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                              <?php print $data->summary.'<hr/>'.$data->narrative;?>
                            </div> <!-- Summary End -->
                            
                            <div class="tab-pane fade" id="vert-tabs-assigned" role="tabpanel" aria-labelledby="vert-tabs-assigned-tab">
                              <h5><b>Assigned Users</b></h5>
                              <form class="" role="form" action="<?php echo site_url('projects/update_members/'.$code);?>" method="post">
                                <div class="row">
                                  <div class="col-md-12">
                                      <label>Members/Employees </label>
                                      <select class="form-control select2" name="members[]" multiple="multiple" data-placeholder="Select members" >
                                          <?php
                                              $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                                              foreach($entitys as $ent) {
                                                $selected = '';
                                                if(in_array($ent->entity_id, json_decode($data->members))) $selected = 'selected';
                                                echo '<option value="'.$ent->entity_id.'" '.$selected.' > '.$ent->firstname.' '.$ent->lastname.' </option>';
                                              }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="col-md-12" style="text-align: right; padding-top: 10px">
                                    <?php if($CI->permissions('projects_edit')):?>
                                    <button type="submit" name="" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>
                                    <?php endif;?>
                                  </div>
                                </div>
                              </form>
                            </div> <!-- Assigned End -->

                            <div class="tab-pane fade" id="vert-tabs-progress" role="tabpanel" aria-labelledby="vert-tabs-progress-tab">
                              <h5><b>Progress</b></h5>
                              <form class="" role="form" action="<?php echo site_url('projects/update_progress/'.$code);?>" method="post">
                                <div class="row">

                                  <!-- <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="customRange1">Progress</label>
                                      <input type="range" class="custom-range" name="progress" id="progress" value="<?=$data->progress;?>" >
                                    </div>
                                  </div> -->

                                  <div class="col-md-6">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                                      aria-valuenow="<?=$data->progress;?>" aria-valuemin="0" aria-valuemax="100" style="width:40%; background-color: green !important">
                                      <?=$data->progress;?>% Complete
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label>Priotity <span class="text text-danger">*</span> </label>
                                        <select class="form-control" name="priority" required >
                                            <option value="Highest" <?php if($priority == 'Highest') echo 'selected';?> >Highest</option>
                                            <option value="High" <?php if($priority == 'High') echo 'selected';?> >High</option>
                                            <option value="Medium" <?php if($priority == 'Medium') echo 'selected';?> >Medium</option>
                                            <option value="Low" <?php if($priority == 'Low') echo 'selected';?> >Low</option>
                                        </select>
                                      </div>
                                      <div class="col-md-12">
                                        <label>Status <span class="text text-danger">*</span> </label>
                                        <select class="form-control" name="status_id" id="status_id" required >
                                            <option value="">~Select status~</option>
                                            <?php
                                                $status = $this->db->from('status')->get()->result(); 
                                                foreach($status as $stat) {
                                                  $thisStatus = '';
                                                  if($statusid == $stat->status_id) $thisStatus = 'selected';
                                                  echo '<option value="'.$stat->status_id.'"  '.$thisStatus.'  > '.$stat->status_name.' </option>';
                                                }
                                            ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12" style="text-align: right; padding-top: 10px">
                                    <?php if($CI->permissions('projects_edit')):?>
                                    <button type="submit" name="" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>
                                    <?php endif;?>
                                  </div>
                                </div>
                              </form>
                            </div> <!-- Progress End -->

                            <div class="tab-pane fade" id="vert-tabs-tasks" role="tabpanel" aria-labelledby="vert-tabs-tasks-tab">
                                <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title">Add Project's Task </h3>
                                      <div class="card-tools">
                                          <?php if($CI->permissions('tasks_add')):?>
                                          <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">Add Task</button>
                                          <?php endif;?>
                                      </div>
                                  </div>
                                  <!-- /.card-header -->

                                  <?php if($CI->permissions('tasks_add')):?>
                                  <div class="card-body" style="display: none;">
                                    <form class="" role="form" method="post" action="<?php echo site_url('projects/add_task');?>" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <input type="hidden" name="project_id" value="<?php echo $data->project_id;?>" style="display: none !important;" required /> 
                                              <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>Title <span class="text text-danger">*</span> </label>
                                              <input type="text" name="task_title" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-6">
                                              <label>Start Date <span class="text text-danger">*</span> </label>
                                              <input type="date" name="start_date" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-6">
                                              <label>End Date <span class="text text-danger">*</span> </label>
                                              <input type="date" name="end_date" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>Estimated Hours </label>
                                              <input type="number" name="estimated_hours" class="form-control" /> 
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label>Description</label>
                                              <textarea class="textarea" name="narrative" placeholder="Detailed description here..."
                                              style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                          </div>
                                        </div>


                                        <div class="col-md-12">
                                          <label >Assign To:</label>
                                          <select class="form-control select2" name="members[]" multiple="multiple" data-placeholder="Select members" >
                                              <?php
                                                  $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                                                  foreach($entitys as $ent) {
                                                    echo '<option value="'.$ent->entity_id.'" > '.$ent->firstname.' '.$ent->lastname.' </option>';
                                                  }
                                              ?>
                                          </select>
                                        </div> 

                                        <div class="col-md-12" style="text-align: right; padding-top: 10px">
                                          <button type="submit" name="" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>
                                        </div>

                                      </div>
                                    </form>
                                  </div>
                                  <?php endif;?>

                                </div>

                                <?php if($CI->permissions('tasks_view')):?>
                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title">Tasks List </h3>
                                    <table id="example1" class="table table-striped responsive-utilities jambo_table projects">
                                      <thead>
                                          <tr class="headings">
                                              <th>Title</th>
                                              <th>Dates</th>  
                                              <th>Status</th>
                                              <th>Assigned To</th>
                                              <th>Created By</th>
                                              <th><span class="nobr">Action</span></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $tasks = $this->db->select("a.*, b.firstname, b.secondname, b.lastname")
                                                  ->from('project_tasks as a')
                                                  ->join('entitys as b', 'b.entity_id = a.entity_id')
                                                  ->where("a.project_id = '$data->project_id' ")
                                                  ->get()->result();
                                          foreach($tasks as $task) {
                                            ?>
                                            <tr>
                                              <td><?php print $task->task_title;?></td>
                                              <td>
                                                <?php 
                                                  print 'Start Date: '.$task->start_date.'<br/>';
                                                  print 'End Date: '.$task->end_date;
                                                ?>
                                              </td>
                                              <td>
                                                <?php 
                                                  if($task->status_id == 1) echo "<span class='badge badge-success'>Completed</span>";
                                                  elseif($task->status_id == 2) echo "<span class='badge badge-info'>Approved</span>";
                                                  elseif($task->status_id == 3) echo "<span class='badge badge-warning'>Pending</span>";
                                                  elseif($task->status_id == 4) echo "<span class='badge badge-danger'>Cancelled</span>";
                                                  elseif($task->status_id == 5) echo "<span class='badge badge-danger'>Suspended</span>";
                                                ?>
                                              </td>
                                              <td>
                                                <?php
                                                  foreach(json_decode($task->members) as $member) {
                                                      $memb = $this->db->select('profile_picture, firstname, lastname')->from('entitys')->where('entity_id', $member)->get()->row();
                                                      ?>
                                                        <li class="list-inline-item">
                                                          <!-- <img alt="<?php echo $memb->firstname?>" class="table-avatar" src="<?php echo base_url('assets/images/profile/'.$memb->profile_picture);?>"> -->
                                                          <span><?=$memb->firstname.','?></span>
                                                        </li>
                                                      <?php
                                                  }
                                                ?>
                                              </td>
                                              <td><?php print $task->firstname.' '.$task->secondname.' '.$task->lastname;?></td>
                                              <td>
                                                <?php if($CI->permissions('tasks_edit')):?>
                                                <button class="btn btn-xs btn-info" onclick="get_tasks('<?php echo $task->task_id;?>')" title="Edit" ><span class="fa fa-edit"></span></button>
                                                <?php endif;?>

                                                <?php if($CI->permissions('tasks_delete')):?>
                                                <a href="<?php echo site_url('projects/delete_task/'.$task->task_id);?>" class="btn btn-xs btn-danger" title="Delete" ><span class="fa fa-trash"></span></a>
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
                                <?php endif;?>
                                
                            </div> <!-- Tasks End -->

                            <div class="tab-pane fade" id="vert-tabs-variation" role="tabpanel" aria-labelledby="vert-tabs-variation-tab">
                                <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title">Add Project's Variation</h3>
                                      <div class="card-tools">
                                          <?php if($CI->permissions('projects_add')):?>
                                          <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">Add New</button>
                                          <?php endif;?>
                                      </div>
                                  </div>
                                  <!-- /.card-header -->
                                  <?php if($CI->permissions('projects_add')):?>
                                  <div class="card-body" style="display: none;">
                                    <form class="" role="form" method="post" action="<?php echo site_url('projects/add_variation');?>" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <input type="hidden" name="project_id" value="<?php echo $data->project_id;?>" style="display: none !important;" required /> 
                                              <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>Title <span class="text text-danger">*</span> </label>
                                              <input type="text" name="variation_title" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-6">
                                              <label>Start Date <span class="text text-danger">*</span> </label>
                                              <input type="date" name="start_date" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-6">
                                              <label>End Date <span class="text text-danger">*</span> </label>
                                              <input type="date" name="end_date" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>Estimated Hours </label>
                                              <input type="number" name="estimated_hours" class="form-control" /> 
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <label>Description</label>
                                              <textarea class="textarea" name="narrative" placeholder="Detailed description here..."
                                              style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                          </div>
                                        </div>


                                        <div class="col-md-12">
                                          <label >Assign To:</label>
                                          <select class="form-control select2" name="members[]" multiple="multiple" data-placeholder="Select members" >
                                              <?php
                                                  $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                                                  foreach($entitys as $ent) {
                                                    echo '<option value="'.$ent->entity_id.'" > '.$ent->firstname.' '.$ent->lastname.' </option>';
                                                  }
                                              ?>
                                          </select>
                                        </div> 

                                        <div class="col-md-12" style="text-align: right; padding-top: 10px">
                                          <button type="submit" name="" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>
                                        </div>

                                      </div>
                                    </form>
                                  </div>
                                  <?php endif;?>

                                </div>

                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title">Variations List </h3>
                                    <table id="example1" class="table table-striped responsive-utilities jambo_table projects">
                                      <thead>
                                          <tr class="headings">
                                              <th>Title</th>
                                              <th>Dates</th>  
                                              <th>Status</th>
                                              <th>Assigned To</th>
                                              <th>Created By</th>
                                              <th><span class="nobr">Action</span></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $vars = $this->db->select("a.*, b.firstname, b.secondname, b.lastname")
                                                  ->from('project_variations as a')
                                                  ->join('entitys as b', 'b.entity_id = a.entity_id')
                                                  ->where("a.project_id = '$data->project_id' ")
                                                  ->get()->result();
                                          foreach($vars as $var) {
                                            ?>
                                            <tr>
                                              <td><?php print $var->variation_title;?></td>
                                              <td>
                                                <?php 
                                                  print 'Start Date: '.$var->start_date.'<br/>';
                                                  print 'End Date: '.$var->end_date;
                                                ?>
                                              </td>
                                              <td>
                                                <?php 
                                                  if($var->status_id == 1) echo "<span class='badge badge-success'>Completed</span>";
                                                  elseif($var->status_id == 2) echo "<span class='badge badge-info'>Approved</span>";
                                                  elseif($var->status_id == 3) echo "<span class='badge badge-warning'>Pending</span>";
                                                  elseif($var->status_id == 4) echo "<span class='badge badge-danger'>Cancelled</span>";
                                                  elseif($var->status_id == 5) echo "<span class='badge badge-danger'>Suspended</span>";
                                                ?>
                                              </td>
                                              <td>
                                                <?php
                                                  foreach(json_decode($var->members) as $member) {
                                                      $memb = $this->db->select('profile_picture, firstname, lastname')->from('entitys')->where('entity_id', $member)->get()->row();
                                                      ?>
                                                      <li class="list-inline-item">
                                                        <!-- <img alt="<?php echo $memb->firstname?>" class="table-avatar" src="<?php echo base_url('assets/images/profile/'.$memb->profile_picture);?>"> -->
                                                        <span><?=$memb->firstname.','?></span>
                                                      </li>
                                                      <?php
                                                  }
                                                ?>
                                              </td>
                                              <td><?php print $var->firstname.' '.$var->secondname.' '.$var->lastname;?></td>
                                              <td>
                                                <?php if($CI->permissions('projects_edit')):?>
                                                <button class="btn btn-xs btn-info" onclick="get_variation('<?php echo $var->variation_id;?>')" ><span class="fa fa-edit"></span></button>
                                                <?php endif;?>
                                                <?php if($CI->permissions('projects_delete')):?>
                                                <a href="<?php echo site_url('projects/delete_variation/'.$var->variation_id);?>" class="btn btn-xs btn-danger" title="Delete" ><span class="fa fa-trash"></span></a>
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
                            </div> <!-- Variation End -->

                            <div class="tab-pane fade" id="vert-tabs-timelogs" role="tabpanel" aria-labelledby="vert-tabs-timelogs-tab">
                                <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title">Time Logs</h3>
                                      <div class="card-tools">
                                        <?php if($CI->permissions('timelogs_add')):?>
                                          <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">Add New</button>
                                        <?php endif;?>
                                      </div>
                                  </div>
                                  <!-- /.card-header -->
                                  <?php if($CI->permissions('projects_add')):?>
                                  <div class="card-body" style="display: none;">
                                    <form class="" role="form" method="post" action="<?php echo site_url('projects/add_timelog');?>" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <input type="hidden" name="project_id" value="<?php echo $data->project_id;?>" style="display: none !important;" required /> 
                                              <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                                            </div>
                                            <div class="col-md-4">
                                              <label>Employee <span class="text text-danger">*</span> </label>
                                              <select class="form-control select2" name="member" data-placeholder="Select employee" >
                                                  <option value="">~Select Employee~</option>
                                                  <?php
                                                      $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                                                      foreach($entitys as $ent) {
                                                        echo '<option value="'.$ent->entity_id.'" > '.$ent->firstname.' '.$ent->lastname.' </option>';
                                                      }
                                                  ?>
                                              </select>
                                            </div>
                                            <div class="col-md-2">
                                              <label>Start Time <span class="text text-danger">*</span> </label>
                                              <input type="time" name="start_time" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-2">
                                              <label>End Time <span class="text text-danger">*</span> </label>
                                              <input type="time" name="end_time" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-2">
                                              <label>Start Date <span class="text text-danger">*</span> </label>
                                              <input type="date" name="start_date" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-2">
                                              <label>End Date <span class="text text-danger">*</span> </label>
                                              <input type="date" name="end_date" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>Memo</label>
                                              <input type="text" maxlength="150" class="form-control" name="narrative" placeholder="Memo here..." />
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-12" style="text-align: right; padding-top: 10px">
                                          <button type="submit" name="" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>
                                        </div>

                                      </div>
                                    </form>
                                  </div>
                                  <?php endif;?>

                                </div>

                                <?php if($CI->permissions('timelogs_view')):?>
                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title">Variations List </h3>
                                    <table id="example1" class="table table-striped responsive-utilities jambo_table projects">
                                      <thead>
                                          <tr class="headings">
                                              <th>Employee</th>
                                              <th>Start Date</th>  
                                              <th>End Date</th>  
                                              <th>Hours</th>
                                              <th>Memo</th>
                                              <th><span class="nobr">Action</span></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $times = $this->db->select("a.*, b.firstname, b.secondname, b.lastname")
                                                  ->from('project_timelogs as a')
                                                  ->join('entitys as b', 'b.entity_id = a.entity_id')
                                                  ->where("a.project_id = '$data->project_id' ")
                                                  ->get()->result();
                                          foreach($times as $time) {
                                            ?>
                                            <tr>
                                              <td><?php print $time->firstname.' '.$time->secondname.' '.$time->lastname;?></td>
                                              <td><?php print $time->start_date;?></td>
                                              <td><?php print $time->end_date;?></td>
                                              <td>
                                                <?php print $time->start_time.' - '.$time->end_time; ?>
                                              </td>
                                              <td><?php print $time->narrative;?></td>
                                              <td>
                                                <?php if($CI->permissions('timelogs_edit')):?>
                                                <button class="btn btn-xs btn-info" onclick="get_timelog('<?php echo $time->timelog_id;?>')" title="View" ><span class="fa fa-edit"></span></button>
                                                <?php endif;?>
                                                <?php if($CI->permissions('timelogs_delete')):?>
                                                <a href="<?php echo site_url('projects/delete_timelog/'.$time->timelog_id);?>" class="btn btn-xs btn-danger" title="Delete" ><span class="fa fa-trash"></span></a>
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
                                <?php endif;?>
                            </div> <!-- Time logs End -->
                            
                            <div class="tab-pane fade" id="vert-tabs-files" role="tabpanel" aria-labelledby="vert-tabs-files-tab">
                                <div class="card">
                                  <div class="card-header">
                                      <h3 class="card-title">Project Files</h3>
                                      <div class="card-tools">
                                      <?php if($CI->permissions('projects_edit')):?>
                                          <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">Add New</button>
                                      <?php endif;?>
                                      </div>
                                  </div>
                                  <!-- /.card-header -->
                                  <?php if($CI->permissions('projects_edit')):?>
                                  <div class="card-body" style="display: none;">
                                    <form class="" role="form" method="post" action="<?php echo site_url('projects/add_file');?>" enctype="multipart/form-data">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <input type="hidden" name="project_id" value="<?php echo $data->project_id;?>" style="display: none !important;" required /> 
                                              <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>File Title <span class="text text-danger">*</span> </label>
                                              <input type="text" name="file_title" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>File <span class="text text-danger">*</span> </label>
                                              <input type="file" name="attachment" class="form-control" required /> 
                                            </div>
                                            <div class="col-md-12">
                                              <label>Narrative</label>
                                              <textarea maxlength="150" class="form-control" name="narrative" placeholder="Narrative here..." ></textarea>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-12" style="text-align: right; padding-top: 10px">
                                          <button type="submit" name="" class="btn btn-primary" ><span class="fa fa-save"></span> Save</button>
                                        </div>

                                      </div  >
                                    </form>
                                  </div>
                                  <?php endif;?>
                                </div>

                                <div class="card">
                                  <div class="card-body">
                                    <h3 class="card-title">File List </h3>
                                    <table id="example1" class="table table-striped responsive-utilities jambo_table projects">
                                      <thead>
                                          <tr class="headings">
                                              <th>Title</th>
                                              <th>Description</th>  
                                              <th>Created By </th>  
                                              <th>Timestamp</th>
                                              <th><span class="nobr">Action</span></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $files = $this->db->select("a.*, b.firstname, b.secondname, b.lastname")
                                                  ->from('system_files as a')
                                                  ->join('entitys as b', 'b.entity_id = a.created_by')
                                                  ->where("a.table_name = 'projects' AND a.table_id = '$data->project_id' ")
                                                  ->get()->result();
                                          foreach($files as $file) {
                                            ?>
                                            <tr>
                                              <td><?php print $file->file_title;?></td>
                                              <td><?php print $file->narrative;?></td>
                                              <td><?php print $file->firstname.' '.$file->secondname.' '.$file->lastname;?></td>
                                              <td><?php print $file->time_stamp;?></td>
                                              <td>
                                                <?php if($CI->permissions('projects_edit')):?>
                                                <button type="button" class="btn btn-xs btn-default" title="Open File" onclick="window.open('<?php echo site_url('projects/open_file/'.$file->file_id); ?>','receipt','width=700, height=800')" > <span class="fa fa-print"></span></button>
                                                <?php endif;?>
                                                <?php if($CI->permissions('projects_delete')):?>
                                                <a href="<?php echo site_url('projects/delete_file/'.$file->file_id);?>" class="btn btn-xs btn-danger" title="Delete" ><span class="fa fa-trash"></span></a>
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
                            </div> <!-- Files End -->

                            <div class="tab-pane fade" id="vert-tabs-discussion" role="tabpanel" aria-labelledby="vert-tabs-discussion-tab">
                              <h5><u>Discussion</u></h5>
                            </div> <!-- Discussion End -->

                          </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Right Side Inner Content Start -->

            </div>


        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->



    <!-- Modal Start -->
    <div id="taskdetails" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit task details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form class="" role="form" method="post" action="<?php echo site_url('projects/update_task');?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" name="task_id" id="task_id" style="display: none !important;" required /> 
                    <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                  </div>
                  <div class="col-md-12">
                    <label>Title <span class="text text-danger">*</span> </label>
                    <input type="text" name="task_title" id="task_title" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>Start Date <span class="text text-danger">*</span> </label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>End Date <span class="text text-danger">*</span> </label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>Estimated Hours </label>
                    <input type="number" name="estimated_hours" id="estimated_hours" class="form-control" /> 
                  </div>
                  <div class="col-md-6">
                      <label>Status <span class="text text-danger">*</span> </label>
                      <select class="form-control select2" name="status_id" id="status_id" required >
                          <option value="">~Select status~</option>
                          <?php
                              $status = $this->db->from('status')->get()->result(); 
                              foreach($status as $stat) echo '<option value="'.$stat->status_id.'"> '.$stat->status_name.' </option>'
                          ?>
                      </select>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <label>Description</label>
                    <textarea class="textarea" name="narrative" id="narrative" placeholder="Detailed description here..."
                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <label >Assign To:</label>
                <select class="form-control select2" name="members[]" id="members" multiple="multiple" data-placeholder="Select members" >
                    <?php
                        $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                        foreach($entitys as $ent) {
                          echo '<option value="'.$ent->entity_id.'" > '.$ent->firstname.' '.$ent->lastname.' </option>';
                        }
                    ?>
                </select>
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

    <div id="variationdetails" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit variation details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form class="" role="form" method="post" action="<?php echo site_url('projects/update_variation');?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" name="variation_id" id="variation_id" style="display: none !important;" required /> 
                    <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                  </div>
                  <div class="col-md-12">
                    <label>Title <span class="text text-danger">*</span> </label>
                    <input type="text" name="variation_title" id="variation_title" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>Start Date <span class="text text-danger">*</span> </label>
                    <input type="date" name="start_date" id="vstart_date" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>End Date <span class="text text-danger">*</span> </label>
                    <input type="date" name="end_date" id="vend_date" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>Estimated Hours </label>
                    <input type="number" name="estimated_hours" id="vestimated_hours" class="form-control" /> 
                  </div>
                  <div class="col-md-6">
                      <label>Status <span class="text text-danger">*</span> </label>
                      <select class="form-control select2" name="status_id" id="vstatus_id" required >
                          <option value="">~Select status~</option>
                          <?php
                              $status = $this->db->from('status')->get()->result(); 
                              foreach($status as $stat) echo '<option value="'.$stat->status_id.'"> '.$stat->status_name.' </option>'
                          ?>
                      </select>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <label>Description</label>
                    <textarea class="textarea" name="narrative" id="vnarrative" placeholder="Detailed description here..."
                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <label >Assign To:</label>
                <select class="form-control select2" name="members[]" id="vmembers" multiple="multiple" data-placeholder="Select members" >
                    <?php
                        $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                        foreach($entitys as $ent) {
                          echo '<option value="'.$ent->entity_id.'" > '.$ent->firstname.' '.$ent->lastname.' </option>';
                        }
                    ?>
                </select>
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

    <div id="timelogdetails" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit time-log details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form class="" role="form" method="post" action="<?php echo site_url('projects/update_timelog');?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" name="timelog_id" id="timelog_id" style="display: none !important;" required /> 
                    <input type="hidden" name="page" value="<?php echo site_url('projects/details/'.$data->project_code);?>" style="display: none !important;" required /> 
                  </div>
                  <div class="col-md-12">
                    <label>Employee <span class="text text-danger">*</span> </label>
                    <select class="form-control select2" name="member" id="member" data-placeholder="Select employee" >
                        <option value="">~Select Employee~</option>
                        <?php
                            $entitys = $this->db->from('entitys')->where('status_id',1)->get()->result(); 
                            foreach($entitys as $ent) {
                              echo '<option value="'.$ent->entity_id.'" > '.$ent->firstname.' '.$ent->lastname.' </option>';
                            }
                        ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Start Time <span class="text text-danger">*</span> </label>
                    <input type="time" name="start_time" id="start_time" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>End Time <span class="text text-danger">*</span> </label>
                    <input type="time" name="end_time" id="end_time" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>Start Date <span class="text text-danger">*</span> </label>
                    <input type="date" name="start_date" id="tstart_date" class="form-control" required /> 
                  </div>
                  <div class="col-md-6">
                    <label>End Date <span class="text text-danger">*</span> </label>
                    <input type="date" name="end_date" id="tend_date" class="form-control" required /> 
                  </div>
                  <div class="col-md-12">
                    <label>Memo </label>
                    <input type="text" maxlength="150" name="narrative" id="tnarrative" class="form-control" /> 
                  </div>
                </div>
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




  <script>
    function get_tasks(id) {
      //get project task
      $.ajax({
            url: '<?php echo site_url();?>projects/get_tasks', //this is the submit URL
            type: 'POST',
            data: { data : id },
            success: function(data){
                console.log("Response: " + data);
                var obj = JSON.parse(data);
                if(obj.resp == '1') {
                    $("#task_id").val(obj.task_id);
                    $("#project_id").val(obj.project_id);
                    $("#task_title").val(obj.task_title);
                    //$("#org_id").val(obj.org_id).change;
                    $("#status_id").val(obj.status_id).change;
                    $("#start_date").val(obj.start_date);
                    $("#end_date").val(obj.end_date);
                    $("#estimated_hours").val(obj.estimated_hours);
                    $("#members").val(obj.members).change;
                    $("#narrative").val(obj.narrative);

                    // if(obj.active == '1') {
                    //     $('#active')[0].checked = true;
                    // } else { $('#active')[0].checked = false; }

                    $("#taskdetails").modal("show");
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

    function get_variation(id) {
      //get project variation
      $.ajax({
          url: '<?php echo site_url();?>projects/get_variation', //this is the submit URL
          type: 'POST',
          data: { data : id },
          success: function(data){
              console.log("Response: " + data);
              var obj = JSON.parse(data);
              if(obj.resp == '1') {
                  $("#variation_id").val(obj.variation_id);
                  $("#variation_title").val(obj.variation_title);
                  //$("#org_id").val(obj.org_id).change;
                  $("#vstatus_id").val(obj.status_id).change;
                  $("#vstart_date").val(obj.start_date);
                  $("#vend_date").val(obj.end_date);
                  $("#vestimated_hours").val(obj.estimated_hours);
                  $("#vmembers").val(obj.members).change;
                  $("#vnarrative").val(obj.narrative);

                  $("#variationdetails").modal("show");
              } else {
                  swal({
                  icon: 'error',
                  title: 'Failed',
                  text: obj.message
                  });
              }
              //action_buttons
                  
          }
      }); //end 
    } 

    function get_timelog(id) {
      //get project timelog
      $.ajax({
          url: '<?php echo site_url();?>projects/get_timelog', //this is the submit URL
          type: 'POST',
          data: { data : id },
          success: function(data){
              console.log("Response: " + data);
              var obj = JSON.parse(data);
              if(obj.resp == '1') {
                  $("#timelog_id").val(obj.timelog_id);
                  $("#member").val(obj.member).change;
                  $("#start_time").val(obj.start_time);
                  $("#end_time").val(obj.end_time);
                  $("#tstart_date").val(obj.start_date);
                  $("#tend_date").val(obj.end_date);
                  $("#tnarrative").val(obj.narrative);

                  $("#timelogdetails").modal("show");
              } else {
                  swal({
                  icon: 'error',
                  title: 'Failed',
                  text: obj.message
                  });
              }
              //action_buttons
                  
          }
      }); //end timelog
    } 
  </script>














