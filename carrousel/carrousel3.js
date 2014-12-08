/*
	CARROUSEL JS
*/

var carrouselss=
{
	nbSlide:0,
	nbCurrent:1,
	elemCurrent : null,
	elem : null,
	timer: null,
	
	init : function(elem)
	{
			this.nbSlide = elem.find(".slidess").length;
		//Créer la pagination
		elem.append('<div class="navigationss"></div>');
		for(var i=1;i<=this.nbSlide;i++)
		{
			elem.find(".navigationss").append("<span>"+i+"</span>")
		}
		elem.find(".navigationss span").click(function(){carrouselss.gotoSlide($(this).text());})
		
		//initialisation du carrousel
		this.elem=elem;
		elem.find(".slidess").hide();
		elem.find(".slidess:first").show();
		this.elemCurrent=elem.find(".slidess:first");
		this.elem.find(".navigationss span:first").addClass("active");
		
		//le timer
		//this.timer=window.setInterval("carrousel.next()",5000)
		carrouselss.play();
		
		//stop quand on passe dessus
		elem.mouseover(carrouselss.stop);
		elem.mouseout(carrouselss.play);
	},
	
	gotoSlide : function(num)
	{
		if(num==this.nbCurrent){return false;}
		this.elemCurrent.fadeOut();
		this.elem.find("#slidess"+num).delay(400).fadeIn();
		this.elem.find(".navigationss span").removeClass("active");
		this.elem.find(".navigationss span:eq("+(num-1)+")").addClass("active");
		this.nbCurrent=num;
		this.elemCurrent=this.elem.find("#slidess"+num);
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
		clearInterval(carrouselss.timer);
	},
	
	play:function()
	{
		clearInterval(carrouselss.timer);
		carrouselss.timer=window.setInterval("carrouselss.next()",5000);
	},
}
$(function()
{
	carrouselss.init($("#partie5"));
});	//alert(carrousel.nbSlide);