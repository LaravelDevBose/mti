<div class="breadcrumb-holder">
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url()?>Dashboard">Home</a></li>
      <li class="breadcrumb-item active">Header Note</li>
    </ul>
  </div>
</div>

<!-- Menu Create start -->

<section class="forms">
  <div class="container-fluid">
    <!-- Page Header-->
    <header> 
      <h1 class="h3 display">Header Note</h1>
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
            <?php echo form_open('UpdateNote',['class'=>'form-horizontal']);?>
              
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Note Position</label>
                <div class="col-sm-10 mb-3">

                  <select name="position" id="position" class="form-control">
                    <option value="">---Select One---</option>
                    <option value="welcome">Welcome</option>
                    <option value="company">Company</option>
                    <option value="products">Products</option>
                    <option value="awards">Awards</option>
                    <option value="seller">Top Seller</option>
                    
                  </select>

                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('role_id')?>
                  </span>
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-sm-2 form-control-label">Note Description</label>
                <div class="col-sm-10" id="froala-editor">
                  <?php 
                  $note_des = array(
                    'name'          => 'note_des',
                    'id'            => 'note_des',   
                    'class'         => 'form-control',
                    'value'         => set_value('note_des')
                  );

                  echo form_textarea($note_des);
                  ?>
                  <script>
                    CKEDITOR.replace('note_des');
                  </script>
                  <span class="text-small text-gray help-block-none">
                    <?php echo form_error('note_des')?>
                  </span>
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


<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>List Of Header</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Header Position</th>
                    <th>Header Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; if(is_array($noteFetchData)):
                        foreach ($noteFetchData as $data):?>
                  <tr>
                    <th scope="row"><?php echo $i++;?></th>
                    <td><?php echo $data->note_position?></td>
                    <td><?php echo $data->note_des?></td>
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

