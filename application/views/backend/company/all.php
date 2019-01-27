
<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Company</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">New Company</h1>
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
            <?php echo form_open_multipart($this->create,['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Company Title</label>
                <div class="col-sm-10">
                  <?php 
                  $title = array(
                    'name'          => 'title',
                    'class'         => 'form-control',
                    'value'         => set_value('title'),  
                  );

                  echo form_input($title);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('title')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Web URL</label>
                <div class="col-sm-10">
                  <?php 
                  $url = array(
                    'name'          => 'url',
                    'class'         => 'form-control',
                    'value'         => set_value('url'),  
                  );

                  echo form_input($url);
                  ?>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('url')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Company Description</label>
                <div class="col-sm-10">
                  <?php 
                  $des = array(
                    'name'          => 'des',
                    'id'          => 'des',
                    'class'         => 'form-control',
                    'value'         => set_value('des'),  
                  );

                  echo form_textarea($des);
                  ?>
                   <script>
                    CKEDITOR.replace('des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('des')?>
                  </span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Logo (100 X 100)</label>
                <div class="col-sm-10">
                  <?php 
                  $img = array(
                    'name'          => 'img',
                    'class'         => 'form-control product_img',
                    // 'required'      => 'required',
                    'value'         => set_value('img'), 
                  );

                  echo form_upload($img);
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
            <h4>All Company</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th>Edit|Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($allFetchData)):
                        foreach ($allFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $data->id?></th>

                    <td>
                      <?php if(! is_null($data->img)):?>
                    <img src="<?php echo base_url('uploads/company/'.$data->img)?>" height=50 width=50>
                      <?php endif;?>
                    </td>

                    <td><?php echo $data->title?></td>
                    <td><a target="_blank" href="http://<?php echo $data->url?>"><?php echo $data->url?></a></td>
                    <td><?php echo substr($data->des,0,30)?> 
                      <a href="<?= base_url('Company/'.$data->id.'/Products')?>">read more...</a>
                    </td>

                    <td>
                      <a href="<?php echo base_url($this->edit.'/'.$data->id); ?>" class="btn btn-success btn-sm" d ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a onclick="return confirm('Are you sure to delete ? ')" href="<?php echo base_url($this->delete.'/'.$data->id); ?>"  title="Delete This"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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