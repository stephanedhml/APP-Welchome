/*
	CARROUSEL JS
*/

var carrouselsss=
{
	nbSlide:0,
	nbCurrent:1,
	elemCurrent : null,
	elem : null,
	timer: null,
	
	init : function(elem)
	{
			this.nbSlide = elem.find(".slidesss").length;
		//Créer la pagination
		elem.append('<div class="navigationsss"></div>');
		for(var i=1;i<=this.nbSlide;i++)
		{
			elem.find(".navigationsss").append("<span>"+i+"</span>")
		}
		elem.find(".navigationsss span").click(function(){carrouselsss.gotoSlide($(this).text());})
		
		//initialisation du carrousel
		this.elem=elem;
		elem.find(".slidesss").hide();
		elem.find(".slidesss:first").show();
		this.elemCurrent=elem.find(".slidesss:first");
		this.elem.find(".navigationsss span:first").addClass("active");
		
		//le timer
		//this.timer=window.setInterval("carrousel.next()",5000)
		carrouselsss.play();
		
		//stop quand on passe dessus
		elem.mouseover(carrouselsss.stop);
		elem.mouseout(carrouselsss.play);
	},
	
	gotoSlide : function(num)
	{
		if(num==this.nbCurrent){return false;}
		this.elemCurrent.fadeOut();
		this.elem.find("#slidesss"+num).delay(400).fadeIn();
		this.elem.find(".navigationsss span").removeClass("active");
		this.elem.find(".navigationsss span:eq("+(num-1)+")").addClass("active");
		this.nbCurrent=num;
		this.elemCurrent=this.elem.find("#slidesss"+num);
		//alert(num);
	},
	
	next: function()
	{
		var num=this.nbCurrent+1;
		if(num>this.nbSlide)
		{
			num=1;
		}
		this.gotoSlide(num);
	},
	
	stop: function()
	{
		clearInterval(carrouselsss.timer);
	},
	
	play:function()
	{
		clearInterval(carrouselsss.timer);
		carrouselsss.timer=window.setInterval("carrouselsss.next()",5000);
	},
}
$(function()
{
	carrouselsss.init($("#partie3"));
});	//alert(carrousel.nbSlide);