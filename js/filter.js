function tasToggle() {
<<<<<<< HEAD
  "use strict";
  var element = document.getElementById("filterTASToggle");
  element.classList.toggle("is-danger");
}
function tasToggleRun() {
  "use strict";
  var element = document.getElementById("runTASToggle");
  element.classList.toggle("is-danger");
}
=======
    'use strict';
    var element = document.getElementById("filterTASToggle");
    element.classList.toggle("is-danger");
}

function capToggle() {
    'use strict';
    var element = document.getElementById("filterCapToggle");
    element.classList.toggle("is-warning");
}

function fillSelect(nValue, nList) {
    nList.options.length = 1
    let curr = jsonData['diff'][nValue]
    for (let key in curr) {
        if (curr.hasOwnProperty(key)) {
            let nOption = document.createElement('option')
            nOption.appendChild(document.createTextNode(curr[key].name))
            nOption.setAttribute("value", curr[key].name)
            nList.appendChild(nOption)
        }
    }
}
// TODO: move to seperate file
function typeSelect(nValue, nList) {
    nList.options.length = 1
    let curr = jsonData['type'][nValue]
    for (let key in curr) {
        if (curr.hasOwnProperty(key)) {
            let nOption = document.createElement('option')
            nOption.appendChild(document.createTextNode(curr[key].weaponName))
            nOption.setAttribute("value", curr[key].weaponName)
            nList.appendChild(nOption)
        }
    }
}
>>>>>>> JessicaDevitt-patch-1
