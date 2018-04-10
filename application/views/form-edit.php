<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRUD Project</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		background-image: url(<?php echo base_url(); ?>bg.jpg);
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
	input {
    width: 50%;
	}

	input[type=button], input[type=submit], input[type=reset] {
	    background-color: green;
	    border: none;
	    color: white;
	    padding: 16px 32px;
	    text-decoration: none;
	    margin: 4px 2px;
	    cursor: pointer;
	}
	input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover {
	    background-color: lightgreen;
	    border: none;
	    color: white;
	    padding: 16px 32px;
	    text-decoration: none;
	    margin: 4px 2px;
	    cursor: pointer;
	}


	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	a:link,a:visited{
    background-color: green;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	}

	a.hapus{
    background-color: red;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	}


	a.hapus:hover, a.hapus:active {
	    background-color: pink;
	}

	a:hover, a:active {
	    background-color: lightgreen;
	}

	h1 {
		color: #444;
		background-color: #66ffff;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	table {
    	border-collapse: collapse;
    	width: 75%;
	}

	th {
		background-color: #66ffff;
	    height: 15px;
	}

	table, th, td {
	    border: 1px solid black;
	}
	tr:nth-child(odd) {background-color: #f2f2f2;}
	td{

    padding: 5px;
    text-align: center;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		background-color: white;
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head><head>
	<meta charset="utf-8">
	<title>CRUD Project</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		background-image: url(<?php echo base_url(); ?>bg.jpg);
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
	a:link,a:visited{
    background-color: green;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	}

	a.hapus{
    background-color: red;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	}


	a.hapus:hover, a.hapus:active {
	    background-color: pink;
	}

	a:hover, a:active {
	    background-color: lightgreen;
	}

	h1 {
		color: #444;
		background-color: #66ffff;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	table {
    	border-collapse: collapse;
    	width: 75%;
	}

	th {
		background-color: #66ffff;
	    height: 15px;
	}

	table, th, td {
	    border: 1px solid black;
	}
	tr:nth-child(odd) {background-color: #f2f2f2;}
	td{

    padding: 5px;
    text-align: center;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		background-color: white;
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>

<body>

<div id="container">
	<a href="<?php echo site_url('welcome/index') ?>">Kembali</a>	
	<h1>Form Edit</h1>

	<div id="body">
		<?php if($edit) {
			$Nama = $edit->Nama;
			$NIM = $edit->NIM;
			$Alamat = $edit->Alamat;
			$Motivasi_hidup = $edit->Motivasi_hidup;
		}else{
			$Nama ="";
			$NIM = "";
			$Alamat = "";
			$Motivasi_hidup = "";
		}

		?>
		<form action="<?php echo site_url('welcome/update/'.$NIM) ?>" method = "POST">
			Nama Lengkap <br>
			<input type="text" name="Nama" value="<?php echo $Nama?>" /> <br>
			NIM <br>
			<input type="text" name="NIM" value="<?php echo $NIM?>" /><br>
			Alamat <br>
			<input type="text" name="Alamat" value="<?php echo $Alamat ?>" /><br>
			Motivasi Hidup <br>
			<input type="text" name="Motivasi_hidup" value="<?php echo $Motivasi_hidup?>" /><br>
			<input type="submit" name="simpan" value="Simpan" />
		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>