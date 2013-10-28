var editor = document.getElementById('editor');
var caretAction = 0;
function brush(event) {
    var content = editor.innerHTML;
    var newContent = brushText(content);
    if (!(newContent === content)) {
        doSave();
        editor.innerHTML = newContent;
        caretAction === 0 ? doRestore(1) : placeCaretAtEnd(editor);
        document.execCommand("foreColor", false, null);
        caretAction = 0;
    }
}
function brushText(text) {
    removeInvalidFormatting();
    //add children
    text = text.split("&nbsp;");
    for (var i = 0; i < text.length; i++) {
        if(text[i] !== " " && keywords.indexOf(text[i]) > -1) {
            var format = document.createElement('span');
            format.setAttribute("class", "formatBlue");
            format.innerHTML = text[i];
            pasteTagAtCaret(format);
        }
    }
//    text.replace("&nbsp;", " ");
//    text = text.split(" ");
//    for (var i = 0; i < text.length; i++) {
//
//        //find words to format
//        var keyWords = keywords.split(" ");
//        for (var j = 0; j < keyWords.length; j++) {
//            if (text[i].indexOf("</span>") > -1) {
//                break;
//            }
//            text[i] = text[i].replace("&nbsp;", "");
//            if (text[i].indexOf(keyWords[j]) > -1) {
////                text[i] = "<span onkeydown='removeFormatting(this)' style='color:blue'>" + text[i] + "</span> ";
////                caretAction = 1;
//                var format = document.createElement('span');
//                format.setAttribute("class", "formatBlue");
//                format.innerHTML = text[i];
//                editor.appendChild(format);
//                //text[i]="";
//            }
//        }

//        text[i].replace("&nbsp;", "");
//        if (keywords.split(" ").indexOf(text[i]) > -1) {
//            text[i] = "<span id='SyntaxFormat' style='color:blue'>" + text[i] + "</span>&nbsp;";
//            if (i == text.length)
//                caretAction = 1;
//        }
    //text = text.join(" ");
    return text.join("&nbsp;");
}

function removeInvalidFormatting() {
    var formattedTags = document.getElementsByClassName("formatBlue");
    console.log(formattedTags.length);
    for (var i = 0; i < formattedTags.length; i++) {
        console.log(formattedTags[i]);
        if (keywords.indexOf(formattedTags[i].innerHTML) == -1) {
            alert("removing invalid formatted tag with content: " + formattedTags[i].innerHTML);
            formattedTags[i].setAttribute("class", "");
        }
    }
}

function pasteTagAtCaret(tag) {
    var sel, range;
    if (window.getSelection) {
        // IE9 and non-IE
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();

            // Range.createContextualFragment() would be useful here but is
            // only relatively recently standardized and is not supported in
            // some browsers (IE9, for one)
            
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = tag.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);

            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        // IE < 9
        document.selection.createRange().pasteHTML(tag);
    }
}

function placeCaretAtEnd(el) {
    el.focus();
    if (typeof window.getSelection != "undefined"
            && typeof document.createRange != "undefined") {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
}

var saveSelection, restoreSelection;
if (window.getSelection && document.createRange) {
    saveSelection = function(containerEl) {
        var range = window.getSelection().getRangeAt(0);
        var preSelectionRange = range.cloneRange();
        preSelectionRange.selectNodeContents(containerEl);
        preSelectionRange.setEnd(range.startContainer, range.startOffset);
        var start = preSelectionRange.toString().length;
        return {
            start: start,
            end: start + range.toString().length
        }
    };
    restoreSelection = function(containerEl, savedSel, offset) {
        var charIndex = 0, range = document.createRange();
        range.setStart(containerEl, 0);
        range.collapse(true);
        var nodeStack = [containerEl], node, foundStart = false, stop = false;
        while (!stop && (node = nodeStack.pop())) {
            if (node.nodeType == 3) {
                var nextCharIndex = charIndex + node.length;
                if (!foundStart && savedSel.start >= charIndex + offset && savedSel.start + offset <= nextCharIndex) {
                    range.setStart(node, savedSel.start - charIndex + offset);
                    foundStart = true;
                }
                if (foundStart && savedSel.end >= charIndex + offset && savedSel.end + offset <= nextCharIndex) {
                    range.setEnd(node, savedSel.end - charIndex + offset);
                    stop = true;
                }
                charIndex = nextCharIndex;
            } else {
                var i = node.childNodes.length;
                while (i--) {
                    nodeStack.push(node.childNodes[i]);
                }
            }
        }

        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    }
} else if (document.selection && document.body.createTextRange) {
    saveSelection = function(containerEl) {
        var selectedTextRange = document.selection.createRange();
        var preSelectionTextRange = document.body.createTextRange();
        preSelectionTextRange.moveToElementText(containerEl);
        preSelectionTextRange.setEndPoint("EndToStart", selectedTextRange);
        var start = preSelectionTextRange.text.length;
        return {
            start: start,
            end: start + selectedTextRange.text.length
        }
    };
    restoreSelection = function(containerEl, savedSel, offset) {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(containerEl);
        textRange.collapse(true);
        textRange.moveEnd("character", savedSel.end + offset);
        textRange.moveStart("character", savedSel.start + offset);
        textRange.select();
    };
}

var savedSelection;
function doSave() {
    savedSelection = saveSelection(document.getElementById("editor"));
}

function doRestore(offset) {
    if (savedSelection) {
        restoreSelection(document.getElementById("editor"), savedSelection, offset);
    }
}

var keywords = 'abstract assert boolean break byte case catch char class const ' +
        'continue default do double else enum extends ' +
        'false final finally float for goto if implements import ' +
        'instanceof int interface long native new null ' +
        'package private protected public return ' +
        'short static strictfp super switch synchronized this throw throws true ' +
        'transient try void volatile while';