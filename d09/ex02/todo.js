var cookie = [];
var ft_list;

// if (document.cookie && document.cookie != '') {

// }

window.onload = function() {
    getCookies();
    document.querySelector('#new').addEventListener("click", new_todo);
    ft_list = document.getElementById('ft_list');
};

window.onunload = function() {
    deleteCookies();
    var todo = ft_list.children;
    var newCookie = [];
    for (i in todo)
        document.cookie = `todo${i}={todo[i].textContent};`;
}

function getCookies() {
    if (document.cookie && document.cookie != '') {
        document.cookie.split(';').forEach(function(x) {
            var tmp = x.split('=');
            for (i in tmp)
                tmp[i] = tmp[i].trim();
            console.log(tmp);
            if (tmp[0] && tmp[0].match(/todo\d+/) != null && tmp[1])
                add_todo(tmp[1]);
        });
    }
}

function deleteCookies() {

}

function new_todo() {
    var input = prompt("Add new task to do");
    if (input)
        add_todo(input);
}


function add_todo(input) {
    var elem = document.createElement("div");
    var cooks = document.cookie;
    elem.classList.add('todo');
    elem.textContent = input;
    elem.addEventListener("click", function() {
        if (confirm("Are you sure?"))
            elem.remove();
    });
    ft_list.insertBefore(elem, ft_list.firstChild);
}
