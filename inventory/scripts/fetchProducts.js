const inventoryBox = document.getElementById("inventoryTable");
const array = [
  {
    pid: 1,
    name: "Canon EOS 1500D",
    qty: 10,
    price: 38000,
    ownership: "Apricus Productions",
    type: "Camera",
  },
  {
    pid: 2,
    name: "Nikon KDP 1700I",
    qty: 1,
    price: 80000,
    ownership: "Apricus Productions",
    type: "VideoCamera",
  },
];

let html =
  "<thead><tr><td>ID</td><td>Name</td><td>Quantity</td><td>Price</td><td>Ownership</td><td>Camera</td></tr></thead>";

for (i = 0; i < array.length; i++) {
  html += "<tr>";
  html += "<td>" + array[i].pid + "</td>";
  html += "<td>" + array[i].name + "</td>";
  html += "<td>" + array[i].qty + "</td>";
  html += "<td>" + array[i].price + "</td>";
  html += "<td>" + array[i].ownership + "</td>";
  html += "<td>" + array[i].type + "</td>";
  html += "</tr>";
}

inventoryBox.innerHTML += html;
