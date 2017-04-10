jQuery(document).ready(function(){
  	$('#Animate').animate({
        'marginTop' : "-=20vh" //moves up
    });

    var host="http://"+window.location.hostname+"/";
    if($(window).width()<=992){
		document.getElementById('vn').style.display = 'none';
	}
    if(window.location.href==host){
        document.getElementById('vn').style.display = 'none';
    }
    if(document.getElementById('vn').style.display!= 'none'){
    	document.getElementById('ft').style.paddingLeft="19%";
    	document.getElementById('Animate').style.paddingLeft="19%";
        document.getElementById('hd').style.paddingLeft="19%";
    }
});

window.onresize = function(event) {
    var host="http://"+window.location.hostname+"/";
	if($(window).width()<=992){
		document.getElementById('vn').style.display = 'none';
	}
	if($(window).width()>992){
		document.getElementById('vn').style.display = 'inline';
	}
    if(window.location.href==host){
        document.getElementById('vn').style.display = 'none';
    }
    if(document.getElementById('vn').style.display!= 'none'){
    	document.getElementById('ft').style.paddingLeft="19%";
    	document.getElementById('Animate').style.paddingLeft="19%";
        document.getElementById('hd').style.paddingLeft="19%";
    }else{
    	document.getElementById('ft').style.paddingLeft="0";
    	document.getElementById('Animate').style.paddingLeft="0";
        document.getElementById('hd').style.paddingLeft="0";
    }
};