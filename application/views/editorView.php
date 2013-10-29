<html>

    <head>
        <title>Katy Editor</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/sirolf2009.css"/>
        <script type="text/javascript" src="http://localhost/rsc/lib/jszip.js"></script>
        <style>
            dl {width: 395px; font-size:12px}
            dd  {padding-top:15px;padding-bottom:5px;}
            dt  {padding-top:5px;padding-bottom:5px;}
            dt {float:left; padding-right: 5px;}
            dt {clear: left;}
            dt, dd {min-height:1.5em;}
            <?php echo($this->input->post("CSS")); ?>
        </style>
    </head>
    <body>
        <?php
        $this->load->view('commonHeader');
        $attributes = array('id' => 'editorForm');
        echo form_open('editor', $attributes);
        ?>
        <div class="contentBig">
            <div class="panel" style="width: 15%; float: left"> <!-- control panel -->
                <div class="panel2">
                    <input type="button" value="Download source as .zip" onclick="downloadSource();"><br>
                </div>
                <div class="fileBrowser">
                    <dl>
                        <div class="fileBrowserItem" onclick="openFile(0, true);" name="fileBrowserItem" id="fileBrowserItem0"><dt><img class="fileBrowserItemImage" src="http://localhost/rsc/images/file.png"></dt><dd class="fileBrowserItemName">HTML</dd></div>
                        <div class="fileBrowserItem" onclick="openFile(1, true);" name="fileBrowserItem" id="fileBrowserItem1"><dt><img class="fileBrowserItemImage" src="http://localhost/rsc/images/file.png"></dt><dd class="fileBrowserItemName">Javascript</dd></div>
                        <div class="fileBrowserItem" onclick="openFile(2, true);" name="fileBrowserItem" id="fileBrowserItem2"><dt><img class="fileBrowserItemImage" src="http://localhost/rsc/images/file.png"></dt><dd class="fileBrowserItemName">CSS</dd></div>
                    </dl>
                </div>
            </div>
            <script type="text/javascript" src="<?php echo base_url(); ?>rsc/js/editor/fileBrowser.js"></script>
            <div class="panel" style="width: 40%"> <!-- editor panel -->
                <div contenteditable="true" id="editor" name="editor" class="editorSource" onkeyup="saveFile(); event.preventDefault();"></div><br>
                <input type="submit" style="float: right" onclick="submitCode();">
            </div>
            <div class="editorResult" id="editorResult"><!-- result panel -->
                <?php echo(html_entity_decode($this->input->post("HTML"))); ?>
                <script type="text/javascript">
<?php echo($this->input->post("JS")); ?>
                </script>
            </div>
            <script type="text/javascript" src="<?php echo base_url(); ?>rsc/js/editor/brush.js"></script>
        </div>
        <script type="text/javascript">
            //populate editor
            openFile(0, false);
            var editor = document.getElementById("editor");
            editor.innerHTML = localStorage.fileHTML === undefined ? "" : localStorage.fileHTML;

            function submitCode() {
                saveFile();
                var inputHTML = document.createElement('input');
                inputHTML.type = 'hidden';
                inputHTML.name = "HTML";
                inputHTML.value = localStorage.fileHTML === undefined ? "" : localStorage.fileHTML;
                var inputJS = document.createElement('input');
                inputJS.type = 'hidden';
                inputJS.name = "JS";
                inputJS.value = localStorage.fileJS === undefined ? "" : localStorage.fileJS;
                var inputCSS = document.createElement('input');
                inputCSS.type = 'hidden';
                inputCSS.name = "CSS";
                inputCSS.value = localStorage.fileCSS === undefined ? "" : localStorage.fileCSS;
                document.forms['editorForm'].appendChild(inputHTML);
                document.forms['editorForm'].appendChild(inputJS);
                document.forms['editorForm'].appendChild(inputCSS);
            }

            function downloadSource() {
                var zip = new JSZip();
                //decode HTML
                var decodedHTML=(localStorage.fileHTML === undefined ? "" : localStorage.fileHTML).replace("&lt;","<").replace("&gt;",">");
                while(decodedHTML.indexOf("&gt;") > -1) {
                    decodedHTML = decodedHTML.replace("&gt;",">");
                }
                while(decodedHTML.indexOf("&lt;") > -1) {
                    decodedHTML = decodedHTML.replace("&lt;","<");
                }
                //clean css
                var cleanedCSS = localStorage.fileCSS === undefined ? "" : localStorage.fileCSS;
                while(cleanedCSS.indexOf("<div>") > -1) {
                    cleanedCSS = cleanedCSS.replace("<div>","");
                }
                while(cleanedCSS.indexOf("</div>") > -1) {
                    cleanedCSS = cleanedCSS.replace("</div>","");
                }
                alert(cleanedCSS)
                zip.file("HTML.html", '<link rel="stylesheet"  type="text/css" href="CSS.css"/><script type="text/javascript" src="Javascript.js"></scrip'+'t>'+decodedHTML);
                zip.file("Javascript.js", localStorage.fileJS === undefined ? "" : localStorage.fileJS);
                zip.file("CSS.css", cleanedCSS);
                var content = zip.generate();
                location.href = "data:application/zip;base64," + content;
            }
        </script>
    </body>
</html>