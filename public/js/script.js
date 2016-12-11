function tData(obj) {
    var s;
    var t=new Date();
    var y=t.getFullYear();
    var d=t.getDate();
    var mon=t.getMonth();
    switch (mon)
    {
      case 0: s="января"; break;
      case 1: s="февраля"; break;
      case 2: s="марта"; break;
      case 3: s="апреля"; break;
      case 4: s="мае"; break;
      case 5: s="июня"; break;
      case 6: s="июля"; break;
      case 7: s="августа"; break;
      case 8: s="сентября"; break;
      case 9: s="октября"; break;
      case 10: s="ноября"; break;
      case 11: s="декабря"; break;
    }
    var result=d+" "+s+" "+y;
    obj.date.value=result;
    }