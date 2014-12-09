/*
	CARROUSEL JS
*/

var carrousels=
{
	nbSlide:0,
	nbCurrent:1,
	elemCurrent : null,
	elem : null,
	timer: null,
	
	init : function(elem)
	{
			this.nbSlide = elem.find(".slides").length;
		//Créer la pagination
		elem.append('<div class="navigations"></div>');
		for(var i=1;i<=this.nbSlide;i++)
		{
			elem.find(".navigations").append("<span>"+i+"</span>")
		}
		elem.find(".navigations span").click(function(){carrousels.gotoSlide($(this).text());})
		
		//initialisation du carrousel
		this.elem=elem;
		elem.find(".slides").hide();
		elem.find(".slides:first").show();
		this.elemCurrent=elem.find(".slides:first");
		this.elem.find(".navigations span:first").addClass("active");
		
		//le timer
		//this.timer=window.setInterval("carrousel.next()",5000)
		carrousels.play();
		
		//stop quand on passe dessus
		elem.mouseover(carrousels.stop);
		elem.mouseout(carrousels.play);
	},
	
	gotoSlide : function(num)
	{
		if(num==this.nbCurrent){return false;}
		this.elemCurrent.fadeOut();
		this.elem.find("#slides"+num).delay(400).fadeIn();
		this.elem.find(".navigations span").removeClass("active");
		this.elem.find(".navigations span:eq("+(num-1)+")").addClass("active");
		this.nbCurrent=num;
		this.elemCurrent=this.elem.find("#slides"+num);
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
		clearInterval(carrousels.timer);
	},
	
	play:function()
	{
		clearInterval(carrousels.timer);
		carrousels.timer=window.setInterval("carrousels.next()",5000);
	},
}
$(function()
{
	carrousels.init($("#partie4"));
});	//alert(carrousel.nbSlide);