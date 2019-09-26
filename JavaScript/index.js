    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    var child = document.getElementById("mySpan");
    var hLine = document.getElementById("hLine");
    var min = document.getElementById("con");   
    var flagM = document.getElementById("flag");
    var stemaM = document.getElementById("stema");
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) 
    {
        child.classList.add("disappear");
        hLine.classList.add("disappear");
        min.classList.add("min");
        flagM.classList.add("flagM");
        stemaM.classList.add("stemaM");
    } 
    else 
    {
        child.classList.remove("disappear");
        hLine.classList.remove("disappear");
        min.classList.remove("min");
        flagM.classList.remove("flagM");
        stemaM.classList.remove("stemaM");
    }
    }