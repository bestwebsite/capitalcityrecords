!function(a){"use strict";a(document).on("click",".snakepit-dismiss-admin-notice",function(b){b.preventDefault();var c=a(this).attr("id");Cookies.set(c,"hide",{path:"/",expires:730}),a(this).parents(".notice-info, .notice-warning").slideUp()})}(jQuery),function(a){"use strict";a("input#_post_subheading").parents(".option-section-_post_subheading").hide().find("input").attr({tabindex:1,placeholder:SnakepitAdminParams.subHeadingPlaceholder}).css({width:"100%"}).insertAfter(a("#title"))}(jQuery);