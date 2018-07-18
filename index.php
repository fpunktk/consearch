<?php
/*
consearch

Copyright (C) 2015 Felix Kästner, consearch @ f p u n k t k . de

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, see http://www.gnu.org/licenses/.
*/

$dse = "";
if ( isset($_GET['dse']) and preg_match('/^[0-9a-z]{1,5}$/', $_GET['dse']) === 1 ) { // TODO: prevent injection, check whether dse is a valid searchengine
    $dse = $_GET['dse'];
}
$browserintegration = "";
if ( isset($_GET['include']) and $_GET['include'] == "browserintegration" ) {
    $browserintegration = "true";
}

if ( isset($_GET['get']) and $_GET['get'] === "opensearchdescription" ) {
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
<ShortName>consearch';
    if ( $dse ) { echo " ($dse)"; }
    echo '</ShortName>
<Description>conveniently use different searchengines</Description>
<Tags>consearch</Tags>
<Contact>consearch @ f p u n k t k . de</Contact>
<Url type="text/html" template="https://fpunktk.de/consearch/index.php';
    if ( $dse ) { echo "?dse=$dse"; }
    echo '#{searchTerms}"></Url>
<Image height="16" width="16" type="image/png">https://fpunktk.de/consearch/consearch.png</Image>
</OpenSearchDescription>';
    
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="referrer" content="no-referrer">
<title>consearch</title>
<link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAQMAAAAlPW0iAAAABlBMVEUAAACMuuz63rNKAAAAK0lEQVQI12P4/58BiM4cZ9gdDUVnboNE/n8Hoc6JDLvLGLrLGF4DyWlAcQBYKBgvsgbJOAAAAABJRU5ErkJggg==" type="image/png">
<?php
if ( $browserintegration ) {
    echo '<link rel="search" type="application/opensearchdescription+xml" href="index.php?get=opensearchdescription';
    if ( $dse ) {
        echo "&amp;dse=$dse";
    }
    echo '" title="consearch';
    if ( $dse ) {
        echo " ($dse)";
    }
    echo '">';
    echo "\n";
}
?>

<style type="text/css">
* {
    font: 16pt monospace;
    padding: 0px;
    margin: 0px;
}
body {
    color: #000000;
    background-color: #8CBAEC;
    text-align: center;
    margin: 0ex auto 10mm;
    padding: 0ex;
    width: 96%;
    max-width: 96%;
}
h1, h1 a {
    font-size: 12pt;
    font-weight: bold;
    margin: 0.4ex;
}
input {
    margin-bottom: 3mm;
    width: 100%;
    height: 13mm;
}
button {
    margin: 0px -5px 3mm 0px; /* trbl */
    padding: 3px;
    background: none;
    border: 1px solid black;
    width: 13ex; /* 13ex 11ch */
    width: 11ch; /* used twice because some browsers don't understand it */
    height: 13mm;
}
img {
    border: none;
    margin: 0px;
    padding: 0px;
}
</style>

<script type="text/javascript">

var b64images = new Object();
b64images["az.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAACxklEQVRIx62Vy0/TQRDHf0BpES8gnkAKXjAYSIjhgAeMCf4VeMELBhMvJIAgUEBSD/QPwHjkYeUEJ+ACnuSREB6BXohRoKYQXk1bCGrbrzM7bhb6sPHxuUx/292d787MzlpQOBxiBwfFHh0hDd8VwIECOFYkz4srEkcPD8X294u12y354Xan3sBs8VIBVFbeJYCSklsEUFZWTgD3FMD8/AciebfUx+nr+yUgHE6n/LkCsBRATo6NAIqKbhJAbq7DwfHT43l51wjgkwIZODmx0in9rDCOtW1peUYAXxWA1/ueAGy2XMLMGxsbJ9I5Nn6sdFPOzs4J4I0CaGtrJ4BQKBzmeP1QAJsKoLDwBmEEuN2vCWTESlc8ial4pwAeKoCqqmoCcDrLCE6FnWABWQQwMPCK+AsBiTQ2PibMyex2yXl1tQhoaHhEAPn514nLAph/EDA6OkYk10BXl9wGHaHd3T0CKCgoJP5jBJqbnxJmQy1gYeEjYeYtKDgFughlfnt7B5GpL/xGQEfHC8I4zsrKJoD6+gcER4gBSkudhPlfX8fs7BwC2NuTCP1xBPQ1M7m9mgpty8tvE0Bd3X3CjFdU3CFYgN/P+6TulUpAPB6L8UA0enGR3LO+KExOm5qeEMBbhWnJ3xTA8LBc29PTYDAUkva7uMj7bmz09vJ3MMjXNkUE1ta6u9n91pbHI53A789cRFpwcn5jsWiU7eamNPr1dZeLrc/n8SQ1ItEq7O/PzbGdnOReD8zO1tbKwqEhtgcHUoTh8M6OrOWOCQQCsm51tbOT7dQUvxHA0hIXM7C8zB2UWxg3OOH42DKvYGKVSjsCVlZaW0VQcTFbr5eLDRgZsdTq8XGxExNcK8D0dE2NVNHMTOrHSL7Yn8tl6WdRv07yh342rz7EkQjbSEROHAz6fBKB7W225+eBQKpkXD4YVwt/9/Rovz8BMV9TMwyNXZoAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTQtMDctMTFUMTc6MzU6MjYrMDI6MDBRY63xAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTEwLTI4VDE2OjU2OjQwKzAxOjAwjUH1zAAAAABJRU5ErkJggg==";
b64images["dd.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/gD+AP7rGNSCAAAACXBIWXMAAABIAAAASABGyWs+AAAACXZwQWcAAAAQAAAAEABcxq3DAAACCUlEQVQ4y42TP2gTURzHP3fXpF40aWoPwe0GbVS0FFrByb+1Q42I4CS46WCphCxFMqiLCnaQYlFEqLro0EkiFTqKgkJbL+mgVx3iUIvpFW1Ik5he7hzyEi5nC/7gwXuP7/f7fu/7vk/CV5Ye6wYuAn1iAMyJ8ULLmYtevOQhSkACuAOobF5lIAWMaznTbQoI8mtgiP+raSCu5UxXFhuJBjny7AmdH94SffOK9gvntxIYEhwUcecpIACw8SmDsktD6TlE4HA/lErYn7+A6/pFjo1GtSllNKpdAwYau5HJxwQHTiKpKlJ4B8FTJ6BYxJ43/AIBYFX2OA2Asn9fC0oZmSF47uxWV+n/R8AtFFBGZprr2v2DyNo8oSsW4bElwjeXvfC+Nr+knclSmxisi/1I4K4+BKD9DNiZEKWnXS34NuoBiTcFsgsEB+uWuOVZ3KLK+oMO7KyKuy77z5uThYCng4XmXNbTVN9tJzS8Qsfkd8JjSyi7bS98VhLPaCDSJ0Ui7DQ+glQP6a8jR3F+5pG2ObiVlg7KQK8ssp3ymvg8e498JQ/Ab72TieQePxkgpeXMxYaJ48BpkTDM6lfeGzdYrqxxYLiLb/zxk6cFBxlAfIw4kATKe/Mh7vbeJn38JdeVS/QYa962k4h/sGkyLD3WXbh89VGtWrUcx9morVhlS4+lLT12S/jVUn8B/x+3Gta9DwcAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTItMDktMDZUMTg6NTY6MzcrMDI6MDCDn32OAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEyLTA5LTA2VDE4OjU2OjM3KzAyOjAw8sLFMgAAAABJRU5ErkJggg==";
b64images["gg.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/gD+AP7rGNSCAAAACXBIWXMAAABIAAAASABGyWs+AAAACXZwQWcAAAAQAAAAEABcxq3DAAADCklEQVQ4yyXSy2ucVRjA4d97zvdNJpPJbTJJE9rYaCINShZtRCFIA1bbLryBUlyoLQjqVl12W7UbN4qb1gtuYhFRRBCDBITaesFbbI3RFBLSptEY05l0ZjLfnMvrov/Bs3gAcF71x6VVHTk+o8nDH+hrH89rUK9Z9Yaen57S3wVtGaMBNGC0IegWKIDxTtVaOHVugZVmH3HX3Zz+4l+W1xvkOjuZfPsspY4CNkZELEgEIJKwYlBjEwjec/mfCMVuorVs76R8+P0KYMmP30U2dT8eIZqAR2ipRcWjEYxGSCRhV08e04oYMoxYLi97EI9YCJ0FHBYbIVGDlUBLwRlLIuYW6chEmQt/rJO09RJjhjEJEYvJYGNhkbUhw43OXtIWDFRq9G87nAaSK6sVRm8r8fzRMWbOX2Xx7ypd7ZET03sQhDOz73DqSJOrd+7HSo4QIu0Nx/4rOzx+cRXZ9+z7+uqJ+3hiepxK3fHZT2tMjXYzOtzL6dmznPzhLexgN0QlxAAYxAlqUqRmkf5j59RlNQ6MFHhgcpCTTx8EUb5e+plD7x4jjg1ANCAgrRQAdR7xKXjBlGyLYi7PxaUmb8z8xcpGHVXLHaXdjI0egKyJiQYTEhSPREVIEUBNC+Mqm+xpz3j0njLPHB2nsh1QgeG+IS48dYbD5YNoo0ZUAbVEuTUoKuBSZOarX/WhyQn6eg2+usDWf0s0tq8zNPYk+WI/Lnge++hlvlyfQ3NdECzGRWKwEEA0qNY251n69kV6+Y0kbaCZoebG2X3oU7pKoyxuXOPe945zs9DCeosGIXoBDyaLdf6ce4Hbk+/Y299ksKtAuaeNsiyw8c1LKIZ95b0MdgxA5giixACpTxEPSau6QdFfI5/2cLPmEW+JAQrtJUJzDXF1dkwHzVodJMX4HFEcQQMaFdPeM0Jb/4PUtzzaLKAhRyJFwo6lbegRNFfk819muV5dR4JBQoQdQ2xFiDmSNDHiaptamR9Gq5cQ18AledrGDpOfeI5Lq8u88smbhMRisoSAgAYghdfn5H/JkHuR1YqVZQAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxMi0wOS0wNlQxODo1NjozNyswMjowMIOffY4AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTItMDktMDZUMTg6NTY6MzcrMDI6MDDywsUyAAAAAElFTkSuQmCC";
b64images["gm.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABgFBMVEX////++Pf4taTud17pZkznblvwrqXucVTlWUDhTzreSjftpp//77//6qLxfF7sak3oX0XjVT7aPy7bXDT+0UD/7rnpYkfcRTLZPCzXUif/1z3/1jb+y0b/66n/6ZruglbeSDTVNCbhhWj/89L/55P/5Yn6yGrWNyjXSSD8wxP/zQX/zAD/ywP+yAn9vh3/5o7/5H70tHHUOCXxsj3/1C3/1Cr/0y3+0DP+zDr/4XH/3Vz/6JXgZFHSLSHfbB7/0yf/0Rr/0BX/zxf1yyfqxjn+xiv9wDb/3FX/32r/2UXup4/OIxrupxX/zgz/zAHRxktxv+JfwfiRtZ3/2D7/1TH1yaPKGRL6yA2tx45mx/9exf9RwP9Kvv//2kv/0iH/5ITNNwv/yQXFxmRixv9Zw/9Gvf//1zncxDT2yg3+xwq2wXVWwv9Bu/+Ozt/0xRaUvqZgwfhPwP47uf//6Z6pyZ1wyv13wNc2uP//zxjayUVpyP/+1kn+0jj+zin0yzygy7yC12GqAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAAAEgAAABIAEbJaz4AAADNSURBVBgZBcG9LkMBAAbQ74hSva1WxF/Cpo1BYurQWITBA3gUo4fwHh6CBYPVKhHS+EkMNG0vDalzJAEmSZJIMlP5m8UoSSJ18FMlST7UF74nzYFF+EmqtsK7tUGTJIntybzn9cEK8FuxN1J4Wim8bUBfr1wAAI5NZx7aEIiT12bx0OaeXdDduTxyu39HF2XNwfLzS/WI627V59JXS69zM13bKa66DYaNYcPpxeZcs2OUer9WahUOxofvWfdYK5c+teYiZ4RxKo9q5er5P8TUN7q8rPQcAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE0LTA3LTExVDE3OjA1OjQ2KzAyOjAwDu7CdwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxMy0xMC0yOFQxNjo1Njo0NyswMTowMEjmy0IAAAAASUVORK5CYII=";
b64images["ixquick.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABs1BMVEXR3fPR3fTR3vTS3vTS3/TT1+vUj5DTp67V4PTV4fXW0+PWZlvWiIbV4fTW4fTY4/XY0N7Y2OfY4/bY4vXZ4/XX4vTc5fbc5vfc4vLZjInarLDe6PnF0+2OqtjN2fDe5vfd5vfW4PSVr9q2yOfe5/fg6Pfg6ffg4O3YY1bbjorh6/rT3vJ+ndGQq9jc5fXh6Pejud90lc3H1e3h6ffk6/fk7Pjj4+7ZZVjckIvk7frl7PjF1Oxzlc2tweO+zulylMy1x+bo7vno7/rn5u/aZljekozo8Pvo7/mxxOR2l86ft93m7fjs8frs8vvr6fHbZljgk43s8/3u8/vY4vNxlMxnjMjH1ezv8/vw9Pvw9fzv7PHcZ1nilI3x9v7x9fvt8vqdtdyEotOPqteKptXl7Pf09/z0+P3z7/PcaFnklo71+f/1+P26y+d1ls3R3O/i6fV/ntGjud7y9fv19/z4+v34+v738fTdZlfmlo36/f/Y4fF2l823yOX5+v76+/7O2u7B0On7/P76+frpoZnwwr39///S3e+tweH8/P68zOe+zuj9/v79/v/9/f39/f7+/v////9wnEbDAAAAAWJLR0SQeAqODAAAAAlwSFlzAAAASAAAAEgARslrPgAAAIJJREFUGJVljLENglAABe+CIJ2VxgXcwAXsSWxdwA1cwNrGWdzKxMpEEj7wsSAq4HV3yXuCGPliotp2v5CrNqkByLoaF6BaZzVpmAdcOeLpZhq2Qw0Bd/YX3tdagsUnqL7Aw3RynJ6eBnbbx9IzvTyWFbmx8oIau8SGWZO0eGXMX3gDRrMnhGMxfg0AAAAldEVYdGRhdGU6Y3JlYXRlADIwMTUtMDYtMDlUMTM6MzU6MDYrMDI6MDDngHCOAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE1LTA2LTA5VDEzOjI5OjE5KzAyOjAwd42HCwAAAABJRU5ErkJggg==";
b64images["man-u.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAPNQTFRF////+OPY65ty4m8y3E0C7q6M3FEG/fn45XxE+uTc3E4C5X1G6ZBi99zO+ODU6ZNm7KB44GQi4Wgo3E8E3VMK32Ac6Ixc6ZRo9tjI+N/S6I9g/Pj243Q499TH43U63EwA+eHX3E4B6pBs8rul872n535R+d3S+uXd4mw56IRb9cm5////4F4j3lYU99bJ+d/V3lgZ4GEn31ob/fTx/PDr4WUt7aGC65d16Yxm9MWy7qaI/fb05nxP3lUP3VIK8bef8K6U7Z1943FA++ni3VAG42894Wcw+NjM99TH31wf54JY++zl88Gt54BU4GMp65Jv4mo2js2EfgAAAB90Uk5TACaNzf1x+Aa7+v25nDAqmYfd1/r146OXNSufB8f9xSD0OYkAAAABYktHRACIBR1IAAAACXBIWXMAAABIAAAASABGyWs+AAAAv0lEQVQYGQXBiSICUQBA0dvOkFFZUrgVlbwQWUIZJcru/7/GOQCk0plsNpNOAQDk8qqazwFQWFFVG6vRWgFYV5uto+N2p9s0DcVIT3qnITTafY02iPXs/GJwedUaXt/oJiW9DXeqo3CvZXx4HDcmqk/Js1aoTIezl7mqr2+6xbZOw1h1FhIts6OTxXLwPv/ofvZ1l6raG32F0Pn+0WgPaqq/SfK3XGoM1PdV1cWBhwWAek1VNa4DANW4pKW4CPAP3zceUwYjMTAAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTQtMDctMTFUMTc6Mjg6NDYrMDI6MDCjfPAGAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE0LTA3LTExVDE3OjI4OjQ2KzAyOjAw0iFIugAAAABJRU5ErkJggg==";
b64images["osm.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/gD+AP7rGNSCAAAACXBIWXMAAABIAAAASABGyWs+AAAACXZwQWcAAAAQAAAAEABcxq3DAAADe0lEQVQ4y43D209bdQAH8O/v3C+l9MZlXIcomDKHWjRxuHRmcZPAYtwDIVn2YGL8C4y+7UHfNmP0yReNcS4+EDcyiywZGtYiKAtOLmUMFLHtNrxQWnpO23PO75zz81/wk3yISYvP7RpLVzU+tBoROq/pSnTD8owX9629M1v7a0ldCjzojxyfCklHbtu++bxhF0ccZr50tGHoBYD4hDGG7MFMtu4aA6ziQI1EQBlwUKugTqugRR8a64ImheF4DkxaQjTMMNT7SkIVgvd43/fJb7ubPU/E208ww4FHXAiiCMd18E/exkBHEq0tLQiGNUiaCFUJYG/fhsRINhZqust5noe15a1dhdcgRBsAi8Fx6/CqFB2hZxAIKiACB0VUEdZDEFQCWQeyO/m3GGMQJiYm2HxWeVUSNHAQAVVCofoIfxYsnIx3g/gqPA+o+SKoT1GybPA6geSKg7lCoU+INcX4xMvxUy5z4DoOarUKDn0KjTXDsmXwBOAIB8f1YVgMhIVAxENIAR7Fg1KMm8vMtnGSH6KuBe/QhKcDUTUCwigs6oFyRdhCAYe2Acd1oahVaKIG3df8y1eu5PhK2XSeHGy5oAXlMCwXgqqC53TUK41Y/yWL1u4WEL4GSTYhK1UEFAltWhuuf51Kpe9kbnC6rrOl9NoSAIAAHiUQ3DBkQUN6+gZ+XVgBwANgUEURIS6MlfVNLP08f5XnOU4YHx93pr7/csPzPFiiDLkM/DCbAiv/i84O4NHDBdxfqSISjIGJBKZZAk9EdPZEjuV3H88KiUSC/f73So/Mt0EJ1JBKpbFwax3Up7j49gUcfzaEEjVhlvMolcuoKS7aI+24v/bH9tjIa1UhnU5zA8Px0xQGZr76EZmby3DhYeT8EJ4a0FHnm9EiczgSjGDb3AHnmdgz8sbe7t7c+9OXPO6nu4tNwWa5++bndzA7uQDbs/H6m8NInjgGLij5asMBTERhyQ4qngnCc8hv/bUxNjpalCQJfLCxUc3cShsXT8qnZjIFe3D46cfV6mHm04+/+fCTD764vLm6veNSEw71yfL86r3b1xYnv/ss89G777z3sK+vDySXy2H0jfOt8aP8pa0cLdfqdPLcyNkH58bG7P7+fra4uEjm5uaUXC6n9Pb21hOJhJNMJv2uri4AABhjuD41xZ0ZHYudPjsS+jY1TRhj+L//A/A3xA0Fv2p0AAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDEyLTA5LTA2VDE4OjU2OjM3KzAyOjAwg599jgAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxMi0wOS0wNlQxODo1NjozNyswMjowMPLCxTIAAAAASUVORK5CYII=";
b64images["php.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAACVBMVEWAgMDX19cAAAD1ff0gAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAANElEQVQI12NgQAOiIEISxJB0DGDIipq2lCF1ZlokEpEVmQYUYxELYEhhYHNgCGFgdUBoBwCrTgwE/Pwg0gAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNC0wNy0xMVQxNzowNTo0NiswMjowMA7uwncAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTMtMTAtMjhUMTY6NTY6NTArMDE6MDBB6/VSAAAAAElFTkSuQmCC";
b64images["sh.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAACXBIWXMAAABIAAAASABGyWs+AAAA+VBMVEU5gqrgrR82f6jfqBw3gqo4gqs4g6s5g6tBiK9Dia9Fi7BGi7FHjLFMj7NTk7Zemrtmn75noL92qcV/r8mAr8mNt86UvNKcwdWewtaixdioyNq10N+60+LJ3ejN4OrS4+zY5+/a6O/fqx7frCDfrCHfrSHgriXhsS3isjHitTjjtjnjtjvjtz3kuUPkukblvErlvU7mvU7mvlDnwVrrynLr8vbs8/ftz3/w9vnx2pzx257x3KHy36jy9/nz4a325772+fv36cT36cX3+vv579T79OL79eP89uf8/f38/f79+vH9/v7++/X+/Pf+/Pj+/fn+/fr+/fv///8t5hX9AAAABHRSTlNaWuDgiHwzrgAAAAFiS0dEUg1gLZAAAACxSURBVBgZPcEHQsJQAAPQ0H6NAxXEvRCCW9xbcRdx4Mj9D2OLlveAiJzuuKd7EBcQheFl564Ug5xz342EQdZsfyfJy9vP54mEMHpm+1brG1t7TUkII6e2k/NmQz3gQNWZr+fL4zVJICvOPWxLIFlZ9b+7usBMaXal5VR3VyADM8UFp44EhuLU5MT42NCMU4cCOW+/P7UuXm1/7Ajkkvse60LERefa+4qBqHzvP9ebigu/AGwyxwJqEuAAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTUtMDUtMjJUMTg6MTk6NDArMDI6MDCIMpBxAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE1LTA1LTIyVDE4OjE5OjIzKzAyOjAwDug71wAAAABJRU5ErkJggg==";
b64images["uu.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAIAAADAAbR1AAAABnRSTlMAAAAAAABupgeRAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAMklEQVQ4y2NgwAC/f3d3YyMh4NGj8HBsJAlg1IKBB1eukEOOWkCPOCAmjY1aMGoBLQAAutj8GeaBm/MAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTQtMDctMTFUMTc6MDU6NDcrMDI6MDComcnDAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTEwLTI4VDE2OjU2OjU0KzAxOjAwtaTRQQAAAABJRU5ErkJggg==";
b64images["wb.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAIAAADAAbR1AAAABnRSTlMAAAAAAABupgeRAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAiklEQVQ4y2NgIBHMxAsYKAEQI57jBWRag2z0PbzgDBiQbA3NLUC2hiZG449kiAUkG33tWlUVjMRvGcluhxj6///du3Fx//+fOYPbGjITKMwCkNH4LaAIEBNEZIOCgsmTCYlQZPTixSdPwtiYIlQwGj9JpjUQbVOnrluH22iILBUswE9SIaDwk6QBAFItUWLI8uCPAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE0LTA3LTExVDE3OjA1OjQ3KzAyOjAwqJnJwwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxMy0xMC0yOFQxNjo1Njo1NSswMTowMBPT2vUAAAAASUVORK5CYII=";
b64images["wp.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAAMFBMVEX8/fy5urlXWFdIR0ipqKl6e3rY2dhpammEg4QoKCjp6OmYmJgZGBnIx8gEAgQ8OjxFp+PiAAAACXBIWXMAAABIAAAASABGyWs+AAAAbUlEQVQI12NgwA2EDFlME4LSihg4JjJYZnVzVTOwHV+wx7eAq4CBQedC8gwHRgcGBpkG7kcMKwQYGJjN2D4zpAK1cTxh+ymwG2TApCX1BV0gRn9I6uwGEMNzCuPMCyAGsxlDJdgSxgsMiUh2AgDcjxn2cDFW0wAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNC0wNy0xMVQxNzowNTo0NyswMjowMKiZycMAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTMtMTAtMjhUMTY6NTY6NTUrMDE6MDAT09r1AAAAAElFTkSuQmCC";
b64images["yt.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAABV0lEQVRIx8VUO24CMRD1AaighQaugoREQ8UVtkTcgJqWDiIaOj4CKR3bI0EDAmkRoUWCDtOwDZ+JncXxb511siR5zezM88w8j+1F8IDnDYeVCkCtViwmEvCJfN5xBgOATmcy2e3g6UBa4AMAGHe7ov9b0Eqv16MRnQRrrO7cdRuNQoHzjlOvz2b6Bkx+pIDzeb/v9XjiZnO93u8Avi/H1QZs3b8LaLer1VTKLChSgO8fDv2+WPhyud04Px7rRzCdct7z5CNkl9hawF+DCHgjoJ+5XDIpWzrKsHg8m80GdrulfREnTDAXDARGr/vKovgFnyhALlgul0qiz0Zn4hlcArEe808njKldLlerHwlQJ6Tzcn6z2WqFCYwh4Hu8KiD8DlkIYCNUwfj5fLEQ468EYr0XAosJHI/pNP1xMItxJiP6tpblqfkYy7wggAKh6Odmf7vt1gd93wGWV/JQKq7UWwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNC0wNy0xMVQxNzowNTo0NyswMjowMKiZycMAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTMtMTAtMjhUMTY6NTY6NTYrMDE6MDAiO8BoAAAAAElFTkSuQmCC";
b64images["imdb.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAaVBMVEUAAAC6pB303yPx3CPu1yPq0yPmziPiyCPfxSPcwCN4bREAAACplBoQDgKUgxczLAjXvSLCrh5tYBF0aREjHwVYTA5qWxFbUA6RfxeulB1xZBGhixq5oh4OCwLUtiPRsyLNrSLGpCKLexYQiDEbAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAASAAAAEgARslrPgAAAHFJREFUGBkFwTFSAzEAADGtbXAITApK/v9AOhguuSABACgAwBJJIn+LRCJpJIkk61LP8ftqPqyOcw84P6D7sI03jDnwwMtzwP7ZYOk+YJquNqaxcTjwDhZcx4nvNS1dZLuR0PjKdlOiWrYbiWD5BAD+AWj2ERU8QW3TAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE0LTA3LTExVDE3OjA3OjM0KzAyOjAwl0EKegAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNC0wNy0xMVQxNzowNjozOSswMjowMGgJuDgAAAAASUVORK5CYII=";
b64images["ud.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAIAAADAAbR1AAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAA7ElEQVQ4y2N48SIpSUmJdiTDqAVKSp8+zZghLPzv37VrTEx//166xMxMZQtevy4slJP78WP7dm7u///v3WNgwGLBnz9nz7KyQlzx9m19vZQURBziIkx3QdRAdP3/f+cOI+Pv38ePs7HhtODDh54eMTGIUoiXIeJfvixZIiCAqe3fv1u3YIZC9EIcgdMCmDaQD5AtgJDI2iBuh4hAAgc5Jki2AOYzhDZMEZItgIQsROTbt3XreHkx3QsJTIgsROTnz/37OTgIWABzBUgzRCnESggb2RpY3EBUgkhMlQSSKSQoiEmm+FWOFhUDbwEAY2QCzNvXfrQAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTQtMDctMTFUMTU6NDQ6MDQrMDI6MDAifHBTAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE0LTA3LTExVDE1OjQ0OjA0KzAyOjAwUyHI7wAAAABJRU5ErkJggg==";
b64images["sp.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAB71BMVEXR3fPS3vTV4PTV4fXV4/fV4vbW4fTX4vXX4fXV4fTZ4/bY3OzXq7HWiIbXiIXXp6vY1ubT3/Ovw+XJ1++0xuaXsNuZsty5y+jX4fTZ4/Xc4/TZjovXYVTak5HalZTYb2XaiYTM1exzlc2FotOMqNebs92JptVvksuovuLc5fbf1+LYXU7cqKrg7//g7fzg3+zg0NjP2e9xlMygt97c5fXi6ffd5vbK1+7j4+7bdmzZZlneqKjhytHj4+/l7/zS3fF1ls7D0evm7fnk6/jl7PiuwuPo7/vm197fkIraZlnZWkrabGDjurzV4PJ2l87F0+zq7/ro7vno7vrf5/Z7m9Clu+Ds8fvt9f7s8vzr5u7oztLgiYDbXU7WzNl2mdDJ1u3v8/vs8fru8vva4/N0ls2zxuXv6/Hqyszu6vDx+P/x+//qzM3aV0bYw8xzl8+pvuDy9vzu8vqpvuF1ls3X4fLx4uXfdGfec2bloZrmpJ7dbV/ignbe3+t2mM6KptWVrtmoveCSrdhxk8y1x+Xz9vz4+v705OXqrKbkjoPrsKr27O3j6/d4mc7K1+3I1euiuN2lut/O2u71+Pz4+v36+/77/f/7/v/8/f/l6/bT3e/////8/P78/P/7/P79/f/+/v/o7vd5mc7V3/D4+vzw9PnOaWOYAAAAAWJLR0SamN9nEgAAAAlwSFlzAAAASAAAAEgARslrPgAAAGxJREFUGBldwdsKgkAARdGz9VApovNi//9/PQgRWWhMXpBmWkv6A8qZhWIsiRBVvH0h50DOgcRn6N2SmIbWLakeB3IOHO4dC3ccAisHQPy4gyjg0QDTaXStFVS8Sp1Ve9amul01a1FoNzZPbb6jhRWDw4zowgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNS0wNi0wOVQxMzo0ODo1NyswMjowMNXS620AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTUtMDYtMDlUMTM6NDg6MDMrMDI6MDAYIHmmAAAAAElFTkSuQmCC";
b64images["down.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAAAEgAAABIAEbJaz4AAACUSURBVBjTY2AAgdR/QKDLgABgAR0kgXh0gThkAWlhhICwAAND69c3HgxRIAFVhpT3b2IYfv/790o5HCxg9w3IZvgFZJ5OAQm4PAESLxjq/gKpxyCBR0D8O5aBZdk/BPjbArSF/zhCYCUryF75RzD+KT6IS8w+Q/iPZWAOjQZZ9e+jBcLpzUCrfkYh+YV1/r9fZRAmAMypgqgtOlghAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE1LTA1LTE4VDE0OjM3OjI2KzAyOjAwVrt97QAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNS0wNS0xOFQxNDozNTo1NSswMjowMBg+BugAAAAASUVORK5CYII=";
b64images["leo.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAACXBIWXMAAABIAAAASABGyWs+AAABp1BMVEX///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCgAZFAAAAAAQDAAAAAAPDAAAAAAAAAAlHwMAAAAAAAADAwAAAAAuJQM2MQMAAABRRgU5MQUfGgInIAIYFAJGOwRTRwZFOwYXEwI+NQZuXgmkjAyiigxmVwitlA0DAwBGOwWskQyskQ64nA0rJQOaggxGPAaskg2ehgvevBGzlw3CpQ+ehwtbTQe3nA7CpA7RsRGDbgq6nw6wlw7Fpw/auhCLdwubhAyahAzZuRDkwxFwXwiokA3Aow/cvBHgvxHFpw/gvxHauRHjwRHhvxF3ZgknIQPEpw/NsA9sXAjXuBHbuhDtyhJlVgjiwBLiwyTnxBLqxxLmxBHvyhLvzBLiwBHHs0jfwivtyBLpxhLzzxLuyxLMsinxzRLnyCbyzxTTuCvwzRPwzBPxzRLvyxLxzhLxzhLvzRzxzRKeklXpxxr10BP20ROrp5T20RMUEAH10RXzzhL30hT10BP10RP20hP40xP40xP30hP40xP40xP40xP40xP40xP40xP40xPKysr40xOP+DMuAAAAi3RSTlMACAkQERMXGBweLDEzOEBBQkRIS1JTU1dZWV5fYmpuc3WBgoeHkpKXnqKkpKWlrK2ur6+zs7W1tre3t7i5uby8vL29vr6+v7+/v7/AwMLCxMXGx8fIyMnJysvLzMzO0NDR0tLS09PU1tbY2dra293e3t/g4OHh5ejp6erq7O3v7+/x8vT2+Pn6+/z9D21gkgAAAAFiS0dEAIgFHUgAAADOSURBVBjTY2BgYGDhZ0AFqq7iXLIK3AzCPFABxWRtn4QeXzUzHaiAUllXVmJ1UlSGBITP69XZU9qdXlESywwRkHfv6enIrs0s8uCECHCFNPaEFfYARTVEmUACWjFtLrnBleHlad5yIL5QSm6rrZFPZ0RVnnMgB1BA1NHJICfe3s/fLdVBAKRCzCa/Jci8oMaz3E4KbCafcXN7XEeoqZWuIcQSacuGps68np66ehNBsAA7q2aAdXtkcXSHvjLU6RwiFnoqMpLqHAj/sjHCmQCutDB5t6/XDgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNS0wNS0xOFQxNDo1OTowMSswMjowMCdFvu4AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTUtMDUtMThUMTQ6NTg6MjkrMDI6MDDIECR2AAAAAElFTkSuQmCC";
b64images["ks.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAB9VBMVEUAAAAAAQAAAgACAgACAwACBgADBgADCAAFCgAGDQAHCwAJFAAMGgAOHAAPGgAQHAARIwAUJQAVKwAXKAAXLgAZKAAZKwAZMgAaLAAbNQAcNgAcOQAcOwAeNwAeOQAfOQAfOwAfQAAgOgAgPgAhPgAiPAAiPwAiQQAjQQAkRAAkRwAlRQAlRwAmPQAnPwAnRQAoUAApSQAqTAAqTQAqUwArRgAtTgAuSAAvUAAvUwAvVgAwVAAwWQAxUgAyVgAzUwAzXgA0UQA0UgA0VgA0WQA0WgA0XAA0YgA1WgA1WwA1XQA1XwA2YwA3WwA4XAA4XwA4YwA5XQA5XgA6XAA6YwA6ZAA6ZgA6ZwA7XwA7cQA9aAA9bAA+aQA+awA+bQA+cAA+cQA/aQA/bAA/cQBAcQBBdABBdQBCaQBCdQBCdgBDbwBDdgBEcABEdwBEegBFcwBFdABFdQBFdgBFegBFewBGdgBGegBHeQBHegBIbwBIdwBIeABIegBIfQBJdQBJfABJfgBKeQBKfQBKfgBLfgBMfgBMgABMgQBNgABNggBOfABOfgBOgABOggBQgwBQhwBRhABRhgBShwBSiQBThgBThwBTiABUhwBUiwBViABVjQBWiwBWjABXiwBZjQBZkABajgBajwBckABdkQBflABhlgD///+5iBqqAAAA5ElEQVQY02NgAAExR3ZvLw42TjCHgVle0ClFWU1TJmlqiDADAyODRGVAqGrdJGtZ+/BZWUAFehMsSnOc+6uU4pvkglwZGFhbJ5ukzzeQVhFxX+hmqgtUoWgspaCl7VLjaWRoV9xixcDnGxHlJxQzo0jHsruhfHEhQ3XktLalsRrRtgHtU7M7OuMYAhclJ/RN9BBqbM+YkjuvS4BBvDa+vqLZR3JOT0fqkkQuoDsc8ubOzJ5ubjO7d0EBL9BZDOz6YWWZJVODDfNFWSBOZ2Di5lH3TzPjZ0ABy9hAypchCUAAAwYAADSePvz3Bi7CAAAAAElFTkSuQmCC";

<?php
// for f in *.ico; do for q in {0..100}; do convert -quality $q $f ${f%*.ico}$q.png; done; echo "b64images[\"${f%*.ico}.png\"] = \"$(base64 $(\ls -1S ${f%*.ico}*.png | tail -n 1) | tr -d '\n')\";"; done
// try optipng or pngcrush
// for f in *.png; do echo "b64images[\"${f}\"] = \"$(base64 $f | tr -d '\n')\";"; done > tmp.js
?>

var se = new Object(); // object of search engines
// se["keyword"] = ["displayed name, max 7 chars", "url to which the querystring can be appended", "b64images name"];
se["ii"] = ["ixquick", "https://eu.ixquick.com/do/search?q=", "ixquick.png"];
se["id"] = ["ixq_de", "https://eu.ixquick.com/do/search?l=deutsch&q=", "ixquick.png"];
se["wp"] = ["wp_de", "https://de.wikipedia.org/wiki/Spezial:Search?search=", "wp.png"];
se["wpe"] = ["wp_en", "https://en.wikipedia.org/wiki/Special:Search?search=", "wp.png"];
se["sp"] = ["strtpge", "https://startpage.com/do/search?query=", "sp.png"];
se["dd"] = ["dd_go", "https://duckduckgo.com/html/?ka=n&kh=1&kl=wt-wt&kp=-1&kt=n&kv=1&ky=-1&q=", "dd.png"];
se["sx"] = ["searx", "https://searx.me/?q=", ""];
se["gg"] = ["google", "https://www.google.com/search?hl=de&safe=off&q=", "gg.png"];
se["wa"] = ["wolfram", "https://www.wolframalpha.com/input/?i=", ""];
se["si"] = ["sp_img", "https://startpage.com/do/search?cat=pics&query=", "sp.png"];
se["gi"] = ["gg_img", "https://www.google.com/images?hl=de&safe=off&q=", "gg.png"];
se["mg"] = ["metager", "https://metager.de/meta/meta.ger3?eingabe=", ""];
se["wb"] = ["wb", "http://www.woerterbuch.info/?query=", "wb.png"];
se["leo"] = ["leo", "https://dict.leo.org/ende/index_en.html#/searchLoc=0&resultOrder=basic&multiwordShowSingle=on&search=", "leo.png"];
se["ud"] = ["ud", "http://www.urbandictionary.com/define.php?term=", "ud.png"];
se["gt"] = ["gg_tl", "https://translate.google.de/?hl=de&tab=wT#en|de|", "gg.png"];
se["osm"] = ["osm", "https://www.openstreetmap.org/?query=", "osm.png"];
se["gm"] = ["g-maps", "https://www.google.de/maps/preview?hl=de&q=", "gm.png"];
se["uu"] = ["uu_wiki", "http://wiki.ubuntuusers.de/", "uu.png"];
se["man"] = ["u_man", "http://manpages.ubuntu.com/cgi-bin/search.py?ie=UTF-8&titles=Title&q=", "man-u.png"];
se["dps"] = ["deb-pkg", "https://packages.debian.org/search?searchon=names&suite=all&section=all&keywords=", ""];
se["ups"] = ["uu-pkg", "http://packages.ubuntu.com/search?searchon=names&suite=all&section=all&keywords=", "man-u.png"];
se["fps"] = ["fed-pkg", "https://admin.fedoraproject.org/pkgdb/packages/?motif=*", ""];
se["lps"] = ["pkgs", "https://pkgs.org/download/", ""];
se["yt"] = ["youtube", "https://www.youtube.com/results?search_query=", "yt.png"];
se["imdb"] = ["imdb", "http://www.imdb.com/find?s=all&q=", "imdb.png"];
se["az"] = ["amazon", "https://www.amazon.de/s/?url=search-alias%3Daps&field-keywords=", "az.png"];
se["php"] = ["php.net", "http://de2.php.net/manual-lookup.php?lang=de&pattern=", "php.png"];
se["sh"] = ["slfhtml", "https://wiki.selfhtml.org/index.php?search=", "sh.png"];
se["down"] = ["down", "http://www.downforeveryoneorjustme.com/", "down.png"];
se["fefe"] = ["fefe", "https://blog.fefe.de/?q=", ""];
se["wtr"] = ["wtr-ol", "http://www.wetteronline.de/?searchpcid=pc_city_weather&searchpid=p_city_weather&pid=p_search&searchstring=", ""];
se["wtrc"] = ["wtr.com", "http://www.wetter.com/suche/?o=location&q=", ""];
se["gh"] = ["github", "https://github.com/search?utf8=✓&q=", ""];
se["bb"] = ["bing", "https://www.bing.com/search?q=", ""];
se["mdn"] = ["mdn", "https://developer.mozilla.org/search?q=", ""];
se["ctan"] = ["ctan", "http://ctan.org/search/?phrase=", ""];
se["so"] = ["stck-of", "http://stackoverflow.com/search?q=", ""];
se["gpg"] = ["pgp.mit", "https://pgp.mit.edu/pks/lookup?op=index&fingerprint=on&search=", ""];
se["amo"] = ["amo", "https://addons.mozilla.org/search/?q=", ""];
se["gsm"] = ["gsm", "http://www.gsmarena.com/results.php3?sQuickSearch=yes&sName=", ""];
se["ck"] = ["chfkch", "http://www.chefkoch.de/suche.php?wo=2&suche=", ""];
se["ypi"] = ["ypi", "http://youpronounce.it/search.jsp?q=", ""];
se["ks"] = ["ks", "https://kraut.space/start?do=search&id=", "ks.png"];
se["obi"] = ["obi", "https://www.obi.de/search/", ""];

function display_searchbuttons() {
    document.getElementById("searchbuttons").innerHTML = "";
    for ( kw in se ) {
        document.getElementById("searchbuttons").innerHTML += '<button type="button" title="' + kw + '" value="' + se[kw][0] + '" onclick=\'location.href="' + se[kw][1] + '" + document.getElementById("querystring").value\'><img src="data:image/png;base64,' + b64images[se[kw][2]] + '" alt="">&nbsp;' + se[kw][0] + "</button> \n";
    }
}

function parse_fragmentstring() {
    var fragmentstring = document.URL.substr( document.URL.split("#")[0].length + 1 );
    if ( fragmentstring == "" ) {
        var fragmentstring = document.URL.substr( document.URL.split("consearchterm=")[0].length + 14 );
    }
    if ( fragmentstring == "" ) {
        display_searchbuttons();
        document.getElementById("querystring").focus();
    } else {
        fragmentarr = fragmentstring.replace("%20", "+").split("+");
        kw = fragmentarr[0];
        if ( se[kw] ) {
            // first word in query is a search engine keyword
            fragmentarr.shift();
            location.href = se[kw][1] + fragmentarr.join(" ");
        } else {
<?php
if ( $dse ) {
    // use a default searchengine
    echo '            if ( kw != "nd" ) {
                location.href = se["' . $dse . '"][1] + fragmentarr.join(" ");
            } else {
                fragmentarr.shift();
                document.getElementById("querystring").value = fragmentarr.join(" ");
                display_searchbuttons();
            }
';
} else {
    // display all buttons and write the fragmentstring into the querystring input
    echo '            document.getElementById("querystring").value = fragmentarr.join(" ");
            display_searchbuttons();
';
}
?>
        }
    }
}
</script>

</head>

<body onload="parse_fragmentstring();">

<h1><a href="./">fpunktk.de/consearch</a></h1>

<noscript>
<p style="color: red; font-size: 200%; font-weight: bold;">
please enable javascript
</p>
</noscript>

<?php
if ( $browserintegration ) {
    // hide input and searchbuttons
    echo '<div style="display: none;">' . "\n";
}
?>

<div>
<label><input id="querystring" type="text"></label>
</div>

<div id="searchbuttons">
</div>

<p>
<a href="?include=browserintegration">add to browser</a>
</p>

<?php
if ( $browserintegration ) {
    echo '</div>

<p>
Now add consearch to your browser. In firefox this is done via the searchbar. If this does not work then consearch can be added via the following form, but this would send all queries to the server :-(
</p>

<form method="GET" action="./">' . "\n";
    if ( $dse ) { echo '<input type="hidden" name="dse" value="' . $dse . '">' . "\n"; }
    echo '<input type="text" name="consearchterm" value="">
</form>
';
}
?>

<p>
<a href="https://fpunktk.de/gitweb/index.cgi?p=consearch.git;a=summary">about</a>
</p>

</body>
</html>

