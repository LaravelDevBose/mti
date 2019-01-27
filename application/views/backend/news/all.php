<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">News</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">News</h1>
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
            <?php echo form_open_multipart('CreateNews',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">News Title</label>
                <div class="col-sm-10">
                  <?php 
                  $news_title = array(
                    'name'          => 'news_title',
                    'class'         => 'form-control',
                    'value'         => set_value('news_title'),  
                  );

                  echo form_input($news_title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('news_title')?>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Service Description</label>
                <div class="col-sm-10">
                  <?php 
                  $news_des = array(
                    'name'          => 'news_des',
                    'id'          => 'news_des',
                    'class'         => 'form-control',
                    'value'         => set_value('news_des'),  
                  );

                  echo form_textarea($news_des);
                  ?>
                   <script>
                    CKEDITOR.replace('news_des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('news_des')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Image (754 X 307)</label>
                <div class="col-sm-10">
                  <?php 
                  $news_img = array(
                    'name'          => 'news_img',
                    'class'         => 'form-control product_img',
                    // 'required'      => 'required',
                    'value'         => set_value('news_img'), 
                  );

                  echo form_upload($news_img);
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
            <h4>All News</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
  
                   if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->news_id?></th>
                    <td>
                      <img src="<?= base_url('/uploads/news/'.$data->news_image_path)?>" alt="" height=100 width=100>
                    </td>
                    
                    <td><?php echo $data->news_title?></td>
                    <td>
                    
                      <?php echo $this->Newsmodel->readMoreHelper($data->news_des,20)?>
                      <a target="_blank" href="<?php echo base_url().'ReadMore/'.$data->news_id ?>">read more...</a> 
                        
                    </td>
                    <td><?php
                          $date = strtotime($data->created_at);
                          echo date('jS F Y, g:ia',$date);
                        ?>
                    </td>
                    <td><?php
                          $date = strtotime($data->updated_at);
                          echo date('jS F Y, g:ia',$date);
                        ?>        
                    </td>
                    <td>
                      <a href="<?php echo base_url(); ?>EditNews/<?php echo $data->news_id; ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url(); ?>DeleteNews/<?php echo $data->news_id; ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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