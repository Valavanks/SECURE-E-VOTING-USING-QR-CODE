<?php ob_start();
	include "include/db_connect.php";
	include "include/delete_purchase.php";
	
	session_start();
	$counter_name="counter.txt";
	// Read the current value of our counter file
	$f =fopen($counter_name,"r");
	$counterVal=fread($f, filesize($counter_name));
	fclose($f);
	
	function excerpt($description,$numberOfWords = 10){     
		$contentWords = substr_count($description," ") + 1;
		$words = explode(" ",$description,($numberOfWords+1));
		if( $contentWords > $numberOfWords ){
			$words[count($words) - 1] = '...';
		}
		$excerpt = join(" ",$words);
		return $excerpt;
	}	
	date_default_timezone_set("Asia/Kolkata");
	$date=date('d-m-Y');					
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
	Smart Application
</title>
<link rel="shortcut icon" href="images/logo/fav.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Application" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/example.css" rel='stylesheet' type='text/css' />
<link href="css/font/css/font-awesome.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.easy-ticker.js"></script>

<script type="text/javascript" src="js/hover_pack.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bs_leftnavi.css">
<script src="admin/graph/Chart.min.js"></script>
   <style>
   ul.gr
   {
	   list-style:none;
	   width:200px;
   }
   ul.gr li
   {
	   
	   float:left;
	   margin-left:20px;
	   margin-top:20px;
   }
   ul.gr li div
   {
	   width:30px;
	   height:20px;
	   background:gray;
	   
	   float:left;
   }
   ul.gr li label
   {
	   float:left;
	   margin-left:30px;
	   margin-top:0px;
   }
   
   </style>
<script src="js/bs_leftnavi.js"></script>
<script>
	jQuery(document).ready(function($){

		$('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,
			source_image_width: 900,
			source_image_height: 1200,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});

	});
</script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript">
	    $(document).ready(function () {
	        $('#horizontalTab').easyResponsiveTabs({
	            type: 'default', //Types: default, vertical, accordion           
	            width: 'auto', //auto or any width like 600px
	            fit: true   // 100% fit in a container
	        });
	    });
</script>	
<script type="text/javascript">
$(document).ready(function(){

	var dd = $('.vticker').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 4000,
		height: 'auto',
		visible: 3,
		mousePause: 0,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');
	
});
</script>
<script type="text/javascript">
$(document).ready(function(){

	var dd = $('.vticker1').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 5000,
		height: 'auto',
		visible: 1,
		mousePause: 0,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');
	
});
</script>
<style>
	img.hover
	{
		width:50px;
		height:50px;
	}
	img.hover:hover
	{
		width:80px!important;
		height:80px!important;
	}
 </style>	
</head>
<body>
<?php
	include "include/bag_section.php";
	include "include/nav.php";
	menu("home");
	$previous = "javascript:history.go(-1)";
		if(isset($_SERVER['HTTP_REFERER'])) {
		    $previous = $_SERVER['HTTP_REFERER'];
		}
	$book_id=$_REQUEST['book_id'];
