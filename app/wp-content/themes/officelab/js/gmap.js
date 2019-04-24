function initialize() {
    var latlng = new google.maps.LatLng(35.692253, 139.778261);/*表示したい場所の経度、緯度*/
    var myOptions = {
        zoom: 18, /*拡大比率*/
        center: latlng, /*表示枠内の中心点*/
        mapTypeId: google.maps.MapTypeId.ROADMAP/*表示タイプの指定*/
    };
    var map = new google.maps.Map(document.getElementById('map_custmomize'), myOptions);

/*アイコンの取得*/
    var icon = new google.maps.MarkerImage(
        '/wp-content/themes/officelab/img/icon_logo_gmap.png',/*アイコンの場所*/
        new google.maps.Size(180,80),/*アイコンのサイズ*/
        new google.maps.Point(0,0)/*アイコンの位置*/
    );

/*マーカーの設置*/
    var markerOptions = {
    position:
        latlng,/*表示場所と同じ位置に設置*/
        map: map,
        icon: icon,
        title: '株式会社オフィス・ラボ'/*マーカーのtitle*/
    };
    var marker = new google.maps.Marker(markerOptions);
}