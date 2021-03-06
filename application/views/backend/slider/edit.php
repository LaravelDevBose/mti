<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Slider</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Slider</h1>
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
            <?php echo form_open_multipart('UpdateSlider/'.$allFetchData->slider_id.'/'.$allFetchData->slider_image_path,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Title</label>
                <div class="col-sm-10">
                  <?php 
                  $slider_title = array(
                    'name'          => 'slider_title',
                    // 'required'      => 'required',
                    'class'         => 'form-control',
                    'value'         => set_value('slider_title',$allFetchData->slider_title),  
                  );

                  echo form_input($slider_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('slider_title')?>
                  </span>
                </div>
              </div>

               <div class="form-group row" style="display: none;">
                <label class="col-sm-2 form-control-label">Tag</label>
                <div class="col-sm-10">
                  <?php 
                  $slider_tag = array(
                    'name'          => 'slider_tag',
                    // 'required'      => 'required',
                    'class'         => 'form-control',
                    'value'         => set_value('slider_tag',$allFetchData->slider_tag),  
                  );

                  echo form_input($slider_tag);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('slider_tag')?>
                  </span>
                </div>
              </div>


              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Image (1920 X 900)</label>
                <div class="col-sm-8">
                  <?php 
                  $slider_image = array(
                    'name'          => 'slider_image',
                    'class'         => 'form-control product_img',
                    // 'required'      => 'required',
                    'value'         => set_value('slider_image'), 
                  );

                  echo form_upload($slider_image);
                  ?> 
                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error;?>
                  </span>
                </div>

                <div class="col-sm-2">
                 <img src="<?php echo base_url('uploads/slider/'.$allFetchData->slider_image_path)?>" height=100 width=100> 
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