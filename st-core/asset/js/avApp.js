//Home
class Click {
    constructor() {

    }
    click(fun) {
        this.obj.addEventListener("click", this.playAudio);
        this.obj.addEventListener("click", function() {
            if (typeof(fun) === "function")
                fun(this);
        });
    }
    playAudio() {
        var audio = document.getElementById("av-audio");
        audio.play();
    }
}

class Item extends Click {
    //static load = "";
    constructor(obj) {
        super();
        this.obj = obj;
        this.title = document.title;
        this.isAnimate = false;
        this.openAnimation = "fadeIn";
        this.closeAnimation = "fadeOut";
        if (this.obj.classList.contains("animated")) {
            this.isAnimate = true;
            for (let i = 0; i < this.obj.classList.length; i++) {
                if (this.obj.classList[i] == "animated") {
                    this.indexOfAnimate = i;
                    break;
                }
            }
            this.openAnimation = this.obj.classList[this.indexOfAnimate + 1]
        }
    }
    open() {
        document.title = this.title;
        if (this.isAnimate) {
            this.obj.classList.remove(this.closeAnimation);
            this.obj.classList.add(this.openAnimation);
            return;
        }
        this.obj.style.display = "block";
    }
    close() {
        if (this.isAnimate) {
            this.obj.classList.add(this.closeAnimation);
            this.obj.classList.remove(this.openAnimation);
            return;
        }
        this.obj.style.display = "none";
    }
}

class Background extends Item {
    constructor() {
        super(_(".av-bg-logo")[0]);
        this.current = 0;
        this.images = [];
        this.hostname = (location.protocol === 'https:' ? 'https://' : 'http://')+window.location.hostname+"8080";
        for(let i=0;i<4;i++){
            this.images.push(new Image());
            this.images[i].srcPath = "/asset/img/ext/bg"+i+".jpg";
            this.images[i].src = this.hostname+this.images[i].srcPath;
            this.images[i].classList.add("animated");
            this.images[i].classList.add("fadeIn");
        }
        //this.obj.getElementsByTagName("img")[0].src = this.images[0].srcPath;
        this.obj.appendChild(this.images[0]);
    }
    change(index){
        //this.close();
        this.obj.innerHTML = "";
        this.obj.appendChild(this.images[index]);
        if(index==0){
            this.startAnimation();
            this.obj.style.opacity = .1;
            return;
        }
        this.obj.style.opacity = .2;
        this.stopAnimation();
        //this.open();
    }
    stopAnimation(){
        this.obj.classList.remove("anim-back-2d");
    }
    startAnimation(){
        this.obj.classList.add("anim-back-2d");
    }
}

class Home {
    constructor(section) {
        var nav = document.getElementsByClassName("nav-item");
        this.navItem = {};
        for (let i = 0; i < nav.length; i++) {
            this.navItem[nav[i].innerHTML.toCamelCase()] = new Item(nav[i]);
        }
        this.solar = new Solars();
        this.section = section;
        this.solar.show();
    }
    open() {
        this.section.close();
        this.solar.show();
        $(".astro").show();
        $(".exclemation").show();
        $("#marquee").show();
        $("#clg-iic-logo").show();
        this.countShow();
        window.topLogo.moveCenter();
        window.background.change(0);
    }
    close() {
        this.solar.hide();
        $("#marquee").hide();
        $("#clg-iic-logo").hide();
        $(".astro").hide();
        $(".exclemation").hide();
        this.countHide();
        window.topLogo.moveRightCorner();
    }
    countHide() {
        $(".clock").hide();
    }
    countShow() {
        $(".clock").show();
    }
}
//End Home

// Solar System
class Planets extends Item {
    constructor(obj) {
        super(obj);
        this.obj = obj;
        this.obj.addEventListener("mouseover", function(e) {
            var x = $(e.target).parent().attr("id");
            $("#" + x).css("animation-play-state", "paused");
            $(e.target).css("animation-play-state", "paused");
            $(e.target).children().fadeIn("fast");

        });
        this.obj.addEventListener("mouseleave", function(e) {
            var x = $(e.target).parent().attr("id");
            if ($("#" + x).css("animation-play-state") == "paused" && $(e.target).css("animation-play-state") == "paused") {
                $("#" + x).css("animation-play-state", "running");
                $(e.target).css("animation-play-state", "running");
                $(e.target).children().hide();
            }
        });
    }
    setLable(lbl) {
        this.obj.getElementsByTagName("span")[0].innerHTML = lbl;
    }
}

