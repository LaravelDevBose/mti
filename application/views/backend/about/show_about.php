<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active"><?= ucwords($type) ?></li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display"><?= ucwords($type) ?></h1>
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


          <div class="card-body">
            <?php echo form_open_multipart('UpdateAbout/'.$aboutFetchData->about_id.'/'.$aboutFetchData->about_image_path,['class'=>'form-horizontal']);?>
              
              <input type="hidden" name="type" value="<?= $type; ?>">
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">About Title</label>
                <div class="col-sm-10">
                  <?php 
                  $about_title = array(
                    'name'          => 'about_title',
                    'class'         => 'form-control',
                    'value'         => set_value('about_title',$aboutFetchData->about_title),  
                  );

                  echo form_input($about_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('about_title')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">About Description</label>
                <div class="col-sm-10" id="froala-editor">
                  <?php 
                  $about_des = array(
                    'name'          => 'about_des',
                    'id'            => 'about_des',   
                    'class'         => 'form-control',
                    'value'         => set_value('about_des',strip_tags($aboutFetchData->about_des))
                  );

                  echo form_textarea($about_des);
                  ?>
                  <script>
                    CKEDITOR.replace('about_des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('about_des')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Image (435 X 400)</label>
                <div class="col-sm-8">
                  <?php 
                  $about_image = array(
                    'name'          => 'about_image',
                    'class'         => 'form-control-file product_img',
                    'value'         => set_value('about_image'), 
                  );

                  echo form_upload($about_image);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error; ?>
                  </span>
                </div>
                <div class="col-sm-2">
                     <?php if(! is_null($aboutFetchData->about_image_path)):?>
                    <img src="<?php echo base_url('uploads/about/'.$aboutFetchData->about_image_path)?>" height=100 width=100>
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
        </div>
      </div>
    </div>
  </div>
</section>

