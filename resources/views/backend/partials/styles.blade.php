<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

          <script src="{!! asset('admin-asset/js/jquery-ui-1.10.3.min.js')!!}" type="text/javascript"></script>
<!-- bootstrap 3.0.2 -->
<link href="{!! asset('admin-asset/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="{!! asset('admin-asset/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="{!! asset('admin-asset/css/ionicons.min.css') !!}" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="{!! asset('admin-asset/css/morris/morris.css') !!}" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="{!! asset('admin-asset/css/jvectormap/jquery-jvectormap-1.2.2.css') !!}" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="{!! asset('admin-asset/css/datepicker/datepicker3.css') !!}" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="{!! asset('admin-asset/css/daterangepicker/daterangepicker-bs3.css') !!}" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="{!! asset('admin-asset/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="{!! asset('admin-asset/css/AdminLTE.css') !!}" rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<link href="{!! asset('admin-asset/css/datatables/dataTables.bootstrap.css') !!}" rel="stylesheet" type="text/css" />
{{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> --}}


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<style>
.inbox_msg {
border: 1px solid #c4c4c4;
clear: both;
overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
display: inline-block;
text-align: right;
width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
color: #05728f;
font-size: 21px;
margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
border: medium none;
padding: 0;
color: #707070;
font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
float: left;
width: 11%;
}
.chat_ib {
float: left;
padding: 0 0 0 15px;
width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
border-bottom: 1px solid #c4c4c4;
margin: 0;
padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
display: inline-block;
width: 6%;
}
.received_msg {
display: inline-block;
padding: 0 0 0 10px;
vertical-align: top;
width: 92%;
}
.received_withd_msg p {
background: #ebebeb none repeat scroll 0 0;
border-radius: 3px;
color: #646464;
font-size: 14px;
margin: 0;
padding: 5px 10px 5px 12px;
width: 100%;
}
.time_date {
color: #747474;
display: block;
font-size: 12px;
margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
float: left;
padding: 30px 15px 0 25px;
width: 60%;
}

.sent_msg p {
background: #05728f none repeat scroll 0 0;
border-radius: 3px;
font-size: 14px;
margin: 0; color:#fff;
padding: 5px 10px 5px 12px;
width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
float: right;
width: 46%;
}
.input_msg_write input {
background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
border: medium none;
color: #4c4c4c;
font-size: 15px;
min-height: 48px;
width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
background: #05728f none repeat scroll 0 0;
border: medium none;
border-radius: 50%;
color: #fff;
cursor: pointer;
font-size: 17px;
height: 33px;
position: absolute;
right: 0;
top: 11px;
width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
height: 516px;
overflow-y: auto;
}
</style>
