<?php
/*
   Template Name: Frame
*/
?>
<?php 

global $wpdb;
$refid = $_GET['refid'];
$table_name = $wpdb->prefix . 'url';
$current_user = wp_get_current_user();
$userid = $current_user->ID;
$querry = "SELECT `clicked_by` from $table_name WHERE `refrence_id` = '$refid' AND `clicked_by` LIKE '%$userid%'";
$resultss = $wpdb->get_var($querry);
if($resultss != '')
{echo 'You already Clicked this link';}
else{
$table_name = $wpdb->prefix . 'url';
$refid = $_GET['refid'];
$current_user = wp_get_current_user();
$query = "SELECT * from $table_name WHERE refrence_id = '$refid'";
$results= $wpdb->get_row($query);
$user = $results->clicked_by;
$update = $user .','. $current_user->ID;
$newclick = $results->clicks;
$new = $newclick + 1;
for($i=1; $i<2; $i++){
$query12 = "UPDATE `wp_url` SET `clicks` = '$new', `clicked_by` = '$update'  WHERE `refrence_id` = '$refid'";
$result34 = $wpdb->get_results($query12);
}
$url = $results->url;
		if (strpos($url, '$userid') !== false) {
	$d = '$userid';
	$bnr = '$bannerid';
	echo $c = $current_user->ID;
	echo $newbnr = $results->refrence_id;
$e= str_replace($d,$c,$url);
$h= str_replace($bnr,$newbnr,$e);
}
else {
 $h= $url;
}
?>
<style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #4CAF50;
}
</style>
<body>
<div style="width:100%; height:200px;">
<div id="strtmsg"  style="display:block;  cursor: wait;">
be patient, while the website is loading.....
</div>
<div id="nvjot"  style="display:none;">
<div id="myProgress">
  <div id="myBar"></div>
</div>
<br>
<div id="img" style="display:flex;">
<div class="cheema">
  <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/flash.jpg" width="80px"height="80px">
</div>

<div class="cheema">
  <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/superman.jpg" width="80px"height="80px"  onclick="move()" style=" cursor: pointer;">
</div>

<div class="cheema">
 <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/spiderman.jpg" width="80px"height="80px">
</div>

<div class="cheema">
 <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/letran.jpg" width="80px"height="80px">
</div>

<div class="cheema">
 <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/ironman.jpg" width="80px"height="80px">
</div>

<div class="cheema">
 <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/thor.jpg" width="80px"height="80px">
</div>

<div class="cheema">
 <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/hulk.jpg" width="80px"height="80px">
</div>

<div class="cheema">
    <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/america.jpg" width="80px"height="80px">
</div>

<div class="cheema">
    <img src="http://earnwithstudy.com/wp-content/uploads/2017/04/batman.jpg" width="80px"height="80px">
</div>
</div>
<h4 id="msg" style="display:block;">Click on superman to start timer.....</h4>
<h4 id="msg2" style="display:none;">Please don't change the tab otherwise Timer will reset automatically</h4>

<br>
  <button id="close" onclick ="earnpoint()" style="display:none; width:150px; height:50px; font-size:16px; cursor:pointer; color:white; background-color:green;"> Close</button>
</div></div>
<iframe src="<?= $h; ?>" width="100%" height="100%" onload="nvjot()"></iframe> <?php } ?>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
function earnpoint(){
	  document.getElementById('close').disabled = 'disabled';
jQuery.ajax({
         type : "post",
         url : '<?php echo admin_url('admin-ajax.php'); ?>',
         data : {action: "earnpoint_user", post_id : '123'},
         success: function(response) {
			  open(location, '_self').close();
         }
      });   
}	
function move() {
	  document.getElementById("msg").style.display = "none";
	   document.getElementById("img").style.display = "none";
	   	   document.getElementById("msg2").style.display = "block";
  var elem = document.getElementById("myBar");   
  var width = 1;
   id = setInterval(frame, 50);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  document.getElementById("close").style.display = "block";
	     document.getElementById("msg2").style.display = "none";
    } else {
       if (document.hasFocus() == true){
      width++; }
      else{
      stop(width);
      }
      elem.style.width = width + '%'; 
    }
  }
}


function nvjot(){
	document.getElementById("strtmsg").style.display = "none";
	  document.getElementById("nvjot").style.display = "block";
}

var cards = $(".cheema");
for(var i = 0; i < cards.length; i++){
    var target = Math.floor(Math.random() * cards.length -1) + 2;
    var target2 = Math.floor(Math.random() * cards.length -1) +2;
    cards.eq(target).before(cards.eq(target2));
}
</script>