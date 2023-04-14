<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	
	if ( ! function_exists('pesan_get'))
	{
		function pesan_get($variabel,$pesansukses, $pesangagal = NULL, $pesangagal2 = NULL, $pesangagal3 = NULL)
		{
			 
			 if (isset($_GET[$variabel])) {
				$ci = &get_instance();
				$var = $ci->input->get($variabel,TRUE);
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 } else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
			} else if (isset($_POST[$variabel])) {
				$ci = &get_instance();
				$var = $ci->input->post($variabel,TRUE);
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 }  else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
			}
		
		}
	}

	if ( ! function_exists('pesanvar'))
	{
		function pesanvar($variabel,$pesansukses, $pesangagal = NULL, $pesangagal2 = NULL)
		{
			 
				$ci = &get_instance();
				$var = $variabel;
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 }
	
		
		}
	}

	if (!function_exists('ceklogin'))
	{
		function ceklogin()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('statuslogin') != "login") {
				redirect(base_url("app/login?m=".$submenu.""));
			}
		}
	}


	if (!function_exists('hakakses'))
	{
		function hakakses($rule = null,$rule1 = null,$rule2 = null)
		{	
			$ci = &get_instance();
			if($rule!=null && $rule1==null && $rule2==null) {
				if($rule==$ci->session->userdata('rule')) {
					
				} else {
					redirect(base_url("app/akses"));
				}
			} else if($rule!=null && $rule1!=null && $rule2==null) {
				if($rule==$ci->session->userdata('rule') || $rule1==$ci->session->userdata('rule')) {
					
				} else {
					redirect(base_url("app/akses"));
				}
			} else if($rule!=null && $rule1!=null && $rule2!=null) {
				if($rule==$ci->session->userdata('rule') || $rule1==$ci->session->userdata('rule') || $rule2==$ci->session->userdata('rule')) {
					
				} else {
					redirect(base_url("app/akses"));
				}
			}
		}
	}