function MAX_findObj(n, d) {
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
  d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i>d.layers.length;i++) x=MAX_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}
function MAX_getClientSize() {
	if (window.innerHeight >= 0) {
		return [window.innerWidth, window.innerHeight];
	} else if (document.documentElement && document.documentElement.clientWidth > 0) {
		return [document.documentElement.clientWidth,document.documentElement.clientHeight]
	} else if (document.body.clientHeight > 0) {
		return [document.body.clientWidth,document.body.clientHeight]
	} else {
		return [0, 0]
	}
}
function MAX_adlayers_place_POPUP()
{
	var c = MAX_findObj('MAX_POPUP');

	if (!c)
		return false;

	_s='style'

	var clientSize = MAX_getClientSize()
	ih = clientSize[1]
	iw = clientSize[0]

	if(document.all && !window.opera)
	{
		sl = document.body.scrollLeft || document.documentElement.scrollLeft;
		st = document.body.scrollTop || document.documentElement.scrollTop;
		of = 0;
	}
	else
	{
		sl = window.pageXOffset;
		st = window.pageYOffset;

		if (window.opera)
			of = 0;
		else
			of = 16;
	}

		 c[_s].left = parseInt(sl+(iw - POPUP_WIDTH_DIV) / 2 +0) + (window.opera?'':'px');
		 c[_s].top = parseInt(st+POPUP_TOP) + (window.opera?'':'px');

	c[_s].visibility = MAX_adlayers_visible_POPUP;
}
function MAX_simplepop_POPUP(what)
{
	var c = MAX_findObj('MAX_POPUP');

	if (!c)
		return false;

	if (c.style)
		c = c.style;

	switch(what)
	{
		case 'close':
			MAX_adlayers_visible_POPUP = 'hidden';
			MAX_adlayers_place_POPUP();
			window.clearInterval(MAX_adlayers_timerid_POPUP);
			break;

		case 'open':
			MAX_adlayers_visible_POPUP = 'visible';
			MAX_adlayers_place_POPUP();
			MAX_adlayers_timerid_POPUP = window.setInterval('MAX_adlayers_place_POPUP()', 10);

			//return window.setTimeout('MAX_simplepop_POPUP(\'close\')', 60000);
			return window.setTimeout('MAX_simplepop_POPUP(\'close\')', POPUP_TIME);
			break;
	}
}
var MAX_adlayers_timerid_POPUP;
var MAX_adlayers_visible_POPUP;
MAX_simplepop_POPUP('open');