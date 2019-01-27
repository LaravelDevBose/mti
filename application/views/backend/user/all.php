<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Users</li>
    </ul>
  </div>
</div>

<!-- User Create start -->
<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">New User</h1>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4>Create New</h4>
          </div>

          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>


          <div class="card-body">
            <?php echo form_open('CreateUser',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">First Name</label>
                <div class="col-sm-10">
                  <?php 
                  $first_name = array(
                    'name'          => 'first_name',
                    'class'         => 'form-control',
                    'value'         => set_value('first_name'),  
                  );

                  echo form_input($first_name);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('first_name')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Last Name</label>
                <div class="col-sm-10">
                  <?php 
                  $last_name = array(
                    'name'          => 'last_name',
                    'class'         => 'form-control',
                    'value'         => set_value('last_name'),
                  );

                  echo form_input($last_name);
                  ?>

                   <span class="text-small text-gray help-block-none">
                    <?php echo form_error('last_name')?>
                  </span> 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Username</label>
                <div class="col-sm-10">
                  <?php 
                  $user_name = array(
                    'name'          => 'user_name',
                    'class'         => 'form-control',
                    'value'         => set_value('user_name'),
                  );

                  echo form_input($user_name);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('user_name')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Email</label>
                <div class="col-sm-10">
                  <?php 
                  $user_email = array(
                    'name'          => 'user_email',
                    'class'         => 'form-control',
                    'value'         => set_value('user_email'),
                  );

                  echo form_input($user_email);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('user_email')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Password</label>
                <div class="col-sm-10">
                  <?php 
                  $user_password = array(
                    'name'          => 'user_password',
                    'class'         => 'form-control',
                    'value'         => set_value('user_password'),
                  );

                  echo form_password($user_password);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('user_password')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Role Type</label>
                <div class="col-sm-10 mb-3">

                  <select name="role_id" class="form-control">
                    <option value="">---Select One---</option>
                    <?php 
                      if (isset($roles)):
                        foreach($roles as $role):?>

                    <option value="<?php echo $role->role_id;?>">
                                   <?php echo $role->role_name;?>
                    </option>

                        <?php endforeach;?>
                      <?php endif;?>
                  </select>

                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('role_id')?>
                  </span>
                </div>
              </div> 
              <!-- <div class="form-group row">
                <label class="col-sm-2 form-control-label">Active Status</label>
                <div class="col-sm-10 mb-3">
                  <select name="is_active" class="form-control">
                    
                    <option value="0"<?php// echo set_select('is_active','',TRUE); ?> >Not Active</option>
                    <option value="1"<?php// echo set_select('is_active'); ?> >Active</option>

                  </select>
                </div>
              </div> -->
              <div class="form-group row user-btn-cls">
                <div class="col-sm-4 offset-sm-2">


                  <?php 
                  $reset = array(
                    'name'          => 'reset',
                    'class'         => 'btn btn-secondary',
                    'value'         => 'Reset', 
                  );

                  echo form_reset($reset);

                  $submit = array(
                    'name'          => 'submit',
                    'class'         => 'btn btn-primary',
                    'value'         => 'Save', 
                  );

                  echo form_submit($submit);
                  ?>
                </div>
              </div>
           <?php echo  form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- User Table start --><!-- User Table start --><!-- User Table start -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>All Users</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <!-- <th>Status</th>
                    <th>Created At</th> -->
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->user_id?></th>
                    <td><?php echo $data->first_name?></td>
                    <td><?php echo $data->last_name?></td>
                    <td><?php echo $data->user_name?></td>
                    <td><?php echo $data->user_email?></td>
                    <td><?php  echo $data->role_name;?></td>
                    
                    <!-- <td><?php //echo $data->is_active == 1? 'Active' : 'Not Active' ?></td>-->
                    <!-- <td><?php 
                          //$date = strtotime($data->created_at);
                        //  echo date('jS F Y, g:ia',$date);
                        ?>      
                    </td>  -->
                    <td>
                      <a href="<?php echo base_url(); ?>EditUser/<?php echo $data->user_id; ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <?php if($this->session->userdata('user_id') != $data->user_id ) :?>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url(); ?>DeleteUser/<?php echo $data->user_id; ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      <?php endif; ?>

                    </td>
                  </tr>

                  <?php endforeach;?>
                  <?php else: ?>
                    <tr>
                      <td colspan="9"> No Record Found!</td>
                    </tr>
                <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>