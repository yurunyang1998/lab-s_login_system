//这里实现的重新聚焦的效果
function get(){
    var btn = document.getElementsByName('go');
    var warn_p = document.getElementById('warning_p');
    var warn_u = document.getElementById("warning_u");
    btn[0].onfocus = function(){
        warn_p.style.display="none";
    }
    btn[1].onfocus=function(){
        warn_u.style.display="none";
    }
}


//这里实现的是其中提示消息显示的效果
function err(){
    get();
    var btn = document.getElementsByName('go');
    var warn_p = document.getElementById('warning_p');
    btn[2].onclick = function(){
        var name = btn[0].value;
        var pswd = btn[1].value;
        if(pswd=="" || name==""){
            var event = event || window.event;
            event.preventDefault(); // 兼容标准浏览器
            window.event.returnValue = false; // 兼容IE6~8
        }
        if(name==""){
            warn_p.style.display="block";
        }
        else{
            err1();
        }

    }
}

function err1(){
    get();
    var btn = document.getElementsByName('go');
    var warn_p = document.getElementById('warning_p');
    var pswd = btn[1].value;
    if(pswd==""){
        warn_p.style.display="block";
    }

}