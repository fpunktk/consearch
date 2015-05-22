<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<!--
consearch

Copyright (C) 2015 Felix Kästner, consearch @ f p u n k t k . de

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, see http://www.gnu.org/licenses/.
-->

<title>consearch</title>
<link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAQMAAAAlPW0iAAAABlBMVEUAAACMuuz63rNKAAAAK0lEQVQI12P4/58BiM4cZ9gdDUVnboNE/n8Hoc6JDLvLGLrLGF4DyWlAcQBYKBgvsgbJOAAAAABJRU5ErkJggg==" type="image/png">
<link rel="search" type="application/opensearchdescription+xml" href="opensearchdescription-consearch.xml" title="consearch">

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
    padding: -4px;
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
b64images["gb.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB9sMGwwBEPtzo5IAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAACeUlEQVQ4y52TP4hUVxTGf+fc+2bezOzO7MyuUULiphBCQAhpUvm3UGQDlqlMq4Roq0IgrGmsTONWpjdFGkESLSwU7Fx1QUmhWdAgbqIbHXZnZ+a9d+89KVaJWvqrv+/j4/AdMTNeI4hwZl5gr/Iu14F9NxLz82ZvmOTtgF8dv3w1x6r+QMGIMZ4CR8RRSZs8nOWDlYt2Ykfxv+fy0ybPJ1sMLdGyHs3sW0r5lChGQAkiFOYI5gnyLy/Cj/zFM+oIs2trwuXhSf6WwySJlCaUEoCCIC/RIhKSo1/zBN3KBh2UBjGNMO3QtZ89T/QAamtUKFGUmpTY+l1uXnzIn8ttYlZj+45n7Dn8GXT3MSPrTMQFHuhxXsg3ntISIo6AAgG3vsSFM31C+RPamsa1K/qFcu3qArsPXafqfclD30QAY+ypREkGJg78P9z+bQnieerdjOaWFWoziZg7tHmE+4vHmN6/k5h9j7CBiSkFjlIcY3OMUuTOvT5VfRutrRvknwRqH0Ymto2pfMZwpsNUv8TFAYKhhqfEYQgJRREmO4mqDjqT8J1E1kxEE/LcmOwMeP4kx00J5g21Vw0qlFKVKnWZ+/oj2tt/x+pdAp4iZpShQ7e9RPZoyHA6BxUUwwRPZR6AaILoFvLZXXxenefByjJ54yCuFnCNK+jgEoPhHN1eD/WJYIID4bvRLTISlSkiQiTSZJnuyz+4f2uV4Wqk0WhRffwFrdmdNKYd0W3O0EA4NVqkr8LmpIWEQwGXBpTVBjGBWI5oB80FJW7eTKBn0VNLF4DTIIGEYEAEok5AHRygYhiGGa80hplnMp0Tji5mhNmc98E/Hr/1je/Df+WzHXTVC++fAAAAAElFTkSuQmCC";
b64images["gg.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/gD+AP7rGNSCAAAACXBIWXMAAABIAAAASABGyWs+AAAACXZwQWcAAAAQAAAAEABcxq3DAAADCklEQVQ4yyXSy2ucVRjA4d97zvdNJpPJbTJJE9rYaCINShZtRCFIA1bbLryBUlyoLQjqVl12W7UbN4qb1gtuYhFRRBCDBITaesFbbI3RFBLSptEY05l0ZjLfnMvrov/Bs3gAcF71x6VVHTk+o8nDH+hrH89rUK9Z9Yaen57S3wVtGaMBNGC0IegWKIDxTtVaOHVugZVmH3HX3Zz+4l+W1xvkOjuZfPsspY4CNkZELEgEIJKwYlBjEwjec/mfCMVuorVs76R8+P0KYMmP30U2dT8eIZqAR2ipRcWjEYxGSCRhV08e04oYMoxYLi97EI9YCJ0FHBYbIVGDlUBLwRlLIuYW6chEmQt/rJO09RJjhjEJEYvJYGNhkbUhw43OXtIWDFRq9G87nAaSK6sVRm8r8fzRMWbOX2Xx7ypd7ZET03sQhDOz73DqSJOrd+7HSo4QIu0Nx/4rOzx+cRXZ9+z7+uqJ+3hiepxK3fHZT2tMjXYzOtzL6dmznPzhLexgN0QlxAAYxAlqUqRmkf5j59RlNQ6MFHhgcpCTTx8EUb5e+plD7x4jjg1ANCAgrRQAdR7xKXjBlGyLYi7PxaUmb8z8xcpGHVXLHaXdjI0egKyJiQYTEhSPREVIEUBNC+Mqm+xpz3j0njLPHB2nsh1QgeG+IS48dYbD5YNoo0ZUAbVEuTUoKuBSZOarX/WhyQn6eg2+usDWf0s0tq8zNPYk+WI/Lnge++hlvlyfQ3NdECzGRWKwEEA0qNY251n69kV6+Y0kbaCZoebG2X3oU7pKoyxuXOPe945zs9DCeosGIXoBDyaLdf6ce4Hbk+/Y299ksKtAuaeNsiyw8c1LKIZ95b0MdgxA5giixACpTxEPSau6QdFfI5/2cLPmEW+JAQrtJUJzDXF1dkwHzVodJMX4HFEcQQMaFdPeM0Jb/4PUtzzaLKAhRyJFwo6lbegRNFfk819muV5dR4JBQoQdQ2xFiDmSNDHiaptamR9Gq5cQ18AledrGDpOfeI5Lq8u88smbhMRisoSAgAYghdfn5H/JkHuR1YqVZQAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxMi0wOS0wNlQxODo1NjozNyswMjowMIOffY4AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTItMDktMDZUMTg6NTY6MzcrMDI6MDDywsUyAAAAAElFTkSuQmCC";
b64images["ggtl.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAIAAADAAbR1AAAABnRSTlMAAAAAAABupgeRAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAABnklEQVQ4y52UsatBURzHLylZ/QHsJv+EzU4Ggyw2dSelZKRsMrgZlMUgWaQnAwZ1ihtdMlyudJFud8Ngue/1voafzrvhneHT6Rzn+/md37kRhN9xu10uhsHTNA1D0yjP5+NxvRbeH3bRXz+j3ZakWq1c5gWn0+GwXH4gQFAmk82KIhiPJxKxGEjXQV3f7xXlnwI+lJd9LAAnE8aGQwTJsqIwhqBUKp8vFNJpxiyLMhIZjSwrHO73r9dgsNu1LK+32bzfwYeAf0ZaKW5WLE6npvmp4KHhBXhe2ha76MFAVXUdhOaFYLvdbGYzvu+Io8Sd6BeFFRrt8VSrui7gR+i4yyWKqoqXwD2wTlsBomp6FsXZChBNiecF0V8QAlTdajEmy6gdAuwi+iHgoykRRAWIgziX6/VkGaEQQPkkwOCjse5wRKOdDr04/XwRSondQKBe3+3c7lJpPn8InM5kcjxGNOYgBCBfaSjUaCwWIG4DAeZ/COyiKSFAKG0FiA8EfBK8o8EBkI+mu5Qv/kgQjTk66/dLkqbx9PkqldWKEqe+AWreO0yFWrCmAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE0LTA3LTExVDE3OjA1OjQ2KzAyOjAwDu7CdwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxMy0xMC0yOFQxNjo1Njo0NiswMTowMO6RwPYAAAAASUVORK5CYII=";
b64images["gm.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAABgFBMVEX////++Pf4taTud17pZkznblvwrqXucVTlWUDhTzreSjftpp//77//6qLxfF7sak3oX0XjVT7aPy7bXDT+0UD/7rnpYkfcRTLZPCzXUif/1z3/1jb+y0b/66n/6ZruglbeSDTVNCbhhWj/89L/55P/5Yn6yGrWNyjXSSD8wxP/zQX/zAD/ywP+yAn9vh3/5o7/5H70tHHUOCXxsj3/1C3/1Cr/0y3+0DP+zDr/4XH/3Vz/6JXgZFHSLSHfbB7/0yf/0Rr/0BX/zxf1yyfqxjn+xiv9wDb/3FX/32r/2UXup4/OIxrupxX/zgz/zAHRxktxv+JfwfiRtZ3/2D7/1TH1yaPKGRL6yA2tx45mx/9exf9RwP9Kvv//2kv/0iH/5ITNNwv/yQXFxmRixv9Zw/9Gvf//1zncxDT2yg3+xwq2wXVWwv9Bu/+Ozt/0xRaUvqZgwfhPwP47uf//6Z6pyZ1wyv13wNc2uP//zxjayUVpyP/+1kn+0jj+zin0yzygy7yC12GqAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAAAEgAAABIAEbJaz4AAADNSURBVBgZBcG9LkMBAAbQ74hSva1WxF/Cpo1BYurQWITBA3gUo4fwHh6CBYPVKhHS+EkMNG0vDalzJAEmSZJIMlP5m8UoSSJ18FMlST7UF74nzYFF+EmqtsK7tUGTJIntybzn9cEK8FuxN1J4Wim8bUBfr1wAAI5NZx7aEIiT12bx0OaeXdDduTxyu39HF2XNwfLzS/WI627V59JXS69zM13bKa66DYaNYcPpxeZcs2OUer9WahUOxofvWfdYK5c+teYiZ4RxKo9q5er5P8TUN7q8rPQcAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE0LTA3LTExVDE3OjA1OjQ2KzAyOjAwDu7CdwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxMy0xMC0yOFQxNjo1Njo0NyswMTowMEjmy0IAAAAASUVORK5CYII=";
b64images["ixquick.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAvVBMVEX///92p9Pv9fshe8WawOHP5PYAbsdVnNd2uesAdtEpjdoAe9kAc82axOaKtt2Ku+OKv+mKw+6Kx/N2wfUAhuUAfdoAdc+KsdaKrM+KqMqKpMSqudC71OoAg+IAacEAX7MAVaUAS5gAQ412k7jv8vcAZrsAW60AUqERVZ2qv9iKveUAaL4AYLMAV6gxca/f6PIxfcGqwdlejLsRW6RmhrAxZaEAO4QRQ4UhWpvP2+kALXGqt83f5e67xdZ2h6loJxIxAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAASAAAAEgARslrPgAAAJdJREFUGBkFwYdCglAAAMALC0Ve2lCjIfBc2CAa2q7//6zuAA4SAEDvEAA4SvsAwCBLEwAwzMMxYDQ+OT07n0xnw9FFcXl17aYX8vlknoeyquNiuSLpZ/k0z9L1ptneAndhFtL7h/axAxiX5bpqGwCeqmrTNvEZoKvr+uU1LnYARYyFbv/2DrD/+ITl1zfws1sBv38AAPAPLnkMg3sgXCoAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTQtMDctMTFUMTc6MDU6NDYrMDI6MDAO7sJ3AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTEwLTI4VDE2OjU2OjQ4KzAxOjAwvq67qwAAAABJRU5ErkJggg==";
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
b64images["sp.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAACXBIWXMAAABIAAAASABGyWs+AAACMVBMVEVDi/VDi/ZEi/VEi/ZEjfZFi/ZIjvZLkvdSmPdVnfdWnfdZnvdbofdfofdfpvhlqPdlqvhsr/htrvhxsvl1s/h5s/l6uPl+u/mAu/qFv/qIwfqNxvqUyvqVy/qZzvo/h/U/ifU/ifZBifVBi/ZCifZCi/ZEjfZEkPZGkPZHkPdHkfZJkfZJkfdKkPdKkfZKkfdMlPdOkfZPmPZPmfdQl/dQmfZRiOdUjOdVnfdZnPdZnvhalOhanvhcofhflOhgn/dgpPhgpvhhn/dipPhjnOhmqfhmqflnq/lonOhpq/hrn+hrq/hrrPhsr/htp/htrvltr/luoelvnehvr/hvr/lwr/hysPlzr/h1qOl1tfl1t/l3sfl3t/h3t/l4rvl7rOl7tPl7ufl8t/l8ufl9tPl+sfl/ufl/ufqBaJuBn9qBt/mDd6uDvfmElMqFvfmFvfqFvvmFvvqHwvmHwvqIfKuIuPqIuvqKiruLxPmLxPqLx/mLx/qNx/mNx/qORmyOYoyQSGyQV3yQu+mQu+qQx/qRSGyRx/qRyfqRyfuTZoyTwPqUyfqUyfuVyfqVzPuYTWyYlruZXXyZwPqaepuawPqbYH2bwvqdxPuhU22hY32iKj2jKz2kLD6kO02lLD6ly/umLT6mLj6nLj6nPE2sJC6t0PuxGR+x0fuyGh+zGh+z0/y0Gx+3Dw+41fzF3fzL4v3M4P3a6f3b6f3e6/3e7P3m8P7o8v7z+P70+f71+f////8csBEiAAAAH3RSTlP+/v7+/v7+/v7+/v7+/v7+/v7+/v7+/v7+/v7+/v7+avpWVgAAAAFiS0dEuqOxR9oAAAELSURBVBgZBcE9L0NhFAfw/3me4zbVl7S0SNqFVIuQXIOIxECsPoEPgJjs3fgEFhOLySwGEYmwkBjEIiIGCQODhr4899729hy/H5V3CEoghgJWD1ibRkDGqJdtUZRQ1jZDyND4GOHnxQlLhwhQHgmbheHao7BECjL5Cq4kvVLIiREXuG7glzQKGw8YEiMdF+Yy544X2+0ATmxiNLk5P3v/VC3ODPrh5QdLvM2/78nps/Xs5O1bLHagnj+5WV2emDuspXrP+mV5wyutpfriNS6mypnXbyN3KNrW3jV64VFD+kJ+tLB0atNb/bpqKlKmKoDdCoL9JhEAwxEBsfs8/lMYEIi8LkAGChILgvkHgGxyIshZcSEAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTUtMDUtMjJUMTg6MjE6NTgrMDI6MDD9Qvh9AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE0LTAzLTE3VDIwOjU5OjU2KzAxOjAwcSze8gAAAABJRU5ErkJggg==";
b64images["down.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAAAEgAAABIAEbJaz4AAACUSURBVBjTY2AAgdR/QKDLgABgAR0kgXh0gThkAWlhhICwAAND69c3HgxRIAFVhpT3b2IYfv/790o5HCxg9w3IZvgFZJ5OAQm4PAESLxjq/gKpxyCBR0D8O5aBZdk/BPjbArSF/zhCYCUryF75RzD+KT6IS8w+Q/iPZWAOjQZZ9e+jBcLpzUCrfkYh+YV1/r9fZRAmAMypgqgtOlghAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE1LTA1LTE4VDE0OjM3OjI2KzAyOjAwVrt97QAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNS0wNS0xOFQxNDozNTo1NSswMjowMBg+BugAAAAASUVORK5CYII=";
b64images["leo.png"] = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAACXBIWXMAAABIAAAASABGyWs+AAABp1BMVEX///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCgAZFAAAAAAQDAAAAAAPDAAAAAAAAAAlHwMAAAAAAAADAwAAAAAuJQM2MQMAAABRRgU5MQUfGgInIAIYFAJGOwRTRwZFOwYXEwI+NQZuXgmkjAyiigxmVwitlA0DAwBGOwWskQyskQ64nA0rJQOaggxGPAaskg2ehgvevBGzlw3CpQ+ehwtbTQe3nA7CpA7RsRGDbgq6nw6wlw7Fpw/auhCLdwubhAyahAzZuRDkwxFwXwiokA3Aow/cvBHgvxHFpw/gvxHauRHjwRHhvxF3ZgknIQPEpw/NsA9sXAjXuBHbuhDtyhJlVgjiwBLiwyTnxBLqxxLmxBHvyhLvzBLiwBHHs0jfwivtyBLpxhLzzxLuyxLMsinxzRLnyCbyzxTTuCvwzRPwzBPxzRLvyxLxzhLxzhLvzRzxzRKeklXpxxr10BP20ROrp5T20RMUEAH10RXzzhL30hT10BP10RP20hP40xP40xP30hP40xP40xP40xP40xP40xP40xP40xPKysr40xOP+DMuAAAAi3RSTlMACAkQERMXGBweLDEzOEBBQkRIS1JTU1dZWV5fYmpuc3WBgoeHkpKXnqKkpKWlrK2ur6+zs7W1tre3t7i5uby8vL29vr6+v7+/v7/AwMLCxMXGx8fIyMnJysvLzMzO0NDR0tLS09PU1tbY2dra293e3t/g4OHh5ejp6erq7O3v7+/x8vT2+Pn6+/z9D21gkgAAAAFiS0dEAIgFHUgAAADOSURBVBjTY2BgYGDhZ0AFqq7iXLIK3AzCPFABxWRtn4QeXzUzHaiAUllXVmJ1UlSGBITP69XZU9qdXlESywwRkHfv6enIrs0s8uCECHCFNPaEFfYARTVEmUACWjFtLrnBleHlad5yIL5QSm6rrZFPZ0RVnnMgB1BA1NHJICfe3s/fLdVBAKRCzCa/Jci8oMaz3E4KbCafcXN7XEeoqZWuIcQSacuGps68np66ehNBsAA7q2aAdXtkcXSHvjLU6RwiFnoqMpLqHAj/sjHCmQCutDB5t6/XDgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNS0wNS0xOFQxNDo1OTowMSswMjowMCdFvu4AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTUtMDUtMThUMTQ6NTg6MjkrMDI6MDDIECR2AAAAAElFTkSuQmCC";
// for f in *.ico; do for q in {0..100}; do convert -quality $q $f ${f%*.ico}$q.png; done; echo "b64images[\"${f%*.ico}.png\"] = \"$(base64 $(\ls -1S ${f%*.ico}*.png | tail -n 1) | tr -d '\n')\";"; done
// try optipng
// for f in *.png; do echo "b64images[\"${f}\"] = \"$(base64 $f | tr -d '\n')\";"; done > tmp.js

var se = new Object(); // object of search engines
// se["keyword"] = ["displayed name, max 7 chars", "url to which the querystring can be append", "b64images name"];
se["ii"] = ["ixquick", "https://eu.ixquick.com/do/search?q=", "ixquick.png"];
se["id"] = ["ixq_de", "https://eu.ixquick.com/do/search?l=deutsch&q=", "ixquick.png"];
se["wp"] = ["wp_de", "https://de.wikipedia.org/wiki/Spezial:Search?search=", "wp.png"];
se["wpe"] = ["wp_en", "https://en.wikipedia.org/wiki/Special:Search?search=", "wp.png"];
se["sp"] = ["strtpge", "https://startpage.com/do/search?query=", "sp.png"];
se["dd"] = ["dd_go", "https://duckduckgo.com/html/?ka=n&kh=1&kl=wt-wt&kp=-1&kt=n&kv=1&ky=-1&q=", "dd.png"];
se["gg"] = ["google", "https://www.google.com/search?hl=de&safe=off&q=", "gg.png"];
se["im"] = ["ixq_img", "https://startpage.com/do/search?cat=pics&query=", "ixquick.png"];
se["gi"] = ["gg_img", "https://www.google.com/images?hl=de&safe=off&q=", "gb.png"];
se["wb"] = ["wb", "http://www.woerterbuch.info/?query=", "wb.png"];
se["leo"] = ["leo", "https://dict.leo.org/ende/index_en.html#/searchLoc=0&resultOrder=basic&multiwordShowSingle=on&search=", "leo.png"];
se["ud"] = ["ud", "http://www.urbandictionary.com/define.php?term=", "ud.png"];
se["gt"] = ["gg_tl", "https://translate.google.de/?hl=de&tab=wT#en|de|", "ggtl.png"];
se["osm"] = ["osm", "https://www.openstreetmap.org/?query=", "osm.png"];
se["gm"] = ["g-maps", "https://www.google.de/maps/preview?hl=de&q=", "gm.png"];
se["uu"] = ["uu_wiki", "http://wiki.ubuntuusers.de/", "uu.png"];
se["man"] = ["u_man", "http://manpages.ubuntu.com/cgi-bin/search.py?ie=UTF-8&titles=Title&q=", "man-u.png"];
se["ups"] = ["ups", "http://packages.ubuntu.com/search?searchon=names&suite=all&section=all&keywords=", "man-u.png"];
se["yt"] = ["youtube", "https://www.youtube.com/results?search_query=", "yt.png"];
se["imdb"] = ["imdb", "http://www.imdb.com/find?s=all&q=", "imdb.png"];
se["az"] = ["amazon", "https://www.amazon.de/s/?url=search-alias%3Daps&field-keywords=", "az.png"];
se["php"] = ["php.net", "http://de2.php.net/manual-lookup.php?lang=de&pattern=", "php.png"];
se["sh"] = ["slfhtml", "http://de.selfhtml.org/navigation/suche/index.htm?Suchanfrage=", "sh.png"];
se["down"] = ["down", "http://www.downforeveryoneorjustme.com/", "down.png"];

function display_searchbuttons() {
    document.getElementById("searchbuttons").innerHTML = "";
    for ( kw in se ) {
        document.getElementById("searchbuttons").innerHTML += '<button type="button" value="' + se[kw][0] + '" onclick=\'location.href="' + se[kw][1] + '" + document.getElementById("querystring").value\'><img src="data:image/png;base64,' + b64images[se[kw][2]] + '" alt="">&nbsp;' + se[kw][0] + "</button> \n";
    }
    document.getElementById("querystring").focus();
}

function parse_fragmentstring() {
    var fragmentstring = document.URL.substr( document.URL.split("#")[0].length + 1 );
    if ( fragmentstring == "" ) {
        display_searchbuttons();
    } else {
        fragmentarr = fragmentstring.replace("%20", "+").split("+");
        if ( se[fragmentarr[0]] ) {
            // first word in query is a keyword
            kw = fragmentarr[0];
            fragmentarr.shift();
            location.href = se[kw][1] + fragmentarr.join(" ");
        } else {
            // there is no keyword
            // display all buttons and write the fragmentstring into the querystring input
            document.getElementById("querystring").value = fragmentarr.join(" ");
            display_searchbuttons();
            // or
            // use a default searchengine
            //location.href = se["sp"][1] + fragmentarr.join(" ");
        }
    }
}
</script>

</head>

<body onload="parse_fragmentstring();">

<h1><a href="">fpunktk.de/consearch</a></h1>

<noscript>
<p style="color: red; font-size: 200%; font-weight: bold;">
please enable javascript
</p>
</noscript>

<div>
<label><input id="querystring" type="text"></label>
</div>

<div id="searchbuttons">
</div>

<p>
<a href="https://github.com/fpunktk/consearch">about</a>
</p>

</body>
</html>

