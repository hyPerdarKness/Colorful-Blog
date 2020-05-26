  var aktif = 1; var timer;
  $(document).ready(function(){
    $("#topstory div").hide();
    $("#topstory div:first").show();
    sayfalar();
    renk(1);
    timer = setInterval(degistir,4000);
  });
  function degistir()
  {
    $("#topstory div:nth-child("+aktif+")").hide();
    aktif = (aktif + 1) % $("#topstory div").length;
    if(aktif == 0) aktif = $("#topstory div").length;
    $("#topstory div:nth-child("+aktif+")").fadeIn(1000);
    renk(aktif);
  }
  function tikla(deger)
  {
    renk(deger);
    $("#topstory div:nth-child("+aktif+")").hide();
    aktif = deger;
    $("#topstory div:nth-child("+aktif+")").fadeIn(1000);
    clearInterval(timer);
    timer = setInterval(degistir,2000);
  }
  function renk(deger)
  {
    $("#sayfa_no span").css("background-color","#800")
    $("#sayfa_no span:nth-child("+deger+")").css("background-color","#c00");
  }
  function sayfalar()
  {
    var sayfa_no = "";
    for(var i = 1; i <= $("#topstory div").length; i++)
    {
    sayfa_no += "<span class='sayfa' onclick=tikla("+i+")>"+i+"</span>"
    }
    $("#sayfa_no").html(sayfa_no);
  }
