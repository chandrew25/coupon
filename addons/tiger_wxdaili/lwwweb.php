<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>乐维小程序下载页面</title>
<style>
html, body{
    height:99%;
    width:100%;
    font-family: 'Raleway', sans-serif;
    background-color:#efefef;
    display: table;
    text-align: center;
} 
a:link { 
    text-decoration: none;
    color:#3e3e3e
}
.toast__container {
    display: table-cell;
    vertical-align: middle;
}
.toast__cell{
    display:inline-block;
}
.add-margin{
    margin-top:20px;
}
.toast {
    padding: 21px 0;
    background-color: #fff;
    border-radius: 4px;
    min-width: 460px;
    top: 0px;
    position: relative;
    box-shadow: 1px 7px 14px -5px rgba(0,0,0,0.2);
    text-align: center;
}
.toast:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    border-top-left-radius:4px;
    border-bottom-left-radius: 4px;
}
.toast__type {
    color: #3e3e3e;
    font-weight: 700;
    margin-top: 0;
    margin-bottom: 8px;
}
.toast__content{
    padding-left:70px;
    padding-right:60px;
}
.toast--green:before{
    background-color:#2BDE3F;
}
.toast--blue:before{
    background-color:#1D72F3;
}
.toast--yellow:before{
    background-color:#FFC007;
}
h2{
    margin-bottom:60px;
    font-family: 'Raleway', sans-serif;
}
</style>
</head>
<body>
<div class="toast__container">
<div class="toast__cell">
<h1>乐维小程序下载页面</h1>
<div class="toast toast--green">
  <div class="toast__content">
	<p class="toast__type"><a href="">本模块无小程序</a></p>
  </div>
</div>
</div>
</div>
<script>
jQuery(document).ready(function(){
  jQuery('.toast__close').click(function(e){
    e.preventDefault();
    var parent = $(this).parent('.toast');
    parent.fadeOut("slow", function() { $(this).remove(); } );
  });
});
</script>
</body>
</html>