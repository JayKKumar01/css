var get = '';
var dat = (new Date()).getMinutes();
 var url1 = 'https://raw.githubusercontent.com/JayKKumar01/css/CricHunt/Input-data.txt?n'+dat;
$.ajax({ type: "GET",   
         url: url1,   
         async: false,
         success : function(text)
         {
             get = text;
             
         }
});
document.write(get);
