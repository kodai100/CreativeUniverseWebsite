<script src="../js/userAgent.js"></script>
<script>
  (function (){
    var ua = navigator.userAgent.toUpperCase();
    if (ua.indexOf('IPHONE') == 0 || ua.indexOf('ANDROID') == 0 && ua.indexOf('MOBILE') == 0) {
      location.href = '/';
    }
  }());
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui">
<link rel="stylesheet" href="css/common.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Sarpanch' rel='stylesheet'>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/scrollsmoothly.js"></script>
<script src="js/jquery.slidemenu.js"></script>
<link href="css/jquery.slidemenu.css" rel="stylesheet">
<script>
    //ドロワーメニュー
    $(function(){
        $("#menutrig").slideMenu({  //ボタン要素の指定
            main_contents: "#main",  //メインコンテンツの指定
            menu: "#drawer",  //ドロワーメニューの大枠要素の指定
            menu_contents: "#drawerContents",  //ドロワーメニューの中枠要素の指定
            menu_list: "#drawerList",  //ドロワーメニューのリスト要素の指定
            bottom_margin: 120 //ドロワーメニューの下余白
        });
    });
</script>