class Solars extends Item {
    constructor() {
        super(_("#solar"));
        var planet = this.obj.getElementsByClassName("planet");
        this.planet = {};
        for (let i = 0; i < planet.length; i++) {
            this.planet[planet[i].getAttribute("av-name")] = new Planets(planet[i]);
        }

        $(document).mousemove(function(e) {
            if (typeof($(e.target).attr("class")) != "undefined" && $(e.target).attr("class").indexOf("planet") == -1) {
                $(".orbit").css("animation-play-state", "running");
                $(".orbit .planet").css("animation-play-state", "running");
                $(".orbit .planet").children().hide();
            }
        });

        setTimeout(showSolarBg, 1500);

        function showSolarBg() {
            $(".solar-bg").fadeIn();
            $(".front-footer").fadeIn("slow");
            $(".hamb").fadeIn("slow");
        }
    }

    hide() {
        super.close();
        $("#at-solar").hide();
    }
    show() {
        $("#at-solar").show();
        super.open();
    }
    fadeIn() {
        $("#solar").fadeIn(time);
    }
    fadeOut() {
        $("#solar").fadeOut(time);
    }
    setVisibilityHidden() {
        this.obj.style.visibility = "hidden";
    }
    setVisibilityVisible() {
        this.obj.style.visibility = "visible";
    }
}
// End Solar System

class Section extends Item {
    constructor() {
        super(_("#av-section"));
    }
    update(content) {
        this.obj.getElementsByClassName("cnt")[0].innerHTML = content;
    }
    open() {
        this.title = document.title;
        super.open();
    }
}

//Contact Us
class OurTeam extends Item {
    constructor(section) {
        super(_("#ourteam"));
        this.section = section;
        this.title = "Avatar | Our Team";
        var citem = this.obj.getElementsByClassName("memberteam-item");
        this.items = {};
        for (let i = 0; i < citem.length; i++) {
            this.items[citem[i].getAttribute("av-name")] = new Item(citem[i]);
        }
    }
    open() {
        super.open();
        window.background.change(2);
        this.section.open();
        // _(".av-bg-logo")[0].getElementsByTagName("img")[0].setAttribute("src","asset/img/ext/bg1.jpg");
        // _(".av-bg-logo")[0].style.opacity = 1;
        // //_(".av-bg-logo")[0].style.display = "none";
        // _(".av-bg-logo")[0].classList.remove("anim-back-2d");
        // _(".av-bg-logo")[0].classList.add("animated");
        // _(".av-bg-logo")[0].classList.add("fadeIn");
        // //_(".av-bg-logo")[0].style.display = "block";
    }
    close() {
        super.close();
        this.section.close()
    }
    fadeIn(speed) {
        this.section.open()
        $("#" + this.obj.getAttribute("id")).fadeIn(speed);
    }
    fadeOut(speed) {
        $("#" + this.obj.getAttribute("id")).fadeOut(speed);
        this.section.close();
    }
}
class AboutUs extends Item {
    constructor(section) {
        super(_("#aboutus"));
        this.title = "Avatar | About Us";
        this.section = section;
    }
    open() {
        super.open();
        window.background.change(3);
        this.section.open()
    }
    close() {
        super.close();
        this.section.close()
    }
}
//end aboutus
class ContactUs extends Item {
    constructor(section) {
        super(_("#contactus"));
        this.title = "Avatar | Contact Us"
        this.section = section;
    }
    open() {
        super.open();
        window.background.change(1);
        this.section.open()
    }
    close() {
        super.close();
        this.section.close()
    }
}
//end contactus
class WorkShop extends Item {
    constructor(section) {
        super(_("#workshop"));
        this.title = "Avatar | Workshops"
        this.section = section;
    }
    open() {
        super.open();
        this.section.open()
    }
    close() {
        super.close();
        this.section.close()
    }
}
//End workshop

