<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Update</h1>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4>Update User</h4>
          </div>


          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>


          <div class="card-body">
            <?php echo form_open('UpdateUser/'.$userFetchData->user_id,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">First Name</label>
                <div class="col-sm-10">
                  <?php 
                  $first_name = array(
                    'name'          => 'first_name',
                    'class'         => 'form-control',
                    'value'         => set_value('first_name',$userFetchData->first_name),  
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
                    'value'         => set_value('last_name',$userFetchData->last_name),
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
                    'value'         => set_value('user_name',$userFetchData->user_name),
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
                    'value'         => set_value('user_email',$userFetchData->user_email),
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
                    <option value="<?php echo $userFetchData->role_id;?>">
                        <?php echo $userFetchData->role_name;?>
                    </option>
                    <?php 
                      $allRoles = $this->Rolemodel->not_get_this_role_ByID($userFetchData->role_id);
                      if (isset($allRoles)):
                      foreach($allRoles as $role):?>
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


             <!--  <div class="form-group row">
                <label class="col-sm-2 form-control-label">Active Status</label>
                <div class="col-sm-10 mb-3">
                  <select name="is_active" class="form-control">
                    <?php 
                    	//if($userFetchData->is_active == 0):?>
                    	<option value="0"<?php //echo set_select('is_active','',TRUE); ?> >Not Active</option>
                    	<option value="1"<?php //echo set_select('is_active'); ?> >Active</option>
                    	<?php //else:?>
                    	<option value="1"<?php //echo set_select('is_active','',TRUE); ?> >Active</option>
                    	<option value="0"<?php //echo set_select('is_active'); ?> >Not Active</option>
                    <?php //endif;?>
                  </select>
                </div>
              </div> -->
              <div class="form-group row user-btn-cls">
                <div class="col-sm-4 offset-sm-2">


                  <?php 

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