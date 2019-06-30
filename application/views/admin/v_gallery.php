<?
$ci =& get_instance();
?>
<link rel="stylesheet" href="<?=site_url()?>assets/OwlCarousel2/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?=site_url()?>assets/OwlCarousel2/assets/owl.theme.default.min.css">
<script src="<?=site_url()?>assets/OwlCarousel2/owl.carousel.js"></script>
<main role="main" class="container">
  <!-- user_wrapper -->
  <style type="text/css">
            .del_guarantee,.del_appeal,.del_consider,.del_borrow,.del_withdraw,.del_withdraw_detail,.del_sold,.del_investigate{
              position: absolute;
              top: 0px;
              right: 0px;
            }
            hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 10px solid rgba(150,0,0,.8);
}
          </style>
          <style type="text/css">
            .vid-name{
              margin-top: 20px;
            }
                .detail-pic,.ui-state-highlight2{
                    position: relative;
                    display: inline-block;
                    margin: 20px;
                }
                .mail-section{
                  position: relative;
                }
                .detail-pic .pic-del,.mail-section .mail-del{
                    position: absolute;
                    right: -5px;
                    top: -5px;
                }
                .pic-holder{
                  overflow-x: auto;
                  max-height: 100px;
                }
                .inp-bg-yellow{
                  background-color:#ffeb0080;
                }

          </style>
          <div class="container-fluid">
            <div class="row">
              
              <div class="col col-md-12">
                <div class="owl-carousel owl-theme">
                  <?
                  foreach ($item as $key => $value) {
                    ?>
                    <div class="item" data-hash="<?=$value->id?>">
                      <img src="<?php echo site_url('media/gallery/'.$value->filepath); ?>" width="100%">                
                    </div>
                    <?
                  }
                  ?>
                  
                  
                </div>
                
                
              </div>
            </div>
          </div>

<hr>
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <h1><span class="badge badge-info">Upload</span></h1>
      </div>
      <div class="col col-md-12">
        <form id="f-admin" method="post" action="<?=site_url("admin/gallery")?>">          
          <div class="row">
            <div class="col col-md-12">
              <!-- The fileinput-button span is used to style the file input field as button -->
              <span class="btn btn-success fileinput-button">
                  <span>Select files...</span>
              <!-- The file input field used as target for the file upload widget -->
              <input id="fileupload" type="file" name="files[]" multiple>
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
                foreach ($item as $key => $value) {
                    ?>
                    <div class="detail-pic">
                        <a class="btn btn-success pic-del" att-id="<?=$value->id?>" href="javascript:;">X</a>
                        <img src="<?php echo site_url('media/gallery/'.$value->filepath); ?>" width="100" height="100">
                        <input type="hidden" name="pic_detail[<?=$value->id?>]" value="old_file_picture__<?=$value->id?>">
                    </div>
                    <?
                }
                ?>
                            
              </div>
            </div>
          </div>          
          <div class="form-group" style="text-align: center;">
                <button type="button" class="btn btn-primary submit">บันทึก</button>
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
<script src="<?=site_url()?>/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?=site_url()?>/js/jquery.fileupload.js"></script>
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
                    $("#pic_detail_holder").append('<div class="detail-pic">'+
                                '<a class="btn btn-success pic-del" att-id="no" href="javascript:;">X</a>'+
                                '<img src="<?php echo site_url('media/temp'); ?>/' + file.name+'" width="100" height="100">'+
                                '<input type="hidden" name="pic_detail[]" value="' + file.name+'">'+
                            '</div>')
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
});
$(document).on('click', ".pic-del", function(){
                var current_pic=$(this);
                if(confirm('Confirm delete?')) {
                    $("#pic_detail_holder").append('<input type="hidden" name="del_pic[]" value="'+current_pic.attr("att-id")+'">');
                    current_pic.parent().fadeOut(300, function() {
                                            $(this).remove();
                                        });
                }

});




$(document).on("click", ".submit", function() {
        $( "#f-admin" ).submit();
        
    });
$( "#pic_detail_holder" ).sortable({
      placeholder: "ui-state-highlight2"
    });
    $( "#pic_detail_holder" ).disableSelection();
  $(function () {
    $("[data-fancybox]").fancybox({
      iframe : {
        css : {
          width : '95%',height : '95%'
        }
      }
    });
                $('.datetimepicker').datetimepicker({
                  //datepicker:false,
                    //format: 'H:i'
                });
                $('.datepicker').datepicker({
                  //datepicker:false,
                    dateFormat: 'dd/mm/yy'
                });
            });
  $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                items: 1,
                loop: false,
                center: true,
                margin: 10,
                dots:false,
                callbacks: true,
                URLhashListener: true,
                autoplayHoverPause: true,
                startPosition: 'URLHash'
              });
            })
</script>

</body>
</html>

