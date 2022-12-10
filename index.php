<?php
include('functions.php');
$result = '';
$domain= '';
$message = '';
if(isset($_POST['domain'])){ 
	$domain = $_POST['domain'];	
	$domain = trim($domain);
	if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7);
	if(substr(strtolower($domain), 0, 8) == "https://") $domain = substr($domain, 8);
	if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);
	if(validateDomain($domain)) {
		$result = lookUpDomain($domain);
	} else {
		$message = "Invalid Input!";
	}
}
include('inc/header.php');
?>
<title>phpzag.com: Demo Build Domain WHOIS Lookup Script with PHP</title> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.col-md-6 {
	padding-right:0px;
}
</style>
<?php include('inc/container.php'); ?>
<div class="container">
	<h2>Example: Domain WHOIS Lookup Script with PHP</h2>
	
	<label class="text-info">
	<?php if($message) { ?>
		<span class="text-danger"><strong><?php echo $message; ?></strong></span>
	<?php } ?>	
	</label>	
					
	<div class="row">					
		<form name="form" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">					
			<div class="col-md-6">				
				<div class="form-group">							
					<input type="text" name="domain" id="domain" class="form-control" value="<?php echo $domain; ?>" placeholder="Enter domain name">
				</div>	
			</div>
			<div class="col-md-4">								
				<div class="form-group">					
					<button type="submit" class="btn btn-info btn-md"><i class="fa fa-search"></i> WHOIS</button>					
				</div>	
			</div>					
		</form>				
	</div>
	<?php
	if($result) {
		echo "<pre>\n" . $result . "\n</pre>\n";
	}
	?>
</div>
<?php include("inc/footer.php"); ?>




