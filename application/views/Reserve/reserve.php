
<!--              Instruction              -->
<!-- Modal -->
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Instruction</h4>
        </div>
        <div class="modal-body">

                  <div class="text-center">
                    <h1>Welcome to Engine4u</h1>
                  </div>
                  <hr>
                  <div>
                    <h4>FOR CUSTOMER</h4><br>
                    <p>To rent a car, you need:</p>
                    <p>1. Login to the system</p>
                    <p>2. Provide searching criterias</p>
                    <p>3. Provide exact your identity and credit car information</p>
                    <p>4. Confirm booking</p>
                  </div>
                  <hr>
                  <div>
                    <h4>FOR HOST</h4><br>
                    <p>To give a car for rent, you need:</p>
                    <p>1. Login to the system</p>
                    <p>2. Add listing</p>
                    <p>3. Equip your listing with details</p>
                    <p>4. Publish your listing</p>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>
<!--End Instruction-->

<div class="container" style="border-radius: 2%;margin-top:80px;padding:20px;box-shadow:0px 10px 15px 0px;">
  <h1>Reservation</h1>
  <?php if(!empty($calendar[0]['start_date'])){ ?>
  <input type="date"  id="start_d" value="<?php echo ($calendar[0]['start_date']); ?>"/>
  <input type="date"  id="end_d" value="<?php echo ($calendar[0]['end_date']); ?>"/>
  <?php } ?>


  <script>
      $(function xxxx() {
      $('#datetimepicker_checkin').datetimepicker({
                  useCurrent: false ,
                  format: 'YYYY-MM-DD',
                  // $('#datetimepicker_checkin').mindate($('#start_d.value'));
              });
      $('#datetimepicker_checkout').datetimepicker({
          useCurrent: false ,
          format: 'YYYY-MM-DD'  //Important! See issue #1075
      });
      $("#datetimepicker_checkin").on("dp.change", function (e) {
          $('#datetimepicker_checkin').data("DateTimePicker").minDate(start_d.value);
          $('#datetimepicker_checkout').data("DateTimePicker").minDate(e.date);
          $('#datetimepicker_checkout').data("DateTimePicker").maxDate(end_d.value);
          $('#datetimepicker_checkin').data("DateTimePicker").maxDate(end_d.value);
      });
      });
     function countingDate(){
        var s_d = Date.parse(chkin.value) ;
        var e_d = Date.parse(chkout.value) ;
        var minute = 1000 *60 ;
        var hour = minute * 60 ;
        var day = hour * 24 ;
        // console.log(e_d-s_d) ;
        var d = Math.round( (e_d - s_d)/ day) ;
        var base_price =(document.getElementById('price').value) ;
        // console.log(base_price) ;
        var total = d*base_price ;
        document.getElementById('totalprices').value = total ;
      };
  </script>
    <!--MAIN contain for reserve-->


        <!--Left Panel-->
        <div class="col-sm-6">
          <form action="<?php echo site_url('reserve/identity/'.$cars[0]['carID']);?>" method="post">
          <input type="number" hidden name="carID" value="<?php echo $cars[0]['carID']?>">
          <div class="row">
          <!--Check in-->
            <div class="col-sm-6">

              <tr>
              <td><label for="">CHECK-IN</label></td>
                  <td>
                      <div class='input-group date' id='datetimepicker_checkin'>
                          <input type='text' id="chkin" class="form-control" name="check_in"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar" ></span>
                        </span>
                    </div>
                </td>
              </tr>
            </div>

          <!--Check out-->
            <div class="col-sm-6">
              <tr>
                <td><label for="">CHECK-OUT</label></td>
                <td>
                  <div class='input-group date' id='datetimepicker_checkout'>
                      <input type='text' id="chkout" class="form-control" name="check_out"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar" onclick="countingDate()"></span>
                      </span>
                  </div>
                </td>
              </tr>
            </div>
          <!--Total Price-->
            <div class="col-sm-12">
              <label for="">Click here to see total price</label>
              <span class="glyphicon glyphicon-calendar" onclick="countingDate()"></span>

              <div style="font-size: 22px;background-color:silver;box-shadow:4px 6px 10px gray; border-radius:5px;width: 300px;margin:auto;">
                <input type="number" disabled name="totalprices" id="totalprices" class="text-center">
              </div>
            </div>
            <div class="col-sm-12 text-center" >
              <?php if(empty($this->session->id)){ ?>
                <a href="<?php echo site_url('user/login');?>"type="button" class=" btn btn-primary ">RESERVE</a>
              <?php } ?>
              <?php if($this->session->id){ ?>
                <input type="submit" class="btn btn-primary" name="submit" value="RESERVE">
              <?php } ?>
            </div>
            </form>
            <div class="col-sm-12" style="margin-top: 50px;height:300px;overflow-y: scroll;">
                <h3>Review from customer</h3>
                <p> User 1</p>
                <p> User 2</p>
            </div>
        </div>
      </div>
        <!--end Left panel-->

        <!--Right Panel Price display-->
        <!-- print_r($cars) -->
        <div class="col-sm-6">
              <div class="col-sm-12 text-center">
                  <h2>Description</h2>
              </div>
              <div class="col-sm-12">
                  <h3>Car Price: <input id="price" hidden value="<?php echo $cars[0]['price']?>"><?php echo $cars[0]['price']?>&euro;/Day</h3>
              </div>
              <!--Images-->
              <div class="col-sm-12">
                  <?php
                  for ($i=0; $i <count($cars) ; $i++)
                  {
                    echo '<div class="col-sm-4">';
                    echo '<img class="img-responsive" src="'.base_url().'other_gallery/'.$cars[$i]['photo']. '" alt="Image" style="height:100px">';
                    echo '<br><br>' ;
                    echo '</div>' ;
                  }
                   ?>
              </div>
              <!--End Images-->
              <div class="col-sm-12 text-center">
                  <h3>Car specification</h3>
              </div>
              <div class="col-sm-12" style="padding-top:10px;box-shadow:0px 4px 7px 0px;border-radius:10px;background-color:silver;">
                  <p>Type of car: <?php echo $cars[0]['type_of_car']?></p>
                  <p>Description: <?php echo $cars[0]['description']?></p>
                  <p>Model Year: <?php echo $cars[0]['year']?></p>
              </div>
          </div>
          <!--End Right Panel-->
      </div>
    <!--End MAIN contain for reserve-->

    <!--Similar host display images-->
      <div class="row" style="padding:25px;">
          <?php if(!empty($location[0]['city'])) {?>
          <h3>Similar Host in <?php echo $location[0]['city'] ;?></h3>
          <?php for( $i = 0; $i < count($location); $i++)
                {
                  echo '<div class="col-sm-3 text-center">' ;
                  echo '<a href="'.site_url('reserve/reserves/').$location[$i]['carID'].'">'.$location[$i]['title'].'</a>' ;
                  echo '<img class="img-responsive"  src="'.base_url().'cover_gallery/'.$location[$i]['cover_photo'].'" alt="Image" style="height:100px">' ;
                  echo '</div>' ;
                }
           ?>
        <?php } ?>
      </div>
      <!--END Similar host display images-->
</div>
<hr>
