var currentFile = 0;
var editor = document.getElementById('editor');

function saveFile() {
    if (currentFile == 0) {
        localStorage.fileHTML = editor.innerHTML;
    } else if (currentFile == 1) {
        localStorage.fileJS = editor.innerHTML.replace("<div>","").replace("</div>","");
    } else if (currentFile == 2) {
        localStorage.fileCSS = editor.innerHTML;
    }
}

function openFile(file, shouldSave) {
    if (shouldSave) {
        saveFile();
    }
    currentFile = file;
    var files = document.getElementsByName("fileBrowserItem");
    for (var i = 0; i < files.length; i++) {
        files[i].setAttribute("class", "fileBrowserItem");
    }
    document.getElementById("fileBrowserItem" + currentFile).setAttribute("class", "fileBrowserItemSelected");
    if (currentFile == 0) {
        alert(localStorage.fileHTML);
        editor.innerHTML = localStorage.fileHTML === undefined ? "" : localStorage.fileHTML;
    } else if (currentFile == 1) {
        editor.innerHTML = localStorage.fileJS === undefined ? "" : localStorage.fileJS;
    } else if (currentFile == 2) {
        editor.innerHTML = localStorage.fileCSS === undefined ? "" : localStorage.fileCSS;
    }
}