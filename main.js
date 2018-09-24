function readFile() {
var file = document.getElementsByTagName("input")[0].files[0];

  var reader = new FileReader(); 
  reader.onload = function (evt) {
    var fileContent = evt.target.result;
    document.getElementsByTagName("textarea")[0].innerHTML += fileContent;
  }
  reader.readAsText(file, "UTF-8");
}