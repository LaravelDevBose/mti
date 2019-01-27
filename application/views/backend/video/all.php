<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Video</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">New Video</h1>
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
            <?php echo form_open('CreateVideo',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Title</label>
                <div class="col-sm-10">
                  <?php 
                  $video_title = array(
                    'name'          => 'video_title',
                    'class'         => 'form-control',
                    'value'         => set_value('video_title'),  
                  );

                  echo form_input($video_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('video_title')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Embeded Link</label>
                <div class="col-sm-10">
                  <?php 
                  $video_des = array(
                    'name'          => 'video_des',
                    'id'          => 'video_des',
                    'class'         => 'form-control',
                    'value'         => set_value('video_des'),  
                  );

                  echo form_textarea($video_des);
                  ?>
                   <script>
                    //CKEDITOR.replace('video_des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('video_des')?>
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
            <h4>All Video</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Video</th>
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->video_id?></th>
                    <td><?php echo $data->video_title?></td>
                    <td>
                      <iframe width="250" height="250" src="<?= $data->video_des ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </td>

                    <td>
                      <a href="<?php echo base_url(); ?>EditVideo/<?php echo $data->video_id; ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url(); ?>DeleteVideo/<?php echo $data->video_id; ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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