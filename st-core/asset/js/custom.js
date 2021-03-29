$(document).ready(function() {
    var section = new Section();
    var home = new Home(section);
    window.loader = new Item(_(".loader")[0]);
    window.background = new Background();
    //window.loader.close();
    window.topLogo = new TopLogo();
    window.dropUs = new DropUs();
    window.cache = {};
    setTimeout(function() {
        dropUs.close();
    }, 5000);

    OurTeam.load = function() {
        if (cache.hasOwnProperty("ourTeam")) {
            section.update(window.cache["ourTeam"]);
            window.ourTeam = new OurTeam(section);
            window.loader.close();
            home.close();
            ourTeam.open();
            return;
        }
        genAjax("ourteam", "set", "", function(res) {
            window.cache["ourTeam"] = res;
            section.update(window.cache["ourTeam"]);
            window.ourTeam = new OurTeam(section);
            window.loader.close();
            home.close();
            ourTeam.open();
        });
    };

    Events.load = function() {
        genAjax("events", "get", "", function(res) {
            section.update(res);
            window.events = new Events(section);
            window.loader.close();
            home.close();
            events.open();
        });
    };
    ContactUs.load = function() {
        genAjax("contactus", "set", "", function(res) {
            section.update(res);
            window.contactUs = new ContactUs(section);
            window.loader.close();
            home.close();
            contactUs.open();
        });
    };

    AboutUs.load = function() {
        if (cache.hasOwnProperty("aboutUs")) {
            section.update(window.cache["aboutUs"]);
            window.aboutUs = new AboutUs(section);
            window.loader.close();
            home.close();
            aboutUs.open();
            return;
        }
        genAjax("aboutus", "get", "", function(res) {
            window.cache["aboutUs"] = res;
            section.update(window.cache["aboutUs"]);
            window.aboutUs = new AboutUs(section);
            window.loader.close();
            home.close();
            aboutUs.open();
        });
    };
    WorkShop.load = function() {
        genAjax("workshops", "get", "", function(res) {
            section.update(res);
            window.workShop = new WorkShop(section);
            window.loader.close();
            home.close();
            workShop.open();
        });
    };

    home.navItem["home"].click(function() {
        navClose();
        home.open();
    });
    home.navItem["ourTeam"].click(function(e) {
        navClose();
        OurTeam.load();
    });
    home.navItem["events"].click(function(e) {
        navClose();
        Events.load();
    });
    home.navItem["aboutUs"].click(function(e) {
        navClose();
        AboutUs.load();
    });
    home.navItem["contactUs"].click(function(e) {
        navClose();
        ContactUs.load();
    });
    home.navItem["workshops"].click(function(e) {
        navClose();
        WorkShop.load();
    });

    home.solar.planet["ourTeam"].click(function(e) {
        navClose();
        OurTeam.load();
    });
    home.solar.planet["events"].click(function(e) {
        Events.load();
    });
    home.solar.planet["aboutus"].click(function(e) {
        AboutUs.load();
    });
    home.solar.planet["workshop"].click(function(e) {
        WorkShop.load();
    });
    home.solar.planet["contactus"].click(function(e) {
        ContactUs.load();
    });

    new Item(_(".homeOpen")[0]).click(function() {
        navClose();
        home.open();
    });

    var currentDate = new Date();

    // Set some date in the future. In this case, it's always Jan 1
    var futureDate = new Date(currentDate.getFullYear(), 2, 30);

    // Calculate the difference in seconds between the future and current date
    var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

    // Instantiate a coutdown FlipClock
    var clock = $('.clock').FlipClock(diff, {
        clockFace: 'DailyCounter',
        countdown: true
    });

    var w = window.innerWidth,
        h = window.innerHeight,
        canvas = document.getElementById('bubble'),
        ctx = canvas.getContext('2d'),
        rate = 30,
        arc = 100,
        time,
        count,
        size = 4,
        speed = 20,
        lights = new Array,
        colors = ['#ffffff'];
    canvas.setAttribute('width', w);
    canvas.setAttribute('height', h);

    function init() {
        time = 0;
        count = 0;

        for (var i = 0; i < arc; i++) {
            lights[i] = {
                x: Math.ceil(Math.random() * w),
                y: Math.ceil(Math.random() * h),
                toX: Math.random() * 5 + 1,
                toY: Math.random() * 5 + 1,
                c: colors[Math.floor(Math.random() * colors.length)],
                size: Math.random() * size
            }
        }
    }

    function bubble() {
        ctx.clearRect(0, 0, w, h);

        for (var i = 0; i < arc; i++) {
            var li = lights[i];

            ctx.beginPath();
            ctx.arc(li.x, li.y, li.size, 0, Math.PI * 2, false);
            ctx.fillStyle = li.c;
            ctx.fill();

            li.x = li.x + li.toX * (time * 0.05);
            li.y = li.y + li.toY * (time * 0.05);

            if (li.x > w) {
                li.x = 0;
            }
            if (li.y > h) {
                li.y = 0;
            }
            if (li.x < 0) {
                li.x = w;
            }
            if (li.y < 0) {
                li.y = h;
            }
        }
        if (time < speed) {
            time++;
        }
        timerID = setTimeout(bubble, 1000 / rate);
    }
    init();
    bubble();

    var animation = 'easeOutCubic';
    delay = 30;

    new Item(_(".hamb")[0]).click();
    $(document)
        .on('click', '.fa-bars', function() {
            var i = 0;
            $('nav').before($('#bubble'));
            $('#bubble').fadeIn();
            $("#bg-blur").fadeIn("fast");
            $('#mainnav').show();
            $('#mainnav').find('li').each(function() {
                var that = $(this);
                i++;
                (function(i, that) {
                    setTimeout(function() {
                        that
                            .animate({
                                'left': screen.width <= 600 ? '-200px' : '-150px'
                            }, {
                                duration: 350,
                                easing: animation
                            })
                            .fadeIn({
                                queue: true
                            });
                    }, delay * i)
                }(i, that))
            });
            $('.fa-bars').fadeOut(100, function() {
                $(this)
                    .removeClass('fa-bars')
                    .addClass('fa-times')
                    .fadeIn();
            });
        })
        .on('click', '#bubble, .fa-times', navClose);

    function navClose() {
        $('#bubble').fadeOut();
        $('#mainnav').hide();
        $('#mainnav').find('li')
            .animate({
                'left': '10px'
            }, {
                duration: 50
            })
            .fadeOut(90);
        $("#bg-blur").fadeOut("fast");
        $('.hamb').fadeOut(50, function() {
            $(this)
                .find($('i'))
                .removeClass('fa-times')
                .addClass('fa-bars')
                .end()
                .fadeIn();
        });
    };
    $("body").ready(function() {
        $("body").show();
        $("html").show();
        particleShow();
    });
    window.loader.close();

    $("#drop-us-modal form").on("submit", function(e) {
        var dataVar = {
            name: e.target.elements["name"].value,
            email: e.target.elements["email"].value,
            message: e.target.elements["message"].value
        }
        window.loader.open();
        genAjax("formtomail", "post", dataVar, function(res) {
            window.loader.close();
            $("#drop-us-modal .success").html(res);
            e.target.reset();
        });
        e.preventDefault();
    });
});
