window.onload = () => {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var error = url.searchParams.get("error");
    if (error == null) return;
    alert(error);
}