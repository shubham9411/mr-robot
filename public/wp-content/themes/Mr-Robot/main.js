/*! Resolution 2017-01-27 */
function comment_form(){return""==jQuery("#comment").val()?(jQuery("#comment").focus(),void jQuery("[data-toggle='comment']").tooltip("show")):(jQuery("[data-toggle='comment']").tooltip("hide"),""==jQuery("#name").val()?(jQuery("#name").focus(),void jQuery("[data-toggle='name']").tooltip("show")):(jQuery("[data-toggle='comment']").tooltip("hide"),""==jQuery("#email").val()?(jQuery("#email").focus(),void jQuery("[data-toggle='email']").tooltip("show")):(jQuery("[data-toggle='email']").tooltip("hide"),isValidEmailAddress(jQuery("#email").val())?(jQuery("[data-toggle='valid-mail']").tooltip("hide"),void jQuery("#submit").click()):void jQuery("[data-toggle='valid-mail']").tooltip("show"))))}function isValidEmailAddress(a){var b=/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;return b.test(a)}function nprogress(){NProgress.start(),setTimeout(function(){NProgress.done(),jQuery(".fade").removeClass("out")},1e3),jQuery("#b-0").click(function(){NProgress.start()}),jQuery("#b-40").click(function(){NProgress.set(.4)}),jQuery("#b-inc").click(function(){NProgress.inc()}),jQuery("#b-100").click(function(){NProgress.done()}),jQuery("a").click(function(){NProgress.inc(),NProgress.start(),NProgress.set(.4),setTimeout(function(){NProgress.done()},3e3)})}!function(a,b,c,d,e,f,g){a.GoogleAnalyticsObject=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=1*new Date,f=b.createElement(c),g=b.getElementsByTagName(c)[0],f.async=1,f.src=d,g.parentNode.insertBefore(f,g)}(window,document,"script","https://www.google-analytics.com/analytics.js","ga"),ga("create","UA-90186372-1","auto"),ga("send","pageview"),function(a){a(document).ready(function(){a(window);a("#comment").addClass("form-control").attr("placeholder","Your Comment").attr("data-toggle","comment").attr("title","Please enter a comment!"),a(".logged-in-as").length<1&&(a("#comment").removeAttr("required"),a("#commentform #submit").hide()),a(".comment-form-comment label").hide(),a(".avatar").addClass("img-circle"),a("#submit-button").click(function(){comment_form()}),a(".custom-logo").addClass("img-circle"),a(".heading").css("background-image","url("+header_image+")"),a(".heading").css("background-color",custom_header_color),a("figure").find("img").each(function(b,c){a(c).addClass("img-responsive")}),a("figure").addClass("img-responsive"),nprogress()})}(jQuery),jQuery;