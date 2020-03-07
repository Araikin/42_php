var cookie = [];

function getCookies() {
    var cs = document.cookie;
    var data = [];
    if (cs && cs != "") {
        cs.split(";").forEach(function (x) {
            data.push(x.trim());
        });
        data.sort().reverse();
        for (var j=0; j<data.length; j++) {
            var tmp = data[j].split("=");

            for (var i = 0; i < tmp.length; i++) {
                tmp[i] = tmp[i].trim();
            }

            if (tmp[0] && tmp[0].match(/todo\d+/) != null && tmp[1]) {
                add_todo(tmp[1]);
            }
        }
        data = [];
    }
}

function deleteCookies() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var splitted = cookies[i].split("=");
        document.cookie = splitted[0] + "=;expires=Thu, 21 Sep 1979 00:00:01 UTC;";
    }
}

$(document).ready(function() {
    $('#new').click(new_todo);
    getCookies();
});

$(window).on("unload",function () {
    deleteCookies();
    var todo = $('#ft_list').children();
    for (var i = 0; i < todo.length; i++)
        // document.cookie = `todo${i}=${$(todo[i]).text()}`;
        document.cookie = 'todo' + i + "=" + $(todo[i]).text();
});

function new_todo() {
    var input = prompt("Add new task to do");
    if (input != "") {
        add_todo(input);
    }
}

function add_todo(input) {
    $('#ft_list').prepend($('<div>' + input + '</div>').click(function() {
        if (confirm("Are you sure to delete this task?") == true)
            this.remove();
    }));
}