?>
<div class="column_center">
  <div class="container">
	
	<ul class="breadcrumb pull-right" style="font-size:12px;">
		<li> <a href="index.php"> Home </a></li> 
		<li> <a href="book.php"> Produts </a></li>  
		<li> <INPUT TYPE="button" VALUE="Go Back" onClick="history.go(-1);" class="back_btn"> </li>
	</ul>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <div class="col-md-3 sidebar_box">
			<?php include "include/left_menu.php"; ?>
			<div class="twitter">
			   <h3> News and Events </h3>
			   
				<div class="vticker">
				  <ul class="twt1">
				  <?php
					$news=mysql_query("select * from news ORDER BY nid DESC");
					$n=mysql_num_rows($news);
					if($n>0)
						{
						while($news_row=mysql_fetch_array($news))
							{
				  ?>
														
					<li class="twt1-li" style="padding-bottom:15px;">
					  <i class="twt"> </i>
					  <div class="twt1_desc">
						<?php echo $news_row['news']; ?>
					  </div>
					  
					</li>
				  <?php
						}
					}
				  ?>
				 </ul>
			   </div>
			</div>
			<div class="clients">
				<h3>Our Happy Clients</h3>
				<div class="vticker1">
				<ul>
				
					<?php
						$test=mysql_query("select * from testimonials ORDER BY tid DESC");
						$no_test=mysql_num_rows($test);
						if($no_test>0)
						{
						while($test_row=mysql_fetch_array($test))
							{
					  ?>
					  <li>
					<h4>
					<?php echo excerpt($test_row['info'],80).".."; ?></h4>
					   <ul class="user">
						<img src="admin/move/testimonials/<?php echo $test_row['photo']; ?>" class="img-responsive img-circle hover" width="50" height="50" />
						<li class="user_desc"><a href="#"><p><?php echo $test_row['name']; ?>, <?php echo $test_row['company']; ?></p></a></li>
						<div class="clearfix"> </div>
					   </ul>
					   </li>
					   <?php
							}
						}
					   ?>
				   </ul>
				</div>
			</div>
	   </div> 
	   
	   <div class="col-md-9 single_right">
	   	<div class="single_top">
			<?php
				$book_detail=mysql_query("select * from new_books where book_id='$book_id'");
				$fetch_book=mysql_fetch_array($book_detail);
				$sample_pages=$fetch_book['sample_pages'];
				$name=$fetch_book['book_name'];
				/* $prize=$fetch_book['book_rate']; */
				
				$main_category_id=$fetch_book['main_category_id'];
				$sub_category_id=$fetch_book['sub_category_id'];
				$third_category_id=$fetch_book['third_category_id'];
				
				$get_sub=mysql_query("select * from sub_category_list where subid='$sub_category_id'");
				$fetch_sub=mysql_fetch_array($get_sub);
				
				$get_main=mysql_query("select * from main_category_list where mainid='$main_category_id'");
				$fetch_main=mysql_fetch_array($get_main);
				
				$get_third=mysql_query("select * from third_category_list where thirdid='$third_category_id'");
				$fetch_third=mysql_fetch_array($get_third);
				
				$mainid=$fetch_main['mainid'];
				$main_category=$fetch_main['main_category_name'];
				$sub_category=$fetch_sub['sub_category_name'];
				$third_category=$fetch_third['third_category_name'];
						
			?>
	      	<div class="single_grid">
				<div class="grid images_3_of_2">
					<ul id="etalage">
						<li>
							<a href="#">
								<img class="etalage_thumb_image" src="admin/move/book/<?php echo $fetch_book['photo'];?>" class="img-responsive" />
								
								<img class="etalage_source_image" src="admin/move/book/<?php echo $fetch_book['photo'];?>" class="img-responsive" title="" />
							</a>
						</li>
					</ul>
					<div class="clearfix"></div>	
					
						<?php
						if($sample_pages!=""){
						?>
							<a target="_blank" href="admin/move/book/pdf/<?php echo $sample_pages?>" class="btn btn_blue">View Sample Pages</a>
						<?php   }  ?>
						
				  </div> 
				  <div class="desc1 span_3_of_2">
					<h1><?php echo "<span style='color:#03a7e3'>".$main_category." - ".$sub_category." - ".$third_category."</span>";?></h1>
					<h1><?php 
						if($fetch_book['book_name']=="")
						{
							$sel_name=mysql_query("select * from combo_books where book_id='$book_id'");
							$get_name=mysql_fetch_array($sel_name);
							
							echo $book_name=$get_name['book_name'];
							echo "<br/>";
						}
						else
						{
							echo $book_name=$fetch_book['book_name'];
							echo "<br/>";
						}
						?>
					</h1>
				  	
					
					<?php 
							$sel_combo=mysql_query("select * from combo_books where book_id='$book_id' and status='1'");
							$sel_no=mysql_num_rows($sel_combo);
							if($sel_no>1)
							{
					?>
				<p class="top3"><span class="red">Combo Product </span><span><a href="view_all.php?book_id=<?php echo $book_id; ?>"> / View All</a></span></p>
				<div class="col-md-12 combo">
					<div class="row">
						<?php
							$rate=0;
							while($sel_combo_row=mysql_fetch_array($sel_combo))
							{
							$quantity=$sel_combo_row['quantity'];
						?>
						<div class="col-md-12 combo_set">
							<a class="alert-close1" href="delete_item1.php?combo_id=<?php echo $sel_combo_row['combo_id']; ?>&book_id=<?php echo $fetch_book['book_id']; ?>"><img src="images/2.png" /></a>
							<span class="red"><?php echo $sel_combo_row['book_name']; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
							<span class="red"> <i class="fa fa-rupee"></i>  
							<?php  
							echo $sel_combo_row['book_rate'];
							$rate=$rate+$sel_combo_row['book_rate'];

							?></span>
							
						</div>
						<?php
							}
							
						?>
					</div>
				</div>
				<?php
					}
					else
					{
						$fetch_combo=mysql_fetch_array($sel_combo);
						$rate=$fetch_combo['book_rate'];
						$quantity=$fetch_combo['quantity'];
					}
				?>
				<div class="price_single">
				  <!--<span class="reducedfrom"> Rs. 1040.00</span>-->
				  <span class="actual"> <i class="fa fa-rupee"></i>  
				  <?php echo $rate ; ?>.00</span>
						Availability: 
							<?php
								if($quantity>0)
								{
								echo '<span class="color">In stock</span>';
								}
								else
								{
								echo '<span class="color">Not In stock</span>';
								}
							?>
				  <br/>
				  <?php
					if(!empty($fetch_book['rating']))
					{ 
						$r1=$fetch_book['rating'];
						$r2=5-$r1;
						for($i=1;$i<=$r1;$i++)
						{
							echo '<img src=images/star1.png width=20 height=20 />';
						}
						for($i=1;$i<=$r2;$i++)
						{
							echo '<img src=images/star2.png width=20 height=20 />';
						}
					}
				  ?>
				</div>
				<h2 class="quick">Quick Overview:</h2>
				
				<span id="full_para" class="quick_desc">
				<?php echo $fetch_book['about']; ?> </span>

				
				 <!-- class="btn btn-warning white  -->
				
				<?php
					
					if(empty($_SESSION['user_id']))
					{
				?>
				
					<div class="wish-list">
						<ul>
							
							<!--<li class="wish"><a href="login.php?book_id=<?php echo $book_id; ?>">Add Review</a></li>-->
							
							<li class="wish"><a href="login.php?book_id=<?php echo $book_id; ?>">Add to Wishlist</a></li>
						</ul>
					</div>
				<?php
					}
					else
					{
				?>
					<div class="wish-list">
						<ul>
							<!--<li class="wish"><a href="review.php?book_id=<?php echo $book_id; ?>">Add Review</a></li>-->
							<li class="wish"><form name="wish" method="post"><input type="submit" name="add_wishlist" value="Add to Wishlist" style="border:none;background:none;color:red;text-transform:capitalize!important;color:#df1f26;text-decoration:underline;"></form></li>
						</ul>
					</div>
				<?php
					}
				?>
			    
				<div class="quantity_box">
					<form name="form" method="post">
						<ul class="product-qty">
						   <span>Quantity:</span>
						   
						   <input type="number" name="quantity" placeholder="Enter Quantity" required min="1" />
					    </ul>
				    
				   	<?php
								
					if($quantity>0)
					{
						if(empty($_SESSION['user_id']))
						{
					?>
						
						<input type="submit" name="combo_cart1" value="Add <?php /* echo  $sel_no1; */?> Item to My Shopping Bag" class="btn btn-danger padding mleft15 mtop25">

					<?php
						}else
						{
						?>
						<input type="submit" name="combo_cart" value="Add <?php /* echo  $sel_no1; */?> Items to My Shopping Bag" class="btn btn-danger padding mleft15 mtop25"> 
					<?php
						}
					}
					else
					{
				?>
						<input type="submit" name="cart" value="Add to My Shopping Bag" class="btn btn-danger padding mleft15 disabled mtop25">
					<?php
					}
					?>
					</form>
		   		    <div class="clearfix"></div>
	   		    </div>
				
				<div class="clients mtop25">
					
					<?php
						$test=mysql_query("select * from review where book_id='$book_id' ORDER BY id DESC LIMIT 5");
						$n=mysql_num_rows($test);
						if($n>0)
						{
							echo '<h3>Product Reviews</h3>';
							while($test_row=mysql_fetch_array($test))
							{
								
						  ?>
						  	<p style="margin-top:-10px;"><?php echo ucwords($test_row['name']); ?></p>
							<h4 style="background:none;margin-top:-15px;"><?php echo $test_row['review']; ?></h4>
						
						<?php
						  	}
						  }
						?>
				</div>
				
				</div>
				<div class="col-md-5 mtop20 pbot20">
						 
					
								  <canvas id="bar" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
								 
                        <script>
                            var barChartData = {
                            labels : ["Product"],
                            datasets : [
                                {
                                    fillColor : "#FC8213",
                                    data : [65]
                                },
                                {
                                    fillColor : "#337AB7",
                                    data : [28]
                                }
								
                            ]

                        };
                            new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);

                        </script>
						
						</div>		
						<div class="col-md-5 mtop20 pbot20">
						<ul class="gr">
						   <li>
							<div style="background:orange;"></div>
							<label> Good</label>
						   </li>
						  
						    <li>
							<div style="background:blue;"></div>
							<label> Bad</label>
						   </li>
						    
						</ul>
						
					</div>

			</div>
				
			</div>	
				<?php
					extract($_POST);
					if(isset($_POST['combo_cart1']))
							{
								header("location:login.php?book_id=$book_id&qty=1");
							}
						if(isset($_POST['combo_cart']))
							{ 
								$user_id=$_SESSION['user_id'];
								
								$check=mysql_query("select * from combo_books where book_id='$book_id'");
								$check_no=mysql_num_rows($check);
								if($check_no==1)
								{ 
									$sel_combo_row1=mysql_fetch_array($check);
									$combo_id=$sel_combo_row1['combo_id'];
										
										$identity=mysql_query("select * from wishlist where book_id='$book_id' and user_id='$user_id' and combo_id='$combo_id'and status='0'");
		
										$count_identity=mysql_num_rows($identity);
										$row_identity=mysql_fetch_array($identity);
										
										if($count_identity>0)
										{
											$wish_id=$row_identity['wish_id'];
			
											$update_identity=mysql_query("update wishlist set quantity=quantity+$quantity where wish_id='$wish_id'");
											if($update_identity)
											{
												header("location:bag.php");
											}
										}
										else
										{
										$new_rate=$sel_combo_row1['book_rate'];
										
										$qry1=mysql_query("insert into wishlist(date,user_id,mainid,book_id,combo_id,quantity,prize,status)values('$date','$user_id','$mainid','$book_id','$combo_id','$quantity','$new_rate','0')");
											if($qry1)
											{
												header("location:bag.php?book_id=$book_id");
											}
										}
								}
								else
								{
								
								$sel_combo1=mysql_query("select * from combo_books where book_id='$book_id' and status='1'");
								$sel_noo=mysql_num_rows($sel_combo1);
								if($sel_noo>0)
								{	
									while($sel_combo_row1=mysql_fetch_array($sel_combo1))
									{
										
										$combo_id=$sel_combo_row1['combo_id'];
										
										$identity=mysql_query("select * from wishlist where book_id='$book_id' and user_id='$user_id' and combo_id='$combo_id' and status='0'");
		
										$count_identity=mysql_num_rows($identity);
										$row_identity=mysql_fetch_array($identity);
										
										if($count_identity>0)
										{  
											$wish_id=$row_identity['wish_id'];
			
											$update_identity=mysql_query("update wishlist set quantity=quantity+$quantity where wish_id='$wish_id'");
											if($update_identity)
											{
												header("location:bag.php?book_id=$book_id");
											}
										}
										else
										{ 
										$new_rate=$sel_combo_row1['book_rate'];
										
										$qry1=mysql_query("insert into wishlist(date,user_id,mainid,book_id,combo_id,quantity,prize,status)values('$date','$user_id','$mainid','$book_id','$combo_id','$quantity','$new_rate','0')");
										if($qry1)
										{ 
											header("location:bag.php?book_id=$book_id");
										}
										}
									}
								}
								
								}
							}
							if(isset($_POST['add_wishlist']))
							{
								$created_date=date('d-m-Y');
								$check=mysql_query("select * from wish_table where book_id='$book_id' and user_id='$user_id'");
								$count=mysql_num_rows($check);
								if($count>0)
								{
									echo "<script>alert('Product Already Exist in Wishlist');</script>";
								}
								else
								{
									$insert_wishlist=mysql_query("insert into wish_table(created_date,user_id,book_id)values('$created_date','$user_id','$book_id')");
									if($insert_wishlist)
									{
										echo 
										'<script>
											$(function(){
												$("#alertModal").modal();
											});
										</script>';
									}
								}
							}
					
				?>
		    <div class="clearfix"> </div>
			<h2 class="text-center">Reviews</h2>
			<?php
			$user=mysql_query("select * from purchase where book_id=$book_id");
						
			?>
			<div class="row" style="border:1px solid black;padding:15px;">
			<?php
			while($user_details1=mysql_fetch_array($user))
			{
				
				
				
							$pid=$user_details1['purchase_id'];
							$user1=mysql_query("select * from otp_review where pid=$pid");
							$user_details=mysql_fetch_array($user1);
							
							$user_id=$user_details['user_id'];
							$get_data=mysql_query("select * from customer where user_id='$user_id'");
							$fetch_data=mysql_fetch_array($get_data);
					if($user_details['comments']!="")		
					{
			?>
			<div class="col-sm-2" >
			<span class="fa fa-user" style="font-size:25px"></span>
			</div>
			<div class="col-sm-10" >
			<h2><?php echo $fetch_data['name']; ?></h2>
			<p><?php echo $user_details['comments']; ?></p>
			
			</div>
			<?php
			}
			}
			?>
			</div>
		</div>
		
        </div>
      </div> 
	</div>
</div>
<?php include "include/footer.php"; ?>

	<link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!-- Modal -->
  <div class="modal fade" id="alertModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Alert Message </h4>
        </div>
        <div class="modal-body">
          <p class="text-center"> 
			Product Added in Wishlist <br/><br/>
			
		  </p>
        </div>
        <div class="modal-footer">
			<a href="product.php?book_id=<?php echo $book_id; ?>" class="btn btn-default">Ok</a>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->

</body>
</html>		