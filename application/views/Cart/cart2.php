

<div class="container" style="margin-top:80px;">
  <ul class="breadcrumb">
    <li><a href="<?php echo site_url('reserve/reserves/'.$cars[0]['carID']);?>">Booking details</li></a>
    <li class="active">Identity prove</li>
    <li>Confirm payment</li>
  </ul>
</div>
<div class="container" style="box-shadow:0px 5px 10px;padding: 15px;">
  <!--Open row-->
  <div class="row">
      <div class="col-sm-6">
        <?php
        $data['temporaryData'] = $this->search_model->get_temporary() ;
        $data['page']='cart/cart5';
        $this->load->view('cart/cart5',$data);?>
      </div>
      <!--Right Panel Price display-->
      <?php echo form_open_multipart('cart/ConfirmPayment/'.$cars[0]['carID']); ?>
      <form  method="post" enctype="multipart/form-data">
      <div class="col-sm-6">
            <!--upload-->
            <div class="col-sm-12 text-center">
                <h2>Driver license attachment</h2>
            </div>
            <div class="col-sm-12">
                <h4>Please attach below pickture of your driving license.
                This is to double check when you check-in with host</h4>
            </div>

            <div class="col-sm-12">

                  <input type="file" name="driving_license" id="fileToUpload">

            </div>
            <!--End upload-->
            <div class="col-sm-12 text-center">
                <h3>Message to Host</h3>
            </div>
            <div class="col-sm-12 text-left">
                <h4>Say 'hi' to host and tell a little bit about yourself
                as well as reason for you coming</h4>
            </div>
            <div class="col-sm-12" >
                <textarea rows="4" cols="50" name="comment" form="usrform"></textarea>
            </div>
        </div>
        <!--End Right Panel-->
        <div class="col-sm-12 text-left" style="padding-top:20px;">
            <a href="<?php echo site_url('reserve/reserves/'.$cars[0]['carID']);?>" type="button" class="btn btn-primary" >Back</a>
            <input class="btn btn-primary" type="submit" name="submit" value="Continue">
        </div>
        </form>
  <!--End row-->

</div>
<hr>
