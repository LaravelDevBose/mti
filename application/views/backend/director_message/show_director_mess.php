<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Director Message</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Director Message</h1>
    </header>
    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4>Update</h4>
          </div>

          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>

          <?php if(isset($allFetchData)): ?>
          <div class="card-body">
            <?php echo form_open_multipart('UpdateDirector/'.$allFetchData->director_id.'/'.$allFetchData->director_image_path,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Title</label>
                <div class="col-sm-10">
                  <?php 
                  $director_title = array(
                    'name'          => 'director_title',
                    'class'         => 'form-control',
                    'value'         => set_value('director_title',$allFetchData->director_title),  
                  );

                  echo form_input($director_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('director_title')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Message</label>
                <div class="col-sm-10" id="froala-editor">
                  <?php 
                  $director_des = array(
                    'name'          => 'director_des',
                    'id'            => 'director_des',   
                    'class'         => 'form-control',
                    'value'         => set_value('director_des',strip_tags($allFetchData->director_des))
                  );

                  echo form_textarea($director_des);
                  ?>
                  <script>
                    CKEDITOR.replace('director_des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('director_des')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Image (435 X 400)</label>
                <div class="col-sm-8">
                  <?php 
                  $director_image = array(
                    'name'          => 'director_image',
                    'class'         => 'form-control product_img',
                    'value'         => set_value('director_image'), 
                  );

                  echo form_upload($director_image);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error; ?>
                  </span>
                </div>
                <div class="col-sm-2">
                     <?php if(! is_null($allFetchData->director_image_path)):?>
                    <img src="<?php echo base_url('uploads/director/'.$allFetchData->director_image_path)?>" height=100 width=100>
                      <?php endif;?>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-4 offset-sm-2">


                  <?php
                  $submit = array(
                    'name'          => 'submit',
                    'class'         => 'btn btn-primary',
                    'value'         => 'Update', 
                  );

                  echo form_submit($submit);
                  ?>
                </div>
              </div>

           <?php echo  form_close();?>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

