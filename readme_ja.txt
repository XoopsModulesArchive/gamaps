$Id: readme_ja.txt,v 1.6 2008/02/24 03:24:50 ohwada Exp $

=================================================
Title:   Google Ajax Maps Module
Version: 0.40
Date:    2008-02-24
Author:  Kenichi OHWADA
URL:     http://linux.ohwada.jp/
Email:   webmaster@ohwada.jp
=================================================

Google Maps API を利用して地図を表示するモジュールです。

● 変更
1. KML に対応した
(1) 「地図の表示」に「KML をダウンロードして、GoogleEarth で見る」を追加した
(2) 管理者画面に「KMLのデバッグ表示」を追加した


=================================================
Version: 0.30
Date:    2008-02-12
=================================================

Google Maps API を利用して地図を表示するモジュールです。

● 変更
1. Google Maps API のバージョンアップに伴い、下記の機能追加を行った
(1)「地図形式ボタン」に「地形」を追加した
(2)「地図の形式」に「地形」を追加した

2. バグ修正
(1)「地図の形式」を「衛星写真」にすると表示されない
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=634&forum=5


=================================================
Version: 0.21
Date:    2007-09-05
=================================================

Google Maps API を利用して地図を表示するモジュールです。

● バグ修正
(1) 4688: IE6のとき、JavaScript エラーになる
http://dev.xoops.org/modules/xfmod/tracker/index.php?func=detail&aid=4688&group_id=1409&atid=1786
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=667&forum=12


=================================================
Version: 0.20
Date:    2007-07-20
=================================================

Google Maps API を利用して地図を表示するモジュールです。

下記の機能を追加した
(1) GeoRSS に対応した RSS から緯度経度を取得して、地図上に表示する

多謝
東京近辺のRSSとして、下記のURLを利用しました。
Photos from Tagchan, with geodata
http://api.flickr.com/services/feeds/geo/?id=7593934@N02&format=rss_200&georss=1


=================================================
Version: 0.10
Date:    2007-07-01
=================================================

Google Maps API を利用して地図を表示するモジュールです。

利用する場合は 下記よりAPI Key を取得してください
http://www.google.com/apis/maps/signup.html

３つの機能があります
(1) 地図の検索：住所から地図を検索する
(2) 地図の表示：緯度経度を指定して特定の場所の地図を表示する
(3) 管理者：地図から緯度・経度を取得して、データベースに格納する

日本専用に２つの機能があります。
(1) ジオコードとして、東京大学 CSIS を使用する
http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/

(2) 逆ジオコードとして、nihiokaさんを使用する
http://nishioka.sakura.ne.jp/google/
