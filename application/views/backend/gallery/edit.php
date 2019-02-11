<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Gallery</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Gallery</h1>
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
            <?php echo form_open_multipart('UpdateGallery/'.$allFetchData->gallery_id,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Title</label>
                <div class="col-sm-10">
                  <?php 
                  $gallery_title = array(
                    'name'          => 'gallery_title',
                    'required'      => 'required',
                    'class'         => 'form-control',
                    'value'         => set_value('gallery_title',$allFetchData->gallery_title),  
                  );

                  echo form_input($gallery_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('gallery_title')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                  <label class="col-sm-2 form-control-label">Gallery Type</label>
                  <div class="col-sm-10">
                      <select name="gallery_type" id="gallery_type" class="form-control" readonly>
                          <?php if($allFetchData->gallery_type == 'image'){?>
                          <option value="image" >Image</option>
                          <?php }else{?>
                          <option value="video" >Video</option>
                          <?php }?>
                      </select>
                      <span class="text-small text-gray help-block-none">
                    <?php echo form_error('gallery_title')?>
                  </span>
                  </div>
              </div>
                <?php if($allFetchData->gallery_type == 'video'){?>
              <div class="form-group row" id="video" >
                  <label class="col-sm-2 form-control-label">Video Link</label>
                  <div class="col-sm-10">
                      <input type="text" name="gallery_image_path" value="<?= $allFetchData->gallery_image_path ?>" id="video_path" class="form-control">
                      <span class="text-small text-gray help-block-none">
                    <?php echo form_error('gallery_title')?>
                  </span>
                  </div>
              </div>
                <?php }else{?>
              <div class="form-group row" id="image">
                <label class="col-sm-2 form-control-label">Image (640 X 480)</label>
                <div class="col-sm-8">
                  <?php 
                  $gallery_image = array(
                    'name'          => 'gallery_image',
                    'class'         => 'form-control product_img',
                    'value'         => set_value('gallery_image',$allFetchData->gallery_image_path)
                  );

                  echo form_upload($gallery_image);
                  ?>

                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error;?>
                  </span>
                </div>
                  <input type="hidden" name="old_path" value="<?= $allFetchData->gallery_image_path?>">
                <div class="col-sm-2">
                  
                <img src="<?php echo base_url('uploads/'.$allFetchData->gallery_image_path)?>" height=100 width=100> 
                </div>
              </div>
              <?php }?>

              
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

