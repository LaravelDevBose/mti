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
            <?php echo form_open_multipart('CreateGallery',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Title</label>
                <div class="col-sm-10">
                  <?php 
                  $gallery_title = array(
                    'name'          => 'gallery_title',
                    'required'      => 'required',
                    'class'         => 'form-control',
                    'value'         => set_value('gallery_title'),  
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
                      <select name="gallery_type" id="gallery_type" class="form-control  ">
                          <option value="image">Image</option>
                          <option value="video">Video</option>
                      </select>
                      <span class="text-small text-gray help-block-none">
                    <?php echo form_error('gallery_title')?>
                  </span>
                  </div>
              </div>

              <div class="form-group row" id="video" style="display: none;">
                  <label class="col-sm-2 form-control-label">Video Link</label>
                  <div class="col-sm-10">
                      <input type="text" name="gallery_image_path" id="video_path" class="form-control">
                      <span class="text-small text-gray help-block-none">
                    <?php echo form_error('gallery_title')?>
                  </span>
                  </div>
              </div>

              <div class="form-group row" id="image">
                <label class="col-sm-2 form-control-label">Image (640 X 480)</label>
                <div class="col-sm-10">
                  <?php 
                  $gallery_image = array(
                    'name'          => 'gallery_image',
                    'class'         => 'form-control-file product_img',
                    'id'            =>'image_path',
                    // 'required'      => 'required',
                    'value'         => set_value('gallery_image'), 
                  );

                  echo form_upload($gallery_image);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php if(isset($error)) echo $error;?>
                  </span>
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



<!-- Menu Table start --><!-- Menu Table start --><!-- Menu Table start -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>All Gallery</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->gallery_id?></th>
                      <?php if($data->gallery_type == 'image'):?>
                    <td>
                      <?php if(! is_null($data->gallery_image_path)):?>
                    <img src="<?php echo base_url('uploads/'.$data->gallery_image_path)?>" height=100 width=100>
                      <?php endif;?>
                    </td>
                      <?php else: ?>
                          <td>
                              <?php if(! is_null($data->gallery_image_path)):?>
                                  <iframe width="100" height="100" src="<?php echo $data->gallery_image_path?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <?php endif;?>
                          </td>
                      <?php endif;?>

                    <td><?php echo $data->gallery_title?></td>

                    <td>
                      <a href="<?php echo base_url(); ?>EditGallery/<?php echo $data->gallery_id; ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url(); ?>DeleteGallery/<?php echo $data->gallery_id; ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                    </td>
                  </tr>

                  <?php endforeach;?>
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

