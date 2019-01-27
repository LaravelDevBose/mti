<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Team</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Team</h1>
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
            <?php echo form_open_multipart('Team/Update/'.$allFetchData->team_id.'/'.$allFetchData->team_image,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Name</label>
                <div class="col-sm-10">
                  <?php 
                  $team_name = array(
                    'name'          => 'team_name',
                    'required'      => 'required',
                    'class'         => 'form-control',
                    'value'         => set_value('team_name',$allFetchData->team_name),  
                  );

                  echo form_input($team_name);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('team_name')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Designation</label>
                <div class="col-sm-10">
                  <?php 
                  $team_designation = array(
                    'name'          => 'team_designation',
                    'required'      => 'required',
                    'class'         => 'form-control',
                    'value'         => set_value('team_designation',$allFetchData->team_designation),  
                  );

                  echo form_input($team_designation);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('team_designation')?>
                  </span>
                </div>
              </div>


              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Image</label>
                <div class="col-sm-8">
                  <?php 
                  $team_image = array(
                    'name'          => 'team_image',
                    'class'         => 'form-control product_img',
                    // 'required'      => 'required',
                    'value'         => set_value('team_image'), 
                  );

                  echo form_upload($team_image);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error;?>
                  </span>
                </div>
                <div class="col-sm-2">
                   <img src="<?php echo base_url('uploads/team/'.$allFetchData->team_image)?>" height=150 width=150 >
                </div>
              </div>


              
              <div class="form-group row">
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
