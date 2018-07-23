function selectUpdate(value, selectId, dataKey, attribute) {
  let list = document.getElementById(selectId);
  list.options.length = 1;

  let curr = jsonData[dataKey][value];

  for (let key in curr) {
    if (curr.hasOwnProperty(key)) {
      let option = document.createElement("option");
      option.appendChild(document.createTextNode(curr[key][attribute]));
      option.setAttribute("value", curr[key][attribute]);
      list.appendChild(option);
    }
  }
}

let difficulty = document.getElementById("select-difficulty");

difficulty.addEventListener("change", () => {
  selectUpdate(difficulty.value, "select-monster", "diff", "name");
});

let type = document.getElementById("select-type");

type.addEventListener("change", () => {
  selectUpdate(type.value, "select-weapon", "type", "weaponName");
});
