<?php
$num = 10;
if (isset($_GET["num"])) {$num = $_GET["num"];}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
        <title>バスロケ弘前大学</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="robots" content="noindex,nofollow">
        <link rel="icon" href="/icon/html_icon.png">
        <link rel="stylesheet" href="bus.css">
        <link rel="canonical" href="https://lopan.jp/google-maps/">
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

        <style>
            html, body, #map { width: 100%; height: 100%; margin: 0; }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php include("keys/googlemap.php"); ?>&callback=initMap" async></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            var bus_stop_lat = [,40.599257,40.598530,40.597047,40.595712,40.595717,40.596338,40.597310,40.598591,40.600237,40.601118,40.602163,40.601020,40.599854,40.602744,40.603452,40.607475,40.604666,40.604054,40.602571,40.599460,40.597045];
            var bus_stop_lng = [,140.481205,140.484652,140.482434,140.480595,140.477905,140.477383,140.476497,140.475393,140.473921,140.473144,140.472100,140.469029,140.465662,140.464521,140.465985,140.469372,140.471575,140.473097,140.475079,140.480292,140.482131];
            var bus_root_lat = [,[40.599060,40.599768,40.599871,40.599871,40.599624,40.599505,40.599438,40.599370,40.598863,40.59887,40.598901,40.598924,40.598527],[40.598527,40.598522,40.598508,40.598488,40.598466,40.598459,40.598458,40.598468,40.598420,40.598379,40.597967,40.597543,40.5970725],[40.5970725,40.596894,40.596799,40.596492,40.596362,40.596186,40.596035,40.595905,40.595777,40.595745],[40.595745,40.595669,40.595608,40.595482,40.595271,40.595249,40.595332,40.595747],[40.595747,40.596099,40.596346],[40.596346,40.597046,40.597190,40.597333],[40.597333,40.597933,40.598025,40.598230,40.598454,40.5986055],[40.5986055,40.599444,40.599873,40.600053,40.600257],[40.600257,40.601136],[40.601136,40.601275,40.601503,40.602195],[40.602195,40.602623,40.602705,40.602769,40.602841,40.602892,40.602947,40.603017,40.603053,40.603175,40.603313,40.603304,40.603261,40.603011,40.602851,40.602522,40.602441,40.602250,40.602150,40.601024],[40.601024,40.600477,40.600432,40.600423,40.600553,40.600583,40.600696,40.600718,40.600762,40.600769,40.600795,40.600795,40.600786,40.600171,40.600126,40.599870,40.599849,40.599848,40.599872,40.599915],[40.599915,40.599928,40.599949,40.599968,40.599995,40.600120,40.600145,40.600237,40.600258,40.600308,40.600708,40.600840,40.600894,40.600911,40.600926,40.601188,40.601230,40.601306,40.602739],[40.602739,40.603090,40.603371,40.603453,40.603523,40.603572,40.603590,40.603580,40.603436],[40.603436,40.603400,40.603391,40.603329,40.603304,40.603255,40.603246,40.603252,40.603274,40.603295,40.603320,40.603350,40.603538,40.603780,40.604388,40.604547,40.604623,40.604644,40.604974,40.605254,40.605958,40.606032,40.606785,40.607354,40.607475,40.607508,40.607510,40.607483,40.607454,40.607449,40.607447],[40.607447,40.607404,40.607380,40.607077,40.607003,40.606904,40.606868,40.606344,40.606270,40.605992,40.605942,40.605353,40.605215,40.604978,40.604917,40.604874,40.604796,40.604762,40.604652,40.604630],[40.604630,40.604614,40.604584,40.604525,40.604430,40.604328,40.604204,40.604146,40.604031],[40.604031,40.603908,40.603756,40.603609,40.603309,40.603229,40.603133,40.603049,40.603013,40.602930,40.602899,40.602851,40.602555],[40.602555,40.602269,40.602213,40.602023,40.601876,40.601798,40.601548,40.601489,40.601418,40.601364,40.601313,40.601295,40.601233,40.601203,40.601139,40.600950,40.600706,40.600642,40.600592,40.600496,40.600473,40.600454,40.600406,40.600367,40.600359,40.600353,40.600345,40.600309,40.600250,40.600188,40.600083,40.599518,40.599465],[40.599465,40.599350,40.599206,40.599053,40.598844,40.598812,40.598707,40.598634,40.598619,40.598586,40.598312,40.598263,40.598201,40.598146,40.598111,40.598023,40.597037,40.596884,40.596753,40.596723,40.596710,40.596717,40.596739,40.596910,40.596981,40.597027],[40.597027,40.597275,40.597349,40.597549,40.597631,40.598076,40.598305,40.598367,40.598394,40.598414,40.598444,40.598460,40.598486,40.598513,40.598545,40.598570,40.598599,40.598618,40.598762,40.598784,40.598829,40.598858,40.598863]];
            var bus_root_lng = [,[140.481401,140.482666,140.482862,140.483102,140.483598,140.483812,140.483908,140.483957,140.484149,140.48424,140.484346,140.484471,140.484642],[140.484642,140.484644,140.484602,140.484517,140.484398,140.48436,140.48431,140.484257,140.484234,140.484168,140.4836195,140.483042,140.4823995],[140.4823995,140.482160,140.4820535,140.481641,140.481457,140.481218,140.481010,140.480834,140.480627,140.480564],[140.480564,140.480406,140.480244,140.479739,140.478751,140.4784905,140.478331,140.477962],[140.477962,140.477640,140.477398],[140.477398,140.476776,140.476658,140.476543],[140.476543,140.476013,140.475918,140.475740,140.475556,140.475422],[140.475422,140.474676,140.474295,140.474142,140.473961],[140.473961,140.473178],[140.473178,140.473055,140.472829,140.472157],[140.472157,140.471741,140.471646,140.471562,140.471452,140.471360,140.471243,140.471039,140.470914,140.470387,140.469598,140.469559,140.469538,140.469474,140.469448,140.469368,140.469348,140.469308,140.469273,140.469001],[140.469001,140.468855,140.468812,140.468712,140.467984,140.467774,140.467117,140.467012,140.466763,140.466639,140.466501,140.466472,140.466456,140.466273,140.466227,140.466148,140.466126,140.466082,140.465968,140.465696],[140.465696,140.465658,140.465633,140.465625,140.465628,140.465661,140.465661,140.465641,140.465640,140.465652,140.465772,140.465802,140.465819,140.465811,140.465788,140.464258,140.464175,140.464167,140.464553],[140.464553,140.464651,140.464706,140.464735,140.464775,140.464839,140.464957,140.465094,140.465981],[140.465981,140.466201,140.466286,140.466673,140.466849,140.467147,140.467228,140.467295,140.467364,140.467400,140.467432,140.467453,140.467498,140.467559,140.467706,140.467734,140.467752,140.467750,140.467828,140.467895,140.468057,140.468091,140.468257,140.468400,140.468470,140.468595,140.468696,140.468992,140.469252,140.469342,140.469367],[140.469367,140.469734,140.469862,140.470315,140.470390,140.470400,140.470397,140.470275,140.470255,140.470192,140.470177,140.470041,140.470005,140.469961,140.469975,140.470045,140.470547,140.470710,140.471440,140.471565],[140.471565,140.471653,140.471808,140.472053,140.472327,140.472552,140.472791,140.472889,140.473073],[140.473073,140.473261,140.473423,140.473565,140.473850,140.473932,140.474042,140.474156,140.474206,140.474351,140.474408,140.474499,140.475065],[140.475065,140.475613,140.475717,140.476055,140.476322,140.476455,140.476875,140.476975,140.477089,140.477166,140.477221,140.477242,140.477323,140.477370,140.477472,140.477775,140.478182,140.478313,140.478465,140.478835,140.478915,140.478989,140.479238,140.479492,140.479555,140.479612,140.479664,140.479758,140.480199,140.480360,140.480411,140.480275,140.480261],[140.480261,140.480232,140.480199,140.480176,140.480174,140.480175,140.480185,140.480200,140.480204,140.480214,140.480305,140.480334,140.480372,140.480407,140.480428,140.480492,140.481282,140.481423,140.481529,140.481571,140.481627,140.481693,140.481744,140.481977,140.482093,140.482155],[140.482155,140.482494,140.482596,140.482870,140.482986,140.483635,140.483949,140.484033,140.484065,140.484085,140.484104,140.484111,140.484117,140.484121,140.484112,140.484101,140.484105,140.484115,140.484059,140.484053,140.484049,140.484084,140.484149]];
            var bus_stop_name = [,"弘前バスターミナル","弘前駅前","大町一丁目","大町二丁目","上土手町","市立病院前","土手町十文字","青銀土手町支店","中土手町","蓬莱橋","下土手町","本町","大学病院前","市役所前","陸奥新報社前","文化センター前","ホテルニューキャッスル前","徒町","中央通り二丁目","並木通りバスターミナル前","ヒロロ前"];
            var bus_root = [];
            var marker = [];
            var bus_stop = [];
            var bounce_num = 0;
            var send = [,0,0,0,0,0,0,0];
            var date = new Date();
            var predict_date = [,new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date(),new Date()];
            var predict_time = [,,,,,,,,,,,,,,,,,,,,,];
            var x;
            var y;
            for ($i=1; $i<=21; $i++) {
                bus_root.push({lat:bus_stop_lat[$i],lng:bus_stop_lng[$i]});
                if (bus_root_lat[$i].length) {
                    for ($l=0; $l<bus_root_lat[$i].length; $l++) {
                        bus_root.push({lat:bus_root_lat[$i][$l],lng:bus_root_lng[$i][$l]});
                    }
                }
            }
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 16,
                            center: { lat: bus_stop_lat[<?=$num?>], lng: bus_stop_lng[<?=$num?>] },
                            disableDefaultUI: true
                        });
                for ($i=1; $i<=7; $i++) {
                    marker[$i] = new google.maps.Marker({
                                    map: map,
                                    icon: {
                                        url: "/icon/bus_icon"+$i+".png",
                                        scaledSize: new google.maps.Size(50,50),
                                        anchor: new google.maps.Point(25, 25)
                                    },
                                    zIndex: 28-$i
                                });
                }
                new google.maps.Polyline({
                    map: map,
                    path: bus_root,
                    geodesic: true,
                    clickable: false,
                    strokeColor: '#669df6',
                    strokeOpacity: 1.0,
                    strokeWeight: 6
                });
                bus_stop[1] = new google.maps.Marker({
                                position: { lat: bus_stop_lat[1], lng: bus_stop_lng[1] },
                                map: map,
                                icon: {
                                    url: "/icon/bus_stop.png",
                                    scaledSize: new google.maps.Size(50,50)
                                },
                                zIndex: 28
                            });
                for ($i=2; $i<=21; $i++) {
                    bus_stop[$i] = new google.maps.Marker({
                                    position: { lat: bus_stop_lat[$i], lng: bus_stop_lng[$i] },
                                    map: map,
                                    icon: {
                                        url: "/icon/bus_stop.png",
                                        scaledSize: new google.maps.Size(50,50)
                                    },
                                    zIndex: 22-$i
                                });
                }
                function bus_stop_bounce(num) {
                    bus_stop[num].setAnimation(google.maps.Animation.BOUNCE);
                    document.getElementById("destination").innerHTML = bus_stop_name[num];
                    document.getElementById("time").innerHTML = predict_time[num];
                    if (bounce_num == 0) {
                        $('#timetable').animate(
                            {'left': '30px'},
                            {'duration': 500, 'easing': 'swing'}
                        );
                    }
                    else if (bounce_num != num) {
                        bus_stop[bounce_num].setAnimation(null);
                    }
                    bounce_num = num;
                }
                bus_stop[1].addListener("click", () => {bus_stop_bounce(1);});
                bus_stop[2].addListener("click", () => {bus_stop_bounce(2);});
                bus_stop[3].addListener("click", () => {bus_stop_bounce(3);});
                bus_stop[4].addListener("click", () => {bus_stop_bounce(4);});
                bus_stop[5].addListener("click", () => {bus_stop_bounce(5);});
                bus_stop[6].addListener("click", () => {bus_stop_bounce(6);});
                bus_stop[7].addListener("click", () => {bus_stop_bounce(7);});
                bus_stop[8].addListener("click", () => {bus_stop_bounce(8);});
                bus_stop[9].addListener("click", () => {bus_stop_bounce(9);});
                bus_stop[10].addListener("click", () => {bus_stop_bounce(10);});
                bus_stop[11].addListener("click", () => {bus_stop_bounce(11);});
                bus_stop[12].addListener("click", () => {bus_stop_bounce(12);});
                bus_stop[13].addListener("click", () => {bus_stop_bounce(13);});
                bus_stop[14].addListener("click", () => {bus_stop_bounce(14);});
                bus_stop[15].addListener("click", () => {bus_stop_bounce(15);});
                bus_stop[16].addListener("click", () => {bus_stop_bounce(16);});
                bus_stop[17].addListener("click", () => {bus_stop_bounce(17);});
                bus_stop[18].addListener("click", () => {bus_stop_bounce(18);});
                bus_stop[19].addListener("click", () => {bus_stop_bounce(19);});
                bus_stop[20].addListener("click", () => {bus_stop_bounce(20);});
                bus_stop[21].addListener("click", () => {bus_stop_bounce(21);});
                setInterval(update, 5000);
            }
            function update(){
                $.ajax({
                    type: "GET",
                    url: "ajax.php",
                    data: {
                        num1: send[1], num2: send[2], num3: send[3], num4: send[4], num5: send[5], num6: send[6], num7: send[7]
                    }
                })
                .done(function(result){
                    date = new Date();
                    for ($i=1; $i<=21; $i++) {predict_date[$i] = new Date();}
                    for ($i=1; $i<=7; $i++) {
                        send[$i] = result[$i][0];
                        marker[$i].setPosition({ lat: result[$i][1][0] , lng: result[$i][1][1] });
                    }
                    for ($i=1; $i<=21; $i++) {
                        predict_date[$i].setSeconds(date.getSeconds()+result[8][$i]);
                        predict_time[$i] = "　" + (predict_date[$i].getMonth()+1) + "月" + predict_date[$i].getDate() + "日　" + zeroPadding(predict_date[$i].getHours()) + ":" + zeroPadding(predict_date[$i].getMinutes());
                    }
                    document.getElementById("time").innerHTML = predict_time[bounce_num];
                }).fail(function(){window.location.reload();});
            }
            function zeroPadding(num) {
                return ('00' + num).slice(-2);
            }
            function mousedown(e) {
                this.classList.add("drag");
                if(e.type === "mousedown") {
                    var event = e;
                } else {
                    var event = e.changedTouches[0];
                }
                e.preventDefault();
                x = event.pageX - this.offsetLeft;
                y = event.pageY - this.offsetTop;
                document.body.addEventListener("mousemove", mousemove, false);
                document.body.addEventListener("touchmove", mousemove, false);
            }
            function mousemove(e) {
                var drag = document.getElementsByClassName("drag")[0];
                if(e.type === "mousemove") {
                    var event = e;
                } else {
                    var event = e.changedTouches[0];
                }
                e.preventDefault();
                drag.style.top = event.pageY - y + "px";
                drag.style.left = event.pageX - x + "px";
                drag.addEventListener("mouseup", mouseup, false);
                drag.addEventListener("touchend", mouseup, false);
            }
            function mouseup(e) {
                var drag = document.getElementsByClassName("drag")[0];
                document.body.removeEventListener("mousemove", mousemove, false);
                drag.removeEventListener("mouseup", mouseup, false);
                document.body.removeEventListener("touchmove", mousemove, false);
                drag.removeEventListener("touchend", mouseup, false);
                drag.classList.remove("drag");
            }
            function tableclose() {
                $('#timetable').css("left", '');
                $('#timetable').css("top", '');
                bus_stop[bounce_num].setAnimation(null);
                bounce_num = 0;
                document.body.removeEventListener("mousemove", mousemove, false);
                document.body.removeEventListener("touchmove", mousemove, false);
            }
            window.onload = () => {initMap();}

        </script>
    </head>

    <body>
        <div id="map" class="map"></div>
        <div class="timetable" id="timetable">
            <div id="close">×</div>
            <p id="destination"></p>
            <p id="middle">に次に到着する予想時刻は</p>
            <p id="time"></p>
        </div>
        <script type="text/javascript">
            var table = document.getElementById("timetable");
            table.addEventListener("mousedown", mousedown, false);
            table.addEventListener("touchstart", mousedown, false);
            document.getElementById("close").addEventListener("click", tableclose, false);
            document.getElementById("close").addEventListener("touchend", tableclose, false);
        </script>
    </body>

</html>
