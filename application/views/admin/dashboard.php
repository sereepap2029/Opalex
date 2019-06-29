<?
$ci =& get_instance();
$day_name_arr = array(1 => "จ.",2 => "อ.",3 => "พ.",4 => "พฤ.",5 => "ศ.",6 => "ส.",7 => "อา.", );
$month_name_arr = array(
    1 => "มกราคม",
    2 => "กุมภาพันธ์",
    3 => "มีนาคม",
    4 => "เมษายน",
    5 => "พฤษภาคม",
    6 => "มิถุนายน",
    7 => "กรกฎาคม",
    8 => "สิงหาคม",
    9 => "กันยายน",
    10 => "ตุลาคม",
    11 => "พฤศจิกายน",
    12 => "ธันวาคม",
     );
?>
    <main role="main" class="container">
    	<div class="container">
		  <div class="row">
  		  <div class="col col-md-4">
  		  	<div class="card" style="width: 18rem;">
  			  <img class="card-img-top" src="<?=site_url("img/maid/maid1_2.jpg")?>" alt="Card image cap">
  			  <div class="card-body">
  			    <p class="card-text">Maid</p>
  			    <a href="<?=site_url("admin/maid")?>" class="btn btn-primary btn-lg">Maid</a>
  			  </div>
  			</div>
  			</div>
  			<div class="col col-md-4">
  			<div class="card" style="width: 18rem;">
  			  <img class="card-img-top" src="<?=site_url("img/slider/slider3.jpg")?>" alt="Card image cap">
  			  <div class="card-body">
  			    <p class="card-text">Banner</p>
  			    <a href="<?=site_url("admin/banner")?>" class="btn btn-primary btn-lg">Banner</a>
  			  </div>
  			</div>
  			</div>
  			<div class="col col-md-4">
  			<div class="card" style="width: 18rem;">
  			  <img class="card-img-top" src="<?=site_url("img/gallery/image1.jpg")?>" alt="Card image cap">
  			  <div class="card-body">
  			    <p class="card-text">Gallery</p>
  			    <a href="<?=site_url("admin/gallery")?>" class="btn btn-primary btn-lg">Gallery</a>
  			  </div>
  			</div>
  		  </div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="<?=site_url("img/sheep.png")?>" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Contact</p>
            <a href="<?=site_url("admin/contact")?>" class="btn btn-primary btn-lg">Contact</a>
          </div>
        </div>
        </div>
		  </div>
		</div>
      <script type="text/javascript">
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
                    dateFormat: 'dd/mm/yy',beforeShow:function(){    
                                                        if($(this).val()!=""){  
                                                            var arrayDate=$(this).val().split("/");       
                                                            arrayDate[2]=parseInt(arrayDate[2])-543;  
                                                            $(this).val(arrayDate[0]+"/"+arrayDate[1]+"/"+arrayDate[2]);  
                                                        }  
                                                        setTimeout(function(){  
                                                            $.each($(".ui-datepicker-year option"),function(j,k){  
                                                                var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                                                                $(".ui-datepicker-year option").eq(j).text(textYear);  
                                                            });               
                                                        },50);  
                                                    }
                });
            });
      	function deleteconfirm(link){
        if (confirm("Confirm Delete")) {
            window.open(link,"_self")
        };
    }
    function sub_search(){
          myform = document.createElement("form");
          $(myform).attr("action","<?=site_url("main/dashboard/")?>");   
          $(myform).attr("method","post");
          $(myform).html('<input type="text" name="stu_keyword" value="'+$("#search_txt").val()+'"><input type="text" name="start_date" value="'+$("#start_date").val()+'"><input type="text" name="end_date" value="'+$("#end_date").val()+'">')
          document.body.appendChild(myform);
          myform.submit();
          $(myform).remove();
        }
      </script>

    </main><!-- /.container -->

    
