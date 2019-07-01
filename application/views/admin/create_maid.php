<style type="text/css">
  .del_work{
    position: absolute;
    right: 5px;
    top:0px;
  }
</style>
<main role="main" class="container">
  <!-- user_wrapper -->
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">Create Maid</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("admin/maid/create")?>">
          <?
          if (isset($edit)) {
            ?>
            <input type="hidden" class="form-control" name="edit" value="<?=$maid->id?>">
            <?
          }
          ?>
          <div class="form-group">
            <label for="maid_name">ขื่อ</label>
            <input type="text" class="form-control" name="maid_name" placeholder="Enter name" id="name" <?if (isset($edit)) { echo "value='".$maid->maid_name."'";}?>>
          </div>
          <div class="form-group" id="list_des">
             <label for="maid_list_des">งานที่รับผิดชอบ</label>
             <button id="add_work" type="button" class="btn btn-success">+</button>
            <div class="row" id="workList">
              <?
              if (isset($edit)) {
                $work_list=explode("-and-", $maid->maid_list_des);
                foreach ($work_list as $key => $value) {
                  ?>
                  <div class="col col-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-danger del_work">X</button>
                        <input type="text" class="form-control" name="maid_list_des[]" placeholder="Work" value="<?=$value?>">
                    </div>
                  </div>
                  <?
                }
              }
              ?>
            </div>            
          </div>

          <div class="form-group">
            <label for="maid_short_des">คำอธิบายสั้นๆ</label>
            <textarea class="form-control" id="maid_short_des" rows="3" name="maid_short_des"><?if (isset($edit)) { echo $maid->maid_short_des;}?></textarea>
          </div>

          <div class="form-group">
            <label for="maid_description">รายละเอียด</label>
            <textarea class="form-control" id="maid_description" rows="3" name="maid_description"><?if (isset($edit)) { echo $maid->maid_description;}?></textarea>
          </div>

          

          <div class="form-group" >
            <label for="con_password">Thumb Picture</label>
            <div class="row">
                <div class="col col-md-12">
                  <!-- The fileinput-button span is used to style the file input field as button -->
                  <span class="btn btn-success fileinput-button">
                      <span>Select files...</span>
                  <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload" type="file" name="files">
                  </span>
                  <br>
                  <br>
                  <!-- The global progress bar -->
                  <div id="progress" class="success progress">
                      <div class="progress-bar bg-success progress-meter" role="progressbar" ></div>
                  </div>
                  <!-- The container for the uploaded files -->
                  <div id="pic_detail_holder" class="cell-r"> 
                    <?
                    if (isset($edit)) {
                      ?>
                      <div class="detail-pic">
                            <img id="thumb_pic_show" src="<?=site_url("media/maid/".$maid->thumb_pic)?>">
                            <input id="thumb_pic_hid" type="hidden" name="thumb_pic" value="old_file_picture__<?=$maid->thumb_pic?>">                            
                        </div>
                      <?
                    }else{
                    ?>
                        <div class="detail-pic">
                            <img id="thumb_pic_show" src="">
                            <input id="thumb_pic_hid" type="hidden" name="thumb_pic" value="">                            
                        </div>
                        <?
                      }
                      ?>
                                
                  </div>
                </div>
            </div>
          </div>

          <div class="form-group" >
            <label for="con_password">Detail Picture</label>
            <div class="row">
                <div class="col col-md-12">
                  <!-- The fileinput-button span is used to style the file input field as button -->
                  <span class="btn btn-success fileinput-button">
                      <span>Select files...</span>
                  <!-- The file input field used as target for the file upload widget -->
                  <input id="fileupload2" type="file" name="files">
                  </span>
                  <br>
                  <br>
                  <!-- The global progress bar -->
                  <div id="progress2" class="success progress">
                      <div class="progress-bar bg-success progress-meter" role="progressbar" ></div>
                  </div>
                  <!-- The container for the uploaded files -->
                  <div id="pic_detail_holder" class="cell-r"> 
                    <?
                    if (isset($edit)) {
                      ?>
                      <div class="detail-pic">
                            <img id="main_pic_show" src="<?=site_url("media/maid/".$maid->main_pic)?>">
                            <input id="main_pic_hid" type="hidden" name="main_pic" value="old_file_picture__<?=$maid->main_pic?>">                            
                        </div>
                      <?
                    }else{
                    ?>
                        <div class="detail-pic">
                            <img id="main_pic_show" src="">
                            <input id="main_pic_hid" type="hidden" name="main_pic" value="">                            
                        </div>
                    <?
                    }
                    ?>                                
                  </div>
                </div>
            </div>
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
  $(function() {

      'use strict';
      // Change this to the location of your server-side upload handler:
      var url = '<?php echo site_url('upload/fileupload');?>';
      $('#fileupload').fileupload({
              url: url,
              dataType: 'json',
              done: function(e, data) {
                  //console.log(data);
                  $.each(data.result.files, function(index, file) {
                      //console.log(file);
                      $("#thumb_pic_show").attr("src","<?php echo site_url('media/temp'); ?>/" + file.name);
                      $("#thumb_pic_hid").val(file.name);                    
                  });
              },
              progressall: function(e, data) {
                  var progress = parseInt(data.loaded / data.total * 100, 10);
                  $('#progress .progress-meter').css(
                      'width',
                      progress + '%'
                  );
              }
          }).prop('disabled', !$.support.fileInput)
          .parent().addClass($.support.fileInput ? undefined : 'disabled');

      $('#fileupload2').fileupload({
              url: url,
              dataType: 'json',
              done: function(e, data) {
                  //console.log(data);
                  $.each(data.result.files, function(index, file) {
                      //console.log(file);
                      $("#main_pic_show").attr("src","<?php echo site_url('media/temp'); ?>/" + file.name);
                      $("#main_pic_hid").val(file.name);                    
                  });
              },
              progressall: function(e, data) {
                  var progress = parseInt(data.loaded / data.total * 100, 10);
                  $('#progress2 .progress-meter').css(
                      'width',
                      progress + '%'
                  );
              }
          }).prop('disabled', !$.support.fileInput)
          .parent().addClass($.support.fileInput ? undefined : 'disabled');    
  });
  $(document).on("click", ".submit", function() {
        $( "#f-admin" ).submit();
        
    });
  $(document).on("click", "#add_work", function() {
        $( "#workList" ).append('<div class="col col-12">'+
                '<div class="form-group">'+
                    '<button type="button" class="btn btn-danger del_work">X</button>'+
                    '<input type="text" class="form-control" name="maid_list_des[]" placeholder="Work" >'+
                '</div>'+
              '</div>');
        
    });
  $(document).on("click", ".del_work", function() {
        $(this).parent().parent().fadeOut(300, function() {
                                            $(this).remove();
                                        });
        
    });
</script>

</body>
</html>

