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
            <h4>Update News</h4>
          </div>

          <?php if($feedback = $this->session->flashdata('feedback')):
           $feedback_class = $this->session->flashdata('feedback_class');
          ?>
          <div class="alert <?= $feedback_class?>">
            <?= $feedback; ?>
          </div>
        <?php endif;?>


          <div class="card-body">
            <?php echo form_open_multipart('UpdateNews/'.$allFetchData->news_id.'/'.$allFetchData->news_image_path,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">News Title</label>
                <div class="col-sm-10">
                  <?php 
                  $news_title = array(
                    'name'          => 'news_title',
                    'class'         => 'form-control',
                    'value'         => set_value('news_title',$allFetchData->news_title)
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
                    'value'         => set_value('news_des',strip_tags($allFetchData->news_des)) 
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
                <div class="col-sm-8">
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
                <div class="col-sm-2">
                  <img src="<?= base_url('/uploads/news/'.$allFetchData->news_image_path)?>" alt=""
                  height=100 width=100>
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
