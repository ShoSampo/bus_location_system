<?php
$num = 10;
if (isset($_GET["num"])) {$num = $_GET["num"];}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="utf-8">
        <title>ルートポイント</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="robots" content="noindex,nofollow">
        <link rel="icon" href="/icon/point.png">
        <link rel="stylesheet" href="bus_simulation.css">
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
            var Root = [[],[40.59906,140.481401],[40.599351,140.481927],[40.599642,140.482453],[40.599934,140.482978],[40.599686,140.483443],[40.599438,140.483908],[40.599151,140.484028],[40.598863,140.484149],[40.598924,140.484471],[40.598527,140.484642],[40.59842,140.484237],[40.598201,140.483938],[40.597982,140.483639],[40.597763,140.48334],[40.597543,140.483042],[40.597295,140.482738],[40.5970725,140.4823995],[40.596794,140.482069],[40.59654,140.481704],[40.596328,140.481414],[40.596116,140.481124],[40.595905,140.480834],[40.595745,140.480564],[40.595608,140.480244],[40.595527,140.479883],[40.595446,140.479522],[40.595365,140.479161],[40.595284,140.4788],[40.595204,140.47844],[40.595461,140.478172],[40.595747,140.477962],[40.596028,140.477644],[40.596346,140.477398],[40.596692,140.47708],[40.597046,140.476776],[40.597333,140.476543],[40.597632,140.476275],[40.597931,140.476007],[40.59823,140.47574],[40.5986055,140.475422],[40.598923,140.47514],[40.59924,140.474858],[40.599557,140.474576],[40.599873,140.474295],[40.600257,140.473961],[40.60055,140.4737],[40.600843,140.473439],[40.601136,140.473178],[40.601401,140.472923],[40.601666,140.472668],[40.601931,140.472413],[40.602195,140.472157],[40.602623,140.471741],[40.602841,140.471452],[40.603017,140.471039],[40.603114,140.47065],[40.603218,140.4701],[40.603321,140.469551],[40.602956,140.469462],[40.602591,140.469372],[40.602226,140.469283],[40.60186,140.469193],[40.601442,140.469097],[40.601024,140.469001],[40.600712,140.468919],[40.600399,140.468836],[40.600482,140.468362],[40.600565,140.467888],[40.600649,140.467414],[40.600732,140.46694],[40.600815,140.466465],[40.600489,140.466356],[40.600163,140.466247],[40.599838,140.466137],[40.599915,140.465696],[40.600258,140.46564],[40.600589,140.465734],[40.600919,140.465827],[40.600992,140.465405],[40.601065,140.464983],[40.601137,140.464561],[40.60121,140.46414],[40.601516,140.464223],[40.601822,140.464306],[40.602128,140.464389],[40.602434,140.464472],[40.602739,140.464553],[40.603029,140.464646],[40.603319,140.464739],[40.60361,140.464832],[40.603552,140.465215],[40.603494,140.465598],[40.603436,140.465981],[40.603364,140.466456],[40.603292,140.466931],[40.60322,140.467407],[40.603579,140.467497],[40.603938,140.467587],[40.604296,140.467677],[40.604656,140.46776],[40.605016,140.467843],[40.605376,140.467927],[40.605735,140.468014],[40.606094,140.468101],[40.606454,140.468187],[40.606813,140.468274],[40.607172,140.468361],[40.607532,140.468447],[40.60749,140.468907],[40.607447,140.469367],[40.60738,140.469862],[40.607189,140.470143],[40.606997,140.470423],[40.606645,140.470342],[40.606293,140.470261],[40.605942,140.470181],[40.60559,140.470101],[40.605238,140.470021],[40.604887,140.46994],[40.604823,140.470346],[40.604759,140.470752],[40.604695,140.471158],[40.604630,140.471565],[40.604525,140.472053],[40.604403,140.472405],[40.604204,140.472791],[40.604031,140.473073],[40.603756,140.473423],[40.603436,140.473743],[40.603115,140.474063],[40.602899,140.474408],[40.602727,140.474737],[40.602555,140.475065],[40.602398,140.475365],[40.602241,140.475665],[40.602068,140.475968],[40.601895,140.476271],[40.601722,140.476574],[40.601548,140.476875],[40.601364,140.477166],[40.601139,140.477472],[40.600972,140.477747],[40.600805,140.478022],[40.600637,140.478296],[40.600546,140.478642],[40.600454,140.478989],[40.600387,140.479365],[40.600309,140.479758],[40.600264,140.480101],[40.600219,140.480444],[40.599842,140.480352],[40.599465,140.480261],[40.59913,140.480188],[40.598707,140.480185],[40.598312,140.480305],[40.598023,140.480492],[40.597811,140.480665],[40.597599,140.480838],[40.597387,140.481011],[40.597175,140.481184],[40.596963,140.481357],[40.596751,140.48153]];
            var bus_root = [];
            var marker = [];
            var bus_stop = [];
            var point = [];
            var info = [];
            var bounce_num = 0;
            var send = [,0,0,0,0,0,0,0];
            var send_flag = [];
            var flag;
            var date = new Date();
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
                for ($i=1; $i<Root.length; $i++) {
                    point[$i] = new google.maps.Marker({
                                    position: { lat: Root[$i][0], lng: Root[$i][1] },
                                    map: map,
                                    icon: {
                                        url: "/icon/point.png",
                                        scaledSize: new google.maps.Size(10,10),
                                        anchor: new google.maps.Point(5, 5)
                                    },
                                    zIndex: 28+$i
                                });
                    info[$i] = new google.maps.InfoWindow({
                                   position: { lat: Root[$i][0], lng: Root[$i][1] },
                                   content: String($i)
                               });
                }
                point[1].addListener("mouseover", () => {info[1].open(map);});
                point[2].addListener("mouseover", () => {info[2].open(map);});
                point[3].addListener("mouseover", () => {info[3].open(map);});
                point[4].addListener("mouseover", () => {info[4].open(map);});
                point[5].addListener("mouseover", () => {info[5].open(map);});
                point[6].addListener("mouseover", () => {info[6].open(map);});
                point[7].addListener("mouseover", () => {info[7].open(map);});
                point[8].addListener("mouseover", () => {info[8].open(map);});
                point[9].addListener("mouseover", () => {info[9].open(map);});
                point[10].addListener("mouseover", () => {info[10].open(map);});
                point[11].addListener("mouseover", () => {info[11].open(map);});
                point[12].addListener("mouseover", () => {info[12].open(map);});
                point[13].addListener("mouseover", () => {info[13].open(map);});
                point[14].addListener("mouseover", () => {info[14].open(map);});
                point[15].addListener("mouseover", () => {info[15].open(map);});
                point[16].addListener("mouseover", () => {info[16].open(map);});
                point[17].addListener("mouseover", () => {info[17].open(map);});
                point[18].addListener("mouseover", () => {info[18].open(map);});
                point[19].addListener("mouseover", () => {info[19].open(map);});
                point[20].addListener("mouseover", () => {info[20].open(map);});
                point[21].addListener("mouseover", () => {info[21].open(map);});
                point[22].addListener("mouseover", () => {info[22].open(map);});
                point[23].addListener("mouseover", () => {info[23].open(map);});
                point[24].addListener("mouseover", () => {info[24].open(map);});
                point[25].addListener("mouseover", () => {info[25].open(map);});
                point[26].addListener("mouseover", () => {info[26].open(map);});
                point[27].addListener("mouseover", () => {info[27].open(map);});
                point[28].addListener("mouseover", () => {info[28].open(map);});
                point[29].addListener("mouseover", () => {info[29].open(map);});
                point[30].addListener("mouseover", () => {info[30].open(map);});
                point[31].addListener("mouseover", () => {info[31].open(map);});
                point[32].addListener("mouseover", () => {info[32].open(map);});
                point[33].addListener("mouseover", () => {info[33].open(map);});
                point[34].addListener("mouseover", () => {info[34].open(map);});
                point[35].addListener("mouseover", () => {info[35].open(map);});
                point[36].addListener("mouseover", () => {info[36].open(map);});
                point[37].addListener("mouseover", () => {info[37].open(map);});
                point[38].addListener("mouseover", () => {info[38].open(map);});
                point[39].addListener("mouseover", () => {info[39].open(map);});
                point[40].addListener("mouseover", () => {info[40].open(map);});
                point[41].addListener("mouseover", () => {info[41].open(map);});
                point[42].addListener("mouseover", () => {info[42].open(map);});
                point[43].addListener("mouseover", () => {info[43].open(map);});
                point[44].addListener("mouseover", () => {info[44].open(map);});
                point[45].addListener("mouseover", () => {info[45].open(map);});
                point[46].addListener("mouseover", () => {info[46].open(map);});
                point[47].addListener("mouseover", () => {info[47].open(map);});
                point[48].addListener("mouseover", () => {info[48].open(map);});
                point[49].addListener("mouseover", () => {info[49].open(map);});
                point[50].addListener("mouseover", () => {info[50].open(map);});
                point[51].addListener("mouseover", () => {info[51].open(map);});
                point[52].addListener("mouseover", () => {info[52].open(map);});
                point[53].addListener("mouseover", () => {info[53].open(map);});
                point[54].addListener("mouseover", () => {info[54].open(map);});
                point[55].addListener("mouseover", () => {info[55].open(map);});
                point[56].addListener("mouseover", () => {info[56].open(map);});
                point[57].addListener("mouseover", () => {info[57].open(map);});
                point[58].addListener("mouseover", () => {info[58].open(map);});
                point[59].addListener("mouseover", () => {info[59].open(map);});
                point[60].addListener("mouseover", () => {info[60].open(map);});
                point[61].addListener("mouseover", () => {info[61].open(map);});
                point[62].addListener("mouseover", () => {info[62].open(map);});
                point[63].addListener("mouseover", () => {info[63].open(map);});
                point[64].addListener("mouseover", () => {info[64].open(map);});
                point[65].addListener("mouseover", () => {info[65].open(map);});
                point[66].addListener("mouseover", () => {info[66].open(map);});
                point[67].addListener("mouseover", () => {info[67].open(map);});
                point[68].addListener("mouseover", () => {info[68].open(map);});
                point[69].addListener("mouseover", () => {info[69].open(map);});
                point[70].addListener("mouseover", () => {info[70].open(map);});
                point[71].addListener("mouseover", () => {info[71].open(map);});
                point[72].addListener("mouseover", () => {info[72].open(map);});
                point[73].addListener("mouseover", () => {info[73].open(map);});
                point[74].addListener("mouseover", () => {info[74].open(map);});
                point[75].addListener("mouseover", () => {info[75].open(map);});
                point[76].addListener("mouseover", () => {info[76].open(map);});
                point[77].addListener("mouseover", () => {info[77].open(map);});
                point[78].addListener("mouseover", () => {info[78].open(map);});
                point[79].addListener("mouseover", () => {info[79].open(map);});
                point[80].addListener("mouseover", () => {info[80].open(map);});
                point[81].addListener("mouseover", () => {info[81].open(map);});
                point[82].addListener("mouseover", () => {info[82].open(map);});
                point[83].addListener("mouseover", () => {info[83].open(map);});
                point[84].addListener("mouseover", () => {info[84].open(map);});
                point[85].addListener("mouseover", () => {info[85].open(map);});
                point[86].addListener("mouseover", () => {info[86].open(map);});
                point[87].addListener("mouseover", () => {info[87].open(map);});
                point[88].addListener("mouseover", () => {info[88].open(map);});
                point[89].addListener("mouseover", () => {info[89].open(map);});
                point[90].addListener("mouseover", () => {info[90].open(map);});
                point[91].addListener("mouseover", () => {info[91].open(map);});
                point[92].addListener("mouseover", () => {info[92].open(map);});
                point[93].addListener("mouseover", () => {info[93].open(map);});
                point[94].addListener("mouseover", () => {info[94].open(map);});
                point[95].addListener("mouseover", () => {info[95].open(map);});
                point[96].addListener("mouseover", () => {info[96].open(map);});
                point[97].addListener("mouseover", () => {info[97].open(map);});
                point[98].addListener("mouseover", () => {info[98].open(map);});
                point[99].addListener("mouseover", () => {info[99].open(map);});
                point[100].addListener("mouseover", () => {info[100].open(map);});
                point[101].addListener("mouseover", () => {info[101].open(map);});
                point[102].addListener("mouseover", () => {info[102].open(map);});
                point[103].addListener("mouseover", () => {info[103].open(map);});
                point[104].addListener("mouseover", () => {info[104].open(map);});
                point[105].addListener("mouseover", () => {info[105].open(map);});
                point[106].addListener("mouseover", () => {info[106].open(map);});
                point[107].addListener("mouseover", () => {info[107].open(map);});
                point[108].addListener("mouseover", () => {info[108].open(map);});
                point[109].addListener("mouseover", () => {info[109].open(map);});
                point[110].addListener("mouseover", () => {info[110].open(map);});
                point[111].addListener("mouseover", () => {info[111].open(map);});
                point[112].addListener("mouseover", () => {info[112].open(map);});
                point[113].addListener("mouseover", () => {info[113].open(map);});
                point[114].addListener("mouseover", () => {info[114].open(map);});
                point[115].addListener("mouseover", () => {info[115].open(map);});
                point[116].addListener("mouseover", () => {info[116].open(map);});
                point[117].addListener("mouseover", () => {info[117].open(map);});
                point[118].addListener("mouseover", () => {info[118].open(map);});
                point[119].addListener("mouseover", () => {info[119].open(map);});
                point[120].addListener("mouseover", () => {info[120].open(map);});
                point[121].addListener("mouseover", () => {info[121].open(map);});
                point[122].addListener("mouseover", () => {info[122].open(map);});
                point[123].addListener("mouseover", () => {info[123].open(map);});
                point[124].addListener("mouseover", () => {info[124].open(map);});
                point[125].addListener("mouseover", () => {info[125].open(map);});
                point[126].addListener("mouseover", () => {info[126].open(map);});
                point[127].addListener("mouseover", () => {info[127].open(map);});
                point[128].addListener("mouseover", () => {info[128].open(map);});
                point[129].addListener("mouseover", () => {info[129].open(map);});
                point[130].addListener("mouseover", () => {info[130].open(map);});
                point[131].addListener("mouseover", () => {info[131].open(map);});
                point[132].addListener("mouseover", () => {info[132].open(map);});
                point[133].addListener("mouseover", () => {info[133].open(map);});
                point[134].addListener("mouseover", () => {info[134].open(map);});
                point[135].addListener("mouseover", () => {info[135].open(map);});
                point[136].addListener("mouseover", () => {info[136].open(map);});
                point[137].addListener("mouseover", () => {info[137].open(map);});
                point[138].addListener("mouseover", () => {info[138].open(map);});
                point[139].addListener("mouseover", () => {info[139].open(map);});
                point[140].addListener("mouseover", () => {info[140].open(map);});
                point[141].addListener("mouseover", () => {info[141].open(map);});
                point[142].addListener("mouseover", () => {info[142].open(map);});
                point[143].addListener("mouseover", () => {info[143].open(map);});
                point[144].addListener("mouseover", () => {info[144].open(map);});
                point[145].addListener("mouseover", () => {info[145].open(map);});
                point[146].addListener("mouseover", () => {info[146].open(map);});
                point[147].addListener("mouseover", () => {info[147].open(map);});
                point[148].addListener("mouseover", () => {info[148].open(map);});
                point[149].addListener("mouseover", () => {info[149].open(map);});
                point[150].addListener("mouseover", () => {info[150].open(map);});
                point[151].addListener("mouseover", () => {info[151].open(map);});
                point[152].addListener("mouseover", () => {info[152].open(map);});
                point[153].addListener("mouseover", () => {info[153].open(map);});
                point[154].addListener("mouseover", () => {info[154].open(map);});
                point[155].addListener("mouseover", () => {info[155].open(map);});
                point[156].addListener("mouseover", () => {info[156].open(map);});
                point[157].addListener("mouseover", () => {info[157].open(map);});
                point[158].addListener("mouseover", () => {info[158].open(map);});
                point[159].addListener("mouseover", () => {info[159].open(map);});
                point[160].addListener("mouseover", () => {info[160].open(map);});
                point[161].addListener("mouseover", () => {info[161].open(map);});
                point[162].addListener("mouseover", () => {info[162].open(map);});
                point[1].addListener("mouseout", () => {info[1].close(map);});
                point[2].addListener("mouseout", () => {info[2].close(map);});
                point[3].addListener("mouseout", () => {info[3].close(map);});
                point[4].addListener("mouseout", () => {info[4].close(map);});
                point[5].addListener("mouseout", () => {info[5].close(map);});
                point[6].addListener("mouseout", () => {info[6].close(map);});
                point[7].addListener("mouseout", () => {info[7].close(map);});
                point[8].addListener("mouseout", () => {info[8].close(map);});
                point[9].addListener("mouseout", () => {info[9].close(map);});
                point[10].addListener("mouseout", () => {info[10].close(map);});
                point[11].addListener("mouseout", () => {info[11].close(map);});
                point[12].addListener("mouseout", () => {info[12].close(map);});
                point[13].addListener("mouseout", () => {info[13].close(map);});
                point[14].addListener("mouseout", () => {info[14].close(map);});
                point[15].addListener("mouseout", () => {info[15].close(map);});
                point[16].addListener("mouseout", () => {info[16].close(map);});
                point[17].addListener("mouseout", () => {info[17].close(map);});
                point[18].addListener("mouseout", () => {info[18].close(map);});
                point[19].addListener("mouseout", () => {info[19].close(map);});
                point[20].addListener("mouseout", () => {info[20].close(map);});
                point[21].addListener("mouseout", () => {info[21].close(map);});
                point[22].addListener("mouseout", () => {info[22].close(map);});
                point[23].addListener("mouseout", () => {info[23].close(map);});
                point[24].addListener("mouseout", () => {info[24].close(map);});
                point[25].addListener("mouseout", () => {info[25].close(map);});
                point[26].addListener("mouseout", () => {info[26].close(map);});
                point[27].addListener("mouseout", () => {info[27].close(map);});
                point[28].addListener("mouseout", () => {info[28].close(map);});
                point[29].addListener("mouseout", () => {info[29].close(map);});
                point[30].addListener("mouseout", () => {info[30].close(map);});
                point[31].addListener("mouseout", () => {info[31].close(map);});
                point[32].addListener("mouseout", () => {info[32].close(map);});
                point[33].addListener("mouseout", () => {info[33].close(map);});
                point[34].addListener("mouseout", () => {info[34].close(map);});
                point[35].addListener("mouseout", () => {info[35].close(map);});
                point[36].addListener("mouseout", () => {info[36].close(map);});
                point[37].addListener("mouseout", () => {info[37].close(map);});
                point[38].addListener("mouseout", () => {info[38].close(map);});
                point[39].addListener("mouseout", () => {info[39].close(map);});
                point[40].addListener("mouseout", () => {info[40].close(map);});
                point[41].addListener("mouseout", () => {info[41].close(map);});
                point[42].addListener("mouseout", () => {info[42].close(map);});
                point[43].addListener("mouseout", () => {info[43].close(map);});
                point[44].addListener("mouseout", () => {info[44].close(map);});
                point[45].addListener("mouseout", () => {info[45].close(map);});
                point[46].addListener("mouseout", () => {info[46].close(map);});
                point[47].addListener("mouseout", () => {info[47].close(map);});
                point[48].addListener("mouseout", () => {info[48].close(map);});
                point[49].addListener("mouseout", () => {info[49].close(map);});
                point[50].addListener("mouseout", () => {info[50].close(map);});
                point[51].addListener("mouseout", () => {info[51].close(map);});
                point[52].addListener("mouseout", () => {info[52].close(map);});
                point[53].addListener("mouseout", () => {info[53].close(map);});
                point[54].addListener("mouseout", () => {info[54].close(map);});
                point[55].addListener("mouseout", () => {info[55].close(map);});
                point[56].addListener("mouseout", () => {info[56].close(map);});
                point[57].addListener("mouseout", () => {info[57].close(map);});
                point[58].addListener("mouseout", () => {info[58].close(map);});
                point[59].addListener("mouseout", () => {info[59].close(map);});
                point[60].addListener("mouseout", () => {info[60].close(map);});
                point[61].addListener("mouseout", () => {info[61].close(map);});
                point[62].addListener("mouseout", () => {info[62].close(map);});
                point[63].addListener("mouseout", () => {info[63].close(map);});
                point[64].addListener("mouseout", () => {info[64].close(map);});
                point[65].addListener("mouseout", () => {info[65].close(map);});
                point[66].addListener("mouseout", () => {info[66].close(map);});
                point[67].addListener("mouseout", () => {info[67].close(map);});
                point[68].addListener("mouseout", () => {info[68].close(map);});
                point[69].addListener("mouseout", () => {info[69].close(map);});
                point[70].addListener("mouseout", () => {info[70].close(map);});
                point[71].addListener("mouseout", () => {info[71].close(map);});
                point[72].addListener("mouseout", () => {info[72].close(map);});
                point[73].addListener("mouseout", () => {info[73].close(map);});
                point[74].addListener("mouseout", () => {info[74].close(map);});
                point[75].addListener("mouseout", () => {info[75].close(map);});
                point[76].addListener("mouseout", () => {info[76].close(map);});
                point[77].addListener("mouseout", () => {info[77].close(map);});
                point[78].addListener("mouseout", () => {info[78].close(map);});
                point[79].addListener("mouseout", () => {info[79].close(map);});
                point[80].addListener("mouseout", () => {info[80].close(map);});
                point[81].addListener("mouseout", () => {info[81].close(map);});
                point[82].addListener("mouseout", () => {info[82].close(map);});
                point[83].addListener("mouseout", () => {info[83].close(map);});
                point[84].addListener("mouseout", () => {info[84].close(map);});
                point[85].addListener("mouseout", () => {info[85].close(map);});
                point[86].addListener("mouseout", () => {info[86].close(map);});
                point[87].addListener("mouseout", () => {info[87].close(map);});
                point[88].addListener("mouseout", () => {info[88].close(map);});
                point[89].addListener("mouseout", () => {info[89].close(map);});
                point[90].addListener("mouseout", () => {info[90].close(map);});
                point[91].addListener("mouseout", () => {info[91].close(map);});
                point[92].addListener("mouseout", () => {info[92].close(map);});
                point[93].addListener("mouseout", () => {info[93].close(map);});
                point[94].addListener("mouseout", () => {info[94].close(map);});
                point[95].addListener("mouseout", () => {info[95].close(map);});
                point[96].addListener("mouseout", () => {info[96].close(map);});
                point[97].addListener("mouseout", () => {info[97].close(map);});
                point[98].addListener("mouseout", () => {info[98].close(map);});
                point[99].addListener("mouseout", () => {info[99].close(map);});
                point[100].addListener("mouseout", () => {info[100].close(map);});
                point[101].addListener("mouseout", () => {info[101].close(map);});
                point[102].addListener("mouseout", () => {info[102].close(map);});
                point[103].addListener("mouseout", () => {info[103].close(map);});
                point[104].addListener("mouseout", () => {info[104].close(map);});
                point[105].addListener("mouseout", () => {info[105].close(map);});
                point[106].addListener("mouseout", () => {info[106].close(map);});
                point[107].addListener("mouseout", () => {info[107].close(map);});
                point[108].addListener("mouseout", () => {info[108].close(map);});
                point[109].addListener("mouseout", () => {info[109].close(map);});
                point[110].addListener("mouseout", () => {info[110].close(map);});
                point[111].addListener("mouseout", () => {info[111].close(map);});
                point[112].addListener("mouseout", () => {info[112].close(map);});
                point[113].addListener("mouseout", () => {info[113].close(map);});
                point[114].addListener("mouseout", () => {info[114].close(map);});
                point[115].addListener("mouseout", () => {info[115].close(map);});
                point[116].addListener("mouseout", () => {info[116].close(map);});
                point[117].addListener("mouseout", () => {info[117].close(map);});
                point[118].addListener("mouseout", () => {info[118].close(map);});
                point[119].addListener("mouseout", () => {info[119].close(map);});
                point[120].addListener("mouseout", () => {info[120].close(map);});
                point[121].addListener("mouseout", () => {info[121].close(map);});
                point[122].addListener("mouseout", () => {info[122].close(map);});
                point[123].addListener("mouseout", () => {info[123].close(map);});
                point[124].addListener("mouseout", () => {info[124].close(map);});
                point[125].addListener("mouseout", () => {info[125].close(map);});
                point[126].addListener("mouseout", () => {info[126].close(map);});
                point[127].addListener("mouseout", () => {info[127].close(map);});
                point[128].addListener("mouseout", () => {info[128].close(map);});
                point[129].addListener("mouseout", () => {info[129].close(map);});
                point[130].addListener("mouseout", () => {info[130].close(map);});
                point[131].addListener("mouseout", () => {info[131].close(map);});
                point[132].addListener("mouseout", () => {info[132].close(map);});
                point[133].addListener("mouseout", () => {info[133].close(map);});
                point[134].addListener("mouseout", () => {info[134].close(map);});
                point[135].addListener("mouseout", () => {info[135].close(map);});
                point[136].addListener("mouseout", () => {info[136].close(map);});
                point[137].addListener("mouseout", () => {info[137].close(map);});
                point[138].addListener("mouseout", () => {info[138].close(map);});
                point[139].addListener("mouseout", () => {info[139].close(map);});
                point[140].addListener("mouseout", () => {info[140].close(map);});
                point[141].addListener("mouseout", () => {info[141].close(map);});
                point[142].addListener("mouseout", () => {info[142].close(map);});
                point[143].addListener("mouseout", () => {info[143].close(map);});
                point[144].addListener("mouseout", () => {info[144].close(map);});
                point[145].addListener("mouseout", () => {info[145].close(map);});
                point[146].addListener("mouseout", () => {info[146].close(map);});
                point[147].addListener("mouseout", () => {info[147].close(map);});
                point[148].addListener("mouseout", () => {info[148].close(map);});
                point[149].addListener("mouseout", () => {info[149].close(map);});
                point[150].addListener("mouseout", () => {info[150].close(map);});
                point[151].addListener("mouseout", () => {info[151].close(map);});
                point[152].addListener("mouseout", () => {info[152].close(map);});
                point[153].addListener("mouseout", () => {info[153].close(map);});
                point[154].addListener("mouseout", () => {info[154].close(map);});
                point[155].addListener("mouseout", () => {info[155].close(map);});
                point[156].addListener("mouseout", () => {info[156].close(map);});
                point[157].addListener("mouseout", () => {info[157].close(map);});
                point[158].addListener("mouseout", () => {info[158].close(map);});
                point[159].addListener("mouseout", () => {info[159].close(map);});
                point[160].addListener("mouseout", () => {info[160].close(map);});
                point[161].addListener("mouseout", () => {info[161].close(map);});
                point[162].addListener("mouseout", () => {info[162].close(map);});
                setInterval(update, 5000);
            }
            function update(){
                $.ajax({
                    type: "GET",
                    url: "ajax_simulation.php",
                    data: {
                        date: date.getFullYear() + "-" + zeroPadding(date.getMonth()+1) + "-" + zeroPadding(date.getDate()) + " " + zeroPadding(date.getHours()) + ":" + zeroPadding(date.getMinutes()) + ":" + zeroPadding(date.getSeconds()),
                        num1: send[1], num2: send[2], num3: send[3], num4: send[4], num5: send[5], num6: send[6], num7: send[7]
                    }
                })
                .done(function(result){
                    document.querySelector(".clock").innerText = date.getFullYear() + "-" + zeroPadding(date.getMonth()+1) + "-" + zeroPadding(date.getDate()) + " " + zeroPadding(date.getHours()) + ":" + zeroPadding(date.getMinutes()) + ":" + zeroPadding(date.getSeconds());
                    for ($i=1; $i<=7; $i++) {
                        if (!send_flag[$i]) {send[$i] = result[$i][0];}
                        else {
                            send[$i] = 0;
                            send_flag[$i] = false;
                        }
                        if (!flag) {
                            marker[$i].setPosition({ lat: result[$i][1][0] , lng: result[$i][1][1] });
                            marker[$i].setVisible(true);
                        }
                        else {
                            marker[$i].setPosition({ lat: result[$i][2][0] , lng: result[$i][2][1] });
                            if (result[$i][3]) {marker[$i].setVisible(true);}
                            else {marker[$i].setVisible(false);}
                        }
                    }
                    date.setSeconds(date.getSeconds()+5);
                }).fail(function(){window.location.reload();});
            }
            function display_switch() {
                flag = !flag;
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
            window.onload = () => {
                flag = document.getElementById("original").checked;
                initMap();
                document.getElementById("date").addEventListener("blur", () => {
                    d = document.querySelector('input[type="datetime-local"]').value.split(/\D/).map(Number);
                    date = new Date(d[0], d[1]-1, d[2], d[3], d[4], d[5]);
                    document.querySelector(".clock").innerText = date.getFullYear() + "-" + zeroPadding(date.getMonth()+1) + "-" + zeroPadding(date.getDate()) + " " + zeroPadding(date.getHours()) + ":" + zeroPadding(date.getMinutes()) + ":" + zeroPadding(date.getSeconds());
                    for ($i=1; $i<=7; $i++) {send_flag[$i] = true;}
                });
            }

        </script>
    </head>

    <body>
        <div id="map" class="map"></div>
        <div class="link">
            <a href="bus_database.php" class="icon"><img src="/icon/database.svg" alt="データベース" width="42" height="42"></a>
        </div>
        <div class="switch">
            <input type="radio" id="correct" name="display_switch" value="0" onchange="display_switch()" checked>
            <label for="correct" class="switch_correct">補正有</label>
            <input type="radio" id="original" name="display_switch" value="1" onchange="display_switch()">
            <label for="original" class="switch_original">補正無</label>
        </div>
        <div class="container">
            <p class="clock"></p>
        </div>
        <div class="calendar">
            <input type="datetime-local" id="date" step="1">
        </div>
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
