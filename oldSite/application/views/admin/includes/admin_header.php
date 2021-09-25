<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welborn Machado Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?PHP echo base_url(); ?>css/admin/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?PHP echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?PHP echo base_url(); ?>css/admin/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?PHP echo base_url(); ?>css/admin/datatables/dataTables.bootstrap.css" rel="stylesheet">
        <link type="text/css" href="<?PHP echo base_url(); ?>css/admin/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/admin/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?PHP echo base_url(); ?>css/admin/bootstrap-datetimepicker.css" rel="stylesheet"/>
        <script src="<?PHP echo base_url(); ?>js/jquery-1.8.3.js" type="text/javascript"></script>
        <link href="<?PHP echo base_url(); ?>css/admin/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?PHP echo base_url(); ?>css/jquery-customselect.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?PHP echo base_url(); ?>js/welbornvalidation.js" ></script>
        <link type="text/css" href="<?PHP echo base_url(); ?>css/custome-style.css" rel="stylesheet"/>        
 	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico"  />  
 <style>
    .icon {
        font-size: 90px;
        text-align: right;
        color: rgba(0, 0, 0, 0.15);
    }
    .fnt-sz {
        font-size: 36px;
    }

    .highcharts-container{
        margin-top:0px;	
    }
</style>
    </head>
    <body class="skin-blue">
        <header class="header"> 
            <a href="<?PHP echo base_url(); ?>admin/dashboard" class="logo">Welborn Machado</a>
            <nav class="navbar navbar-static-top" role="navigation"> 
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <li class="dropdown user user-menu"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> <span>Welborn<i class="caret"></i></span> </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue"> 
                                           
                                    <p>Admin</p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="<?php echo base_url(); ?>admin/home/logout">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left"> 
            <aside class="left-side sidebar-offcanvas"> 
                <section class="sidebar">
                    <ul class="sidebar-menu">
                       
                        <li class="treeview <?PHP echo $active_home_link; ?>"> 
                            <a href="#"><i class="fa fa-signal"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i> </a>
                            <ul class="treeview-menu">
                                <li class="<?PHP echo $active_home_slider; ?>"> 
                                    <a  href="<?PHP echo base_url(); ?>admin/master"> 
                                        <i class="fa fa-qrcode"></i> 
                                        <span>Home Slider</span> 
                                    </a> 
                                </li>
                                
                                <li class="<?PHP echo $active_middle_slider; ?>"> 
                                    <a  href="<?PHP echo base_url(); ?>admin/master/middle_slider"> 
                                        <i class="fa fa-user"></i> 
                                        <span>Middle Slider</span> 
                                    </a> 
                                </li>
                                
                                <li class="<?PHP echo $active_home_right_text; ?>"> 
                                    <a  href="<?PHP echo base_url(); ?>admin/master/home_right_text"> 
                                        <i class="fa fa-sitemap"></i> 
                                        <span>Home Right Text</span> 
                                    </a> 
                                </li>
                                <li class="<?PHP echo $active_home_link; ?>"> 
                                    <a  href="<?PHP echo base_url(); ?>admin/master/home_link"> 
                                        <i class="fa fa-sitemap"></i> 
                                        <span>Home Link</span> 
                                    </a> 
                                </li>
                                <li class="<?PHP echo $active_report_program; ?>"> 
                                    <a  href="<?PHP echo base_url(); ?>admin/master/home_program"> 
                                        <i class="fa fa-sitemap"></i> 
                                        <span>Home Program</span> 
                                    </a> 
                                </li>
                                <li class="<?PHP echo $active_report_report; ?>"> 
                                    <a  href="<?PHP echo base_url(); ?>admin/master/home_report"> 
                                        <i class="fa fa-sitemap"></i> 
                                        <span>Home Report</span> 
                                    </a> 
                                </li>
                            </ul>
                        </li>
                        <li class="<?PHP echo $active_about_link; ?>"> 
                            <a href="<?PHP echo base_url(); ?>admin/master/aboutView">
                                <i class="fa fa-signal"></i> <span>About Me</span>
                            </a>
                        </li>
                        <li class="<?PHP echo $active_portfolio_link; ?>"> 
                            <a href="<?PHP echo base_url(); ?>admin/master/portfolioView">
                                <i class="fa fa-signal"></i> <span>Portfolio</span>
                            </a>
                        </li>
                        <li class="<?PHP echo $active_testimonial_link; ?>"> 
                            <a href="<?PHP echo base_url(); ?>admin/master/testimonialsView">
                                <i class="fa fa-signal"></i> <span>Testimonials</span>
                            </a>
                        </li>
                        <li class="<?PHP echo $active_blog_link; ?>"> 
                            <a href="<?PHP echo base_url(); ?>admin/master/blogView">
                                <i class="fa fa-signal"></i> <span>Blog</span>
                            </a>
                        </li>
                        <li class="<?PHP echo $active_contact_link; ?>"> 
                            <a href="<?PHP echo base_url(); ?>admin/master/contactView">
                                <i class="fa fa-signal"></i> <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            
            