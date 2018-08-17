var T1=T2='';

function hideb_im()
{
    if (document.getElementById) {
        document.getElementById('b_im').style.visibility='hidden';
    } else {
        if (document.layers) {
            document.layers['b_im'].visibility='hidden';}
			else{if(document.all) {
                document.all.logo_up.style.visibility='hidden';
            }
        }
    }
}

function showb_im()
{
    if (document.getElementById) {
        document.getElementById('b_im').style.visibility='visible';
    } else {
        if (document.layers) {
            document.layers['b_im'].visibility='show';
        } else {
            if (document.all) {
                document.all.logo_up.style.visibility='visible';
            }
        }
    }
}

function ShowAHMStatus(x, y, id)
{
    if (!id) id = document.location.domain;
    alert(id);
    document.write('<style type="text/css">'+corner(x, y)+'</style>');
    document.write('<div id="b_im" style="border:solid 1px black;"');
    document.write('onMouseOver="T1=setTimeout(\'showb_im()\',100);clearTimeout(T2)" ')
    document.write('onMouseOut="T2=setTimeout(\'hideb_im()\',1000);clearTimeout(T1)">');
    document.write('<iframe src="http://www.allhyipmonitors.com/hstatus.php?lid='+id+'&mode=iframe" border=0 frameborder=0 scrolling=0 allowtransparency=false width=500 height=280></iframe>');
    document.write('</div>');
    document.write('<div id="b_fixed">');
    document.write('<a onfocus="this.blur()" href="http://www.allhyipmonitors.com/details/'+id+'" target=_blank><img src="http://www.allhyipmonitors.com/hstatus.php?lid='+id+ '" ');
    document.write('onMouseOver="T1=setTimeout(\'showb_im()\',100);clearTimeout(T2)" ')
    document.write('onMouseOut="T2=setTimeout(\'hideb_im()\',1000);clearTimeout(T1)"></a>');
    document.write('</div>');
}

function corner(hcorner, vcorner)
{
	var hpadding = "30";
	var vpadding = "30";

//	compat_coords_y="_top:0;";
//	compat_coords2='_top:'+vpadding+';}';
	if (typeof document.compatMode!='undefined'&&document.compatMode!='BackCompat') {
		compat_coords_y="_top:expression(document.documentElement.scrollTop+this.clientHeight-100);";
		compat_coords_x="_left:expression(document.documentElement.scrollLeft + document.documentElement.clientWidth - offsetWidth);}";
		compat_coords2="_top:expression(document.documentElement.scrollTop+this.clientHeight-250);}";
	} else {
		compat_coords_x="_left:expression(document.body.scrollLeft + document.body.clientWidth - offsetWidth);}";
		compat_coords_y="_top:expression(document.body.scrollTop+this.clientHeight-100);";
		compat_coords2 ="_top:expression(document.body.scrollTop+this.clientHeight-250);}";
        }

	var logo_style_x='#b_fixed {position:fixed; _position:absolute; right:0px; ';
	var logo_style_y='top:0px; ';

	var logo_style2_x='#b_im {position:fixed; _position:absolute; visibility: hidden; z-index: 102; right: '+hpadding+'px; ';
	var logo_style2_y='top: '+vpadding+'px; ';

	if (hcorner == 'b') {
		logo_style_y='bottom:0px; ';
		logo_style2_y='bottom: '+vpadding+'px; ';
		if (typeof document.compatMode!='undefined'&&document.compatMode!='BackCompat') {
			compat_coords_y="_top:expression(document.documentElement.scrollTop+document.documentElement.clientHeight-this.clientHeight);";
                	compat_coords2="_top:expression(document.documentElement.scrollTop-"+vpadding+"+document.documentElement.clientHeight-this.clientHeight);}";
		} else {
			compat_coords_y="_top:expression(document.body.scrollTop+document.body.clientHeight-this.clientHeight);";
	                compat_coords2="_top:expression(document.body.scrollTop-"+vpadding+"+document.body.clientHeight-this.clientHeight);}";
        	}


	}

	if (vcorner == 'l') {
		logo_style_x='#b_fixed {position:fixed; _position:absolute; left:0px; ';
		logo_style2_x='#b_im {position:fixed; _position:absolute; overflow: hidden; visibility: hidden; z-index: 102; left: '+hpadding+'px; ';
		compat_coords_x='_left:0;}';
	}

	var logo_style=logo_style_x+logo_style_y+compat_coords_y+compat_coords_x;
	var logo_style2=logo_style2_x+logo_style2_y+compat_coords2;
        return logo_style + logo_style2;
}
