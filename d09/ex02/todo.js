var ft_list;

function getCookies() {
    var cs = document.cookie;
    if (cs && cs != "") {
        cs.split(";").forEach(function(x) {
            var tmp = x.split("=");
            for (var i = 0; i < tmp.length; i++)
                tmp[i] = tmp[i].trim();
            console.log(tmp);
            if (tmp[0] && tmp[0].match(/todo\d+/) != null && tmp[1])
                add_todo(tmp[1]);
        });
    }
}

function deleteCookies() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var splitted = cookies[i].split("=");
        document.cookie = splitted[0] + "=;expires=Thu, 21 Sep 1979 00:00:01 UTC;";
    }
}

window.onload = function() {
    ft_list = document.getElementById('ft_list');
    getCookies();
    document.querySelector('#new').addEventListener("click", new_todo);
};

window.onunload = function() {
    deleteCookies();
    var todo = ft_list.children;
    console.log(todo);
    for (var i = 0; i < todo.length; i++) {
        document.cookie = `todo${i}=${todo[i].textContent};`;
    }
}

function new_todo() {
    var input = prompt("Add new task to do");
    if (input != "")
        add_todo(input);
}

function add_todo(input) {
    var todo = document.createElement("div");
    todo.textContent = input;
    todo.addEventListener("click", function() {
        if (confirm("Are you sure?") == true)
            todo.remove();
    });
    ft_list.insertBefore(todo, ft_list.firstChild);
}