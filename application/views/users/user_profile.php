<?php $id_get = (int)$this->session->id ;
      $user_index = array_search($id_get,array_column($user_array,'id')) ;?>
<?php echo form_open_multipart(('user/edit_user/').$id_get); ?>
<div class="container" style="font-size: 1.25em">
  <form enctype="multipart/form-data" method="post">
      <input type="number" hidden name="id" value="<?php echo $id_get = (int)$this->session->id?>">
      <div class="row">
        <div class="col-sm-3">
          <?php if (empty($this->session->profile_picture)): ?>
          <img src="<?php echo base_url().'profile_gallery/empty_profile.jpg'?>" width="200px" height="200px" alt="Profile Picture">
          <?php endif; ?>
          <?php if (!empty($this->session->profile_picture)): ?>
          <img src="<?php echo base_url().'profile_gallery/'.$user_array[$user_index]['profile_picture']?>" width="200px" height="200px" alt="Profile Picture">
          <?php endif; ?>
            <br><br>
            <input type="file" name="profile_picture" value="">
        </div>
        <div class="col-sm-9">
          <div class="row">
              <div class="col-sm-4" style="text-align:right">
                  <label for="">First Name</label>
              </div>
              <div class="col-sm-4">
                  <input type="text" name="firstname" value="<?php echo $user_array[$user_index]['firstname']?>">
              </div>
              <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">Last Name</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="lastname" value="<?php echo $user_array[$user_index]['lastname']?>">
            </div>
            <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">Birthdate</label>
            </div>
            <div class="col-sm-4">
                <input type="date" name="birthdate" value="<?php echo $user_array[$user_index]['birthdate']?>">
            </div>
            <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">Phone number</label>
            </div>
            <div class="col-sm-4">
                <input type="number" name="phone" value="<?php echo $user_array[$user_index]['phone']?>">
            </div>
            <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">Country</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="country" value="<?php echo $user_array[$user_index]['country']?>">
            </div>
            <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">City</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="city" value="<?php echo $user_array[$user_index]['city']?>">
            </div>
            <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">Street</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="street" value="<?php echo $user_array[$user_index]['street']?>">
            </div>
            <br><br>
          </div>
          <div class="row">
            <div class="col-sm-4" style="text-align:right">
                <label for="">Postal Code</label>
            </div>
            <div class="col-sm-4">
                <input type="text" name="postalcode" value="<?php echo $user_array[$user_index]['postalcode']?>">
                <br><br>
                <input type="submit" class="btn btn-info" name="submit" value="UPDATE">
            </div>
          </div>
        </div>
      </div>
  </form>
</div>
