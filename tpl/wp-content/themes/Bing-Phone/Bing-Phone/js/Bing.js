var _timer = {};
function delay_till_last(id, fn, wait) {
    if (_timer[id]) {
        window.clearTimeout(_timer[id]);
        delete _timer[id];
    }

    return _timer[id] = window.setTimeout(function() {
        fn();
        delete _timer[id];
    }, wait);
}

function ajax_load_hide(){
    $("#ajax_load").hide();
}
function ajax_load_show(){
    $("#ajax_load").show();
}
function mask_hide(){
    $("#main .mask").hide();
}
function mask_show(){
    $("#main .mask").show();
}
function Bing_pic(){
    $("img.pic").each(function(){
        var DataSrc = $(this).attr("data-src");
        $(this).attr("src",DataSrc);
    });
}
$(document).ready(function() {
    Bing_pic();
    $("#footmenu li").on('click', function(){
        $("#footmenu li").removeClass("current");
        $(this).addClass("current");
    });
    setInterval("Bing_pic()",100);
    $(".nextpage a").attr("href", $(".nextpage a").attr("href") + "?action=ajax_list");
    var Ajax_Url = null;
    $(window).scroll(function(){
        delay_till_last('scroll_Ajax', function(){
            if($(window).scrollTop() >= $(document).height() - $(window).height() - 80){
                ajax_load_show();
                Ajax_Url = $(".nextpage a").attr("href");
                if( Ajax_Url ){
                    $.ajax({
                        type: "GET",
                        url: Ajax_Url,
                        success: function(data){
                            Bing_pic();
                            ajax_load_hide();                            
                            $(".nextpage").remove();
                            $(".postlist").append(data);
                            Bing_pic();
                        },
                        error: function(data){
                            Bing_pic();
                            ajax_load_hide();
                            $(".postlist").after('<div id="ajax-list-error">文章获取失败</div>');
                            Bing_pic();
                        }
                    });
                }else{
                    ajax_load_hide();
                    $("#ajax-list-error").remove();
                    $(".postlist").after('<div id="ajax-list-error">全部文章已加载完毕，没有更多的文章了~</div>');
                }
            }
        }, 100);
    });
    $("a.logo").on('click', function(){
        $("#footmenu li").removeClass("current");
        $("#footmenu li.home").addClass("current");
    });
    $("#ajax_load").hide();
});

jQuery(document).keypress(function(e) {
    if (e.ctrlKey && e.which == 13 || e.which == 10) {
        jQuery(".submit").click();
        document.body.focus()
    } else if (e.shiftKey && e.which == 13 || e.which == 10) {
        jQuery(".submit").click()
    }
});

jQuery(document).ready(function(a) {
    var n = null,
    H = false,
    i = document.title,
    t, h = window.opera ? document.compatMode == "CSS1Compat" ? a("html") : a("body") : a("html,body");
    if (window.history && window.history.pushState) {
        var DOM_a = " a[target!=_blank]:not([href*='#'])";
        a(document).on("click", "a.logo,#footmenu" + DOM_a + ",.postlist" + DOM_a + ",.categorypage" + DOM_a,
        function(b) {
            b.preventDefault();
            if (n == null) {
                t = {
                    url: document.location.href,
                    title: document.title,
                    html: a("#main").html(),
                    top: h.scrollTop()
                }
            } else {
                n.abort()
            }
            t.top = h.scrollTop();
            var q = a(this).attr("href").replace("?action=ajax_load", "");
            $("html, body").animate({
                scrollTop: 0
            },
            120);
                ajax_load_show();
                $('#main').fadeTo(500, 0.3);
                a("#main").hide;
            n = a.ajax({
                url: q + "?action=ajax_load",
                success: function(v) {
                    H = true;
                    var state = {
                        url: q,
                        title: i,
                        html: v
                    };
                    history.pushState(state, i, q);
                    document.title = i;
                    Bing_pic();
                    $('#main').fadeTo(200, 1);
                    ajax_load_hide();
                    a("#main").html(v);
                    $("#header-area .title").html(HeaderTitle);
                    $("title").html(PageTitle);
                    Bing_ajax_comm();
                }
            });
            return false
        });
        window.addEventListener("popstate",
        function(i) {
            if (n == null) {
                return
            } else {
                if (i && i.state) {
                    H = true;
                    document.title = i.state.title;
                    a("#main").html(i.state.html)
                } else {
                    H = false;
                    document.title = t.title;
                    a("#main").html(t.html);
                    h.animate({
                        scrollTop: t.top
                    },
                    0)
                }
            }
        })
    }
});