class EventCatModal extends Item {
    constructor(obj) {
        super(obj);
        this.event = {};
        var temp = this.obj.getElementsByClassName("eventitem");
        for (let i = 0; i < temp.length; i++) {
            this.event[temp[i].getAttribute("av-name")] = new Item(temp[i]);
        }
    }
}

class EventCat extends Item {
    constructor(obj) {
        super(obj);
        //this.events = new Item();
        this.modal = new EventCatModal(_("#" + this.obj.getAttribute("av-target")));
    }
}

class Events extends Item {
    constructor(section) {
        super(_("#events"));
        this.title = "Avatar | Events And Competitions";
        this.section = section;
        this.eventCat = {};
        this.eventsModal = {};
        this.abstract = new Item(_("#abstract"));
        var eventCat = this.obj.getElementsByClassName("eventcolumn");
        var eventsModal = this.obj.getElementsByClassName("events");
        this.quotes = new Item(this.obj.getElementsByClassName("eventContent")[0]);
        for (let i = 0; i < eventCat.length; i++) {
            this.eventCat[eventCat[i].getAttribute("av-name")] = new EventCat(eventCat[i]);
        }
        for (let i = 0; i < eventsModal.length; i++) {
            this.eventsModal[eventsModal[i].getAttribute("av-name")] = new Item(eventsModal[i]);
        }
        this.section = section;
        this.init();
    }
    init() {
        var temp = this;
        this.eventCat["eventcat1"].click(function(e) {
            temp.quotes.close();
            $(".firstcolumn").parent().parent().addClass("ACTIVE").siblings().removeClass("ACTIVE");
            temp.eventCat["eventcat1"].modal.open();
            temp.eventCat["eventcat2"].modal.close();
            temp.eventCat["eventcat3"].modal.close();
            temp.eventCat["eventcat4"].modal.close();
            temp.eventCat["eventcat5"].modal.close();
            temp.eventCat["eventcat6"].modal.close();
        });

        this.eventCat["eventcat2"].click(function(e) {
            temp.quotes.close();
            $(".secondcolumn").parent().parent().addClass("ACTIVE").siblings().removeClass("ACTIVE");
            temp.eventCat["eventcat1"].modal.close();
            temp.eventCat["eventcat2"].modal.open();
            temp.eventCat["eventcat3"].modal.close();
            temp.eventCat["eventcat4"].modal.close();
            temp.eventCat["eventcat5"].modal.close();
            temp.eventCat["eventcat6"].modal.close();
        });

        this.eventCat["eventcat3"].click(function(e) {
            temp.quotes.close();
            $(".thirdcolumn").parent().parent().addClass("ACTIVE").siblings().removeClass("ACTIVE");
            temp.eventCat["eventcat1"].modal.close();
            temp.eventCat["eventcat2"].modal.close();
            temp.eventCat["eventcat3"].modal.open();
            temp.eventCat["eventcat4"].modal.close();
            temp.eventCat["eventcat5"].modal.close();
            temp.eventCat["eventcat6"].modal.close();
        });

        this.eventCat["eventcat4"].click(function(e) {
            temp.quotes.close();
            $(".fourthcolumn").parent().parent().addClass("ACTIVE").siblings().removeClass("ACTIVE");
            temp.eventCat["eventcat1"].modal.close();
            temp.eventCat["eventcat2"].modal.close();
            temp.eventCat["eventcat3"].modal.close();
            temp.eventCat["eventcat4"].modal.open();
            temp.eventCat["eventcat5"].modal.close();
            temp.eventCat["eventcat6"].modal.close();
        });

        this.eventCat["eventcat5"].click(function(e) {
            temp.quotes.close();
            $(".fifthcolumn").parent().parent().addClass("ACTIVE").siblings().removeClass("ACTIVE");
            temp.eventCat["eventcat1"].modal.close();
            temp.eventCat["eventcat2"].modal.close();
            temp.eventCat["eventcat3"].modal.close();
            temp.eventCat["eventcat4"].modal.close();
            temp.eventCat["eventcat5"].modal.open();
            temp.eventCat["eventcat6"].modal.close();
        });
        this.eventCat["eventcat6"].click(function(e) {
            temp.quotes.close();
            $(".sixthcolumn").parent().parent().addClass("ACTIVE").siblings().removeClass("ACTIVE");
            temp.eventCat["eventcat1"].modal.close();
            temp.eventCat["eventcat2"].modal.close();
            temp.eventCat["eventcat3"].modal.close();
            temp.eventCat["eventcat4"].modal.close();
            temp.eventCat["eventcat5"].modal.close();
            temp.eventCat["eventcat6"].modal.open();
        });


        //category one events Listener
        this.eventCat["eventcat1"].modal.event[1].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "robowar"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });
        this.eventCat["eventcat1"].modal.event[2].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "lfr"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });
        this.eventCat["eventcat1"].modal.event[3].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "roborace"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });
        this.eventCat["eventcat1"].modal.event[4].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "pic&drop"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });

        //category two events Listener
        this.eventCat["eventcat2"].modal.event[1].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "web"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });
        this.eventCat["eventcat2"].modal.event[2].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "codejam"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });
        this.eventCat["eventcat2"].modal.event[3].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "Ai"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });

        //category three events Listener
        this.eventCat["eventcat3"].modal.event[1].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "matlab"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });
        this.eventCat["eventcat3"].modal.event[2].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "homeautomation"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });


        //category four events Listener
        this.eventCat["eventcat4"].modal.event[1].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "cran-o-mania"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });

        //category five events Listener
        this.eventCat["eventcat5"].modal.event[1].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "olympiad"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });

        this.eventCat["eventcat5"].modal.event[2].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "memewar"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });

        //category six events Listener
        this.eventCat["eventcat6"].modal.event[1].click(function (e) {
            genAjax("abstract", "get", {
                eventName: "pitch"
            }, function (res) {
                window.loader.close();
                _("#abstract").innerHTML = res;
            });
            temp.abstract.open();
        });

    }
    open() {
        super.open();
        this.section.open();
        window.background.change(2);
    }
    close() {
        super.close();
        this.section.close();
    }
}


