window.onload = () => {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var advice = url.searchParams.get("error") || url.searchParams.get("success");
    if (advice == null) return;
    alert(advice);
    window.location = url.href.split("?")[0];
}