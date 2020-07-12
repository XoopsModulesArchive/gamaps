$Id: readme_en.txt,v 1.6 2008/02/24 03:24:50 ohwada Exp $

=================================================
Title:   Google Ajax Maps Module
Version: 0.40
Date:    2008-02-24
Author:  Kenichi OHWADA
URL:     http://linux2.ohwada.net/
Email:   webmaster@ohwada.net
=================================================

This module is web search using Google Maps API

* changes *
1. support KML
(1) added "Download KML and show in GoogleEarth" in "Show Map"
(2) added "Debug view of KML" in admin page


=================================================
Version: 0.30
Date:    2008-02-12
=================================================

This module is web search using Google Maps API

* changes *
1. added the following feature with the version up of Google Maps API
(1) added "physical" in map type control
(2) added "physical" in selection of map type

2. bug fix
(1) not show when set "satellite" in map type
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=634&forum=5


=================================================
Version: 0.21
Date:    2007-09-05
=================================================

This module is web search using Google Maps API

* bug fix *
(1) 4688: javascript error with IE6
http://dev.xoops.org/modules/xfmod/tracker/index.php?func=detail&aid=4688&group_id=1409&atid=1786
http://linux.ohwada.jp/modules/newbb/viewtopic.php?topic_id=667&forum=12


=================================================
Version: 0.20
Date:    2007-07-20
=================================================

This module is web search using Google Maps API

Added following feature
(1) Show marker on the map, getting latitude and longitude by RSS supporing GeoRSS

Special thanks
I used the following URL, as RSS in the Tokyo neighborhood. 
Photos from Tagchan, with geodata
http://api.flickr.com/services/feeds/geo/?id=7593934@N02&format=rss_200&georss=1


=================================================
Version: 0.10
Date:    2007-07-01
=================================================

This module is web search using Google Maps API

Get the API key on following, when you use Google Maps
http://www.google.com/apis/maps/signup.html

There are 3 features
(1) Search Map: Search map from address
(2) Show Map: Show map which is specified latitude and longitude
(3) Admin: Get latitude and longitude from map, and save them in database

There are 2 features n Japan specially
(1) use CSIS for geocode
http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/

(2) use nihioka for inverse geocode
http://nishioka.sakura.ne.jp/google/

