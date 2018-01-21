function getoptname(nametxt)
{
	if ((nametxt == "Entrepreneur") || (nametxt == "Investor") || (nametxt == "Advisor")){
		document.getElementById('opttext1').innerHTML = "I am an...";
	}
	else{
	document.getElementById('opttext1').innerHTML = "I am a...";
	}
}

function getoptname2(nametxt2)
{
	if ((nametxt2 == "Entrepreneur") || (nametxt2 == "Investor") || (nametxt2 == "Advisor")){
		document.getElementById('opttext2').innerHTML = "Looking for an...";
	}
	else if ((nametxt2 == "Business Partners") || (nametxt2 == "Co Founders") || (nametxt2 == "Collaborators") || (nametxt2 == "Investors")){
		document.getElementById('opttext2').innerHTML = "Looking for...";
	}
	else{
	document.getElementById('opttext2').innerHTML = "Looking for a...";
	}
}

function customDropDown(ele){
            this.dropdown=ele;
            this.placeholder=this.dropdown.find(".placeholder");
            this.options=this.dropdown.find("ul.dropdown-menu > li");
            this.val='';
            this.index=-1;
            this.initEvents();
        }
        customDropDown.prototype={
            initEvents:function(){
                var obj=this;
                obj.dropdown.on("click",function(event){
                    $(this).toggleClass("active");
                });
                
                obj.options.on("click",function(){
                    var opt=$(this);
                    obj.text=opt.find("a").text();
                    obj.val=opt.attr("value");
                    obj.index=opt.index();
                    obj.placeholder.text(obj.text);
					document.getElementById("type1").value = obj.text;
                });
            },
            getText:function(){
                return this.text;
            },
            getValue:function(){
                return this.val;
            },
            getIndex:function(){
                return this.index;
            }
        }
        $(document).ready(function(){
            var mydropdown=new customDropDown($("#dropdown1"));
        });



function customDropDown2(ele){
            this.dropdown=ele;
            this.placeholder=this.dropdown.find(".placeholder");
            this.options=this.dropdown.find("ul.dropdown-menu > li");
            this.val='';
            this.index=-1;
            this.initEvents();
        }
        customDropDown2.prototype={
            initEvents:function(){
                var obj=this;
                obj.dropdown.on("click",function(event){
                    $(this).toggleClass("active");
                });
                
                obj.options.on("click",function(){
                    var opt=$(this);
                    obj.text=opt.find("a").text();
                    obj.val=opt.attr("value");
                    obj.index=opt.index();
                    obj.placeholder.text(obj.text);
					document.getElementById("type2").value = obj.text;
                });
            },
            getText:function(){
                return this.text;
            },
            getValue:function(){
                return this.val;
            },
            getIndex:function(){
                return this.index;
            }
        }
        $(document).ready(function(){
            var mydropdown=new customDropDown2($("#dropdown2"));
        });