class TopLogo extends Item {
    constructor() {
        super(_("#top-logo"));
    }
    moveRightCorner() {
        if (screen.width <= 600) {
            this.obj.style = "top: 12px; transform: translate(-2%,-5%) !important; left: auto; right: 0px;";
            return;
        }
        this.obj.style = " top: 0; transform: translate(5%,-5%); width: 281px; height: 90px; left: auto; right: 0px;";
    }
    moveCenter() {
        // if(screen.width <= 360){
        //     this.obj.style="transform: translate(-50%,0); width: 100px; height: 47px;";
        //     return;
        // }
        if (screen.width <= 600) {
            this.obj.style = "transform: translate(-50%,0);";
            return;
        }
        this.obj.style = "transform: translate(-50%,0);";
    }
}

class DropUs extends Item {
    constructor() {
        super(_(".drop-us")[0]);
        this.closeAnimation = "bounceOutLeft";
    }
}


String.prototype.toCamelCase = function() {
    var temp = this.split(" ");
    var res = "";
    res += temp[0].toLowerCase();
    for (let i = 1; i < temp.length; i++) {
        temp[i].toLowerCase();
        res += temp[i].substr(0, 1).toUpperCase() + temp[i].substr(1).toLowerCase();
    }
    return res;
}

function _(str) {
    if (str.substr(0, 1) == ".")
        return document.getElementsByClassName(str.substr(1));
    else if (str.substr(0, 1) == "#")
        return document.getElementById(str.substr(1));
    else
        return document.getElementsByTagName(str);
}

function genAjax(url, method, dataVar, func) {
    var settings = {
        "async": true,
        "url": url,
        "type": method,
        "data": dataVar,
        headers: {
            "cache-control": "no-cache"
        }
    }
    window.loader.open();
    $.ajax(settings)
        .done(func)
        .fail(function() {
            $.notify("Please check your internet connection.", {
                "status": "success"
            });
        });
}
