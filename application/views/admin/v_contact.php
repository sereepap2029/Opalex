
<style type="text/css">

.row-fluid .no-margin-left{margin-left: 0px;font-size: 18px; }
.form-horizontal .control-label{font-size: 18px;}
.img_hold{
  position: relative;
  display: inline-block;
  margin:10px;
}
.img_hold button{
  position: absolute;
  top: 0px;
  right: 0px;
}
.req_p{
  position: relative;
  width: 70%;
  height: 50px;
  margin-top: 10px;
}
.req_p input{
  width: 80%;
}
.del_req{
  position: absolute;
  top: 0px;
  right: 0px;
}
.ui-state-highlight{
  position: relative;
  display: inline-block;
  margin:10px;
  width: 150px;
  height: 150px;
}
#g_map{
  width: 500px;
  height: 400px;
}
</style>
<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">Contact</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("admin/contact")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$contact->id?>">
            <?
          }
          ?>
          <div class="form-group">
            <label for="gal_header">Gallery Title</label>
            <input type="text" class="form-control" name="gal_header" placeholder="Enter name" id="gal_header" <?if (isset($edit)) { echo "value='".$contact->gal_header."'";}?>>
          </div>
          <div class="form-group">
            <label for="gal_des">Gallery Description</label>
            <textarea class="form-control" id="gal_des" rows="3" name="gal_des"><?if (isset($edit)) { echo $contact->gal_des;}?></textarea>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter name" id="phone" <?if (isset($edit)) { echo "value='".$contact->phone."'";}?>>
          </div>
          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter name" id="mobile" <?if (isset($edit)) { echo "value='".$contact->mobile."'";}?>>
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="Enter name" id="email" <?if (isset($edit)) { echo "value='".$contact->email."'";}?>>
          </div>
          <div class="form-group">
            <label for="facebook">Facebook URL</label>
            <input type="text" class="form-control" name="facebook" placeholder="Enter name" id="facebook" <?if (isset($edit)) { echo "value='".$contact->facebook."'";}?>>
          </div>
          <div class="form-group">
            <label for="twister">Twister URL</label>
            <input type="text" class="form-control" name="twister" placeholder="Enter name" id="twister" <?if (isset($edit)) { echo "value='".$contact->twister."'";}?>>
          </div>

          <div class="control-group">
            <label class="control-label" for="focusedInput">Lat Lon</label>
            <div class="controls">
                <input class="focused" id="lat" type="text" name="lat" value="<?if(isset($edit)){echo $contact->lat;}?>">
                <input class="focused" id="lon" type="text" name="lon" value="<?if(isset($edit)){echo $contact->lon;}?>">
            </div>
          </div>
          <div class="span12 no-margin-left">
            <div id="g_map"></div>
          </div>
          
          <div class="form-group" style="text-align: center;">
            <button type="button" class="btn btn-light submit">บันทึก</button>
            <button type="reset" value="Reset" class="btn btn-dark">ยกเลิก</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end user_wrapper -->
  
</div>
<!-- end rapee_wrapper -->
    

</div>
<!-- end rapee_container -->

<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?=site_url()?>js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?=site_url()?>js/jquery.fileupload.js"></script>
<script type="text/javascript">
  
  $(document).on("click", ".submit", function() {
        $( "#f-admin" ).submit();
        
    });
  $(function() {
          initMap_contact();
    });
  function update_pos_marker(marker){
          marker_pos=marker.getPosition();
          $("#lat").val(""+marker_pos.lat());
          $("#lon").val(""+marker_pos.lng());
        }
      function initMap_contact() {
        <?
        if (isset($edit)) {
          if ($contact->lat==""||$contact->lon=="") {
            $contact->lat=0;
            $contact->lon=0;
          }
          ?>
          var uluru = {lat: <?echo $contact->lat;?>, lng: <?echo $contact->lon;?>};
          <?
        }else{
          ?>
          var uluru = {lat: 13.723663085115886, lng: 100.53338623046875};
          <?
        }
        ?>
        
        var map = new google.maps.Map(document.getElementById('g_map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: 'เลือกที่อยู่',
          draggable:true,
        });
        marker.addListener('dragend', function() {
          update_pos_marker(marker);
        });
        marker_pos=marker.getPosition();
        $("#lat").val(""+marker_pos.lat());
        $("#lon").val(""+marker_pos.lng());
      }
</script>

</body>
</